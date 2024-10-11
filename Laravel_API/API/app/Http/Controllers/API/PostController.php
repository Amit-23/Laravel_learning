<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();

        return response()->json([
            'status' => true,
            'message' => 'All Posts Data',
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateUser->errors()->all()
            ], 401);
        }



        $img = $request->image;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path() . '/uploads', $imageName);


        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'post' => $post
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['post'] = Post::select(
            'id',
            'title',
            'description',
            'image'
        )->where(['id' => $id])->get();


        return response()->json([
            'status' => true,
            'message' => 'Your single post',
            'data' => $data
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    // Validate incoming request data
    $validateUser = Validator::make(
        $request->all(),
        [
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg,gif',
        ]
    );

    if ($validateUser->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation Error',
            'errors' => $validateUser->errors()->all()
        ], 401);
    }

    // Fetch the post by ID
    $postImage = Post::select('id', 'image')->where('id', $id)->first();

    if (!$postImage) {
        return response()->json([
            'status' => false,
            'message' => 'Post not found',
        ], 404);
    }

    // Check if the image is being updated
    if ($request->hasFile('image')) {
        $path = public_path() . '/uploads/';

        // If an old image exists, delete it
        if ($postImage->image && file_exists($path . $postImage->image)) {
            unlink($path . $postImage->image);
        }

        // Store new image
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move($path, $imageName);
    } else {
        // Keep the old image if no new image is uploaded
        $imageName = $postImage->image;
    }

    // Update the post in the database
    $post = Post::where('id', $id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Post updated successfully',
        'post' => $post,
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $imagePath = Post::select('image')->where('id',$id)->get();

        
        $filePath = public_path(). '/uploads/'. $imagePath[0]['image'];
        
        unlink($filePath);
        $post = Post::where('id',$id)->delete();


        return response()->json([
            'status' => true,
            'message' => ' Your post has been removed',
            'post' => $post,
        ], 200);
    }
}

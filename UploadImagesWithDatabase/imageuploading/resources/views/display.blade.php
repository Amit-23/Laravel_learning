<div>
   <h1>Images List</h1>

   @foreach($imgData as $img)
   <img src="{{ url('storage/' . $img->path) }}" alt="image">
   @endforeach
</div>

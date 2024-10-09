@extends('layouts.masterlayout')


@section('title')
PostPage


@endsection

@section('content')


<h1>Post Page</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque placeat non, voluptatem fugit consequuntur quam itaque iste illo ipsum dicta impedit ut eius, saepe culpa nisi beatae officiis officia praesentium sed tenetur. Eius, excepturi perferendis fugit totam distinctio non nam incidunt quaerat hic saepe minus odit cumque molestiae illo. Officia ullam cupiditate neque accusantium beatae libero recusandae rerum ducimus itaque modi, illum, explicabo, mollitia hic temporibus fuga pariatur repellat. Praesentium, sequi eos! Sit quod eos aperiam! Ut vitae officia, ipsam dicta in quam ipsa esse exercitationem quaerat autem omnis pariatur blanditiis maiores tempore itaque, beatae nemo, tenetur aperiam voluptatibus! Quam!</p>

@endsection


@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>

    @endsection
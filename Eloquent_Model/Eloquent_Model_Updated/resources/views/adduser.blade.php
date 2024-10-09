
@extends('layout')


@section('content')
<form action="{{ route('user.store') }}" method="POST">
@csrf
<div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control" name="username" id="username">
</div>

<div class="mb-3">
    <label for="useremail" class="form-label">User Email</label>
    <input type="email" class="form-control" name="useremail" id="useremail">
</div>

<div class="mb-3">
    <label for="userage" class="form-label">User Age</label>
    <input type="text" class="form-control" name="userage" id="userage">
</div>

<div class="mb-3">
    <label for="usercity" class="form-label">User City</label>
    <input type="text" class="form-control" name="usercity" id="usercity">
</div>

<div class="mb-3">
    <input type="submit" value = "Save" class="btn btn-success">
</div>


</form>
@endsection

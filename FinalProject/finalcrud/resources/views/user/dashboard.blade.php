@extends('user.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard- User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->


<section class="content">
    <div class="container-fluid">
        @if(session('requestData'))
        <h2>Welcome {{ session('requestData')['name'] }}</h2>
        @else
        <h2>Welcome User</h2>
        @endif

        <table class="table table-striped table-bordered">


            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Task</th>
                <th>Delete</th>
                <th>Update</th>

            </tr>

            <tr>
                <td>Amit</td>
                <td>amitgmail.com</td>
                <td>Finish_the_project</td>
                <td>Update</td>

                <td>
                    <form action="{{}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>


                    </form>

                </td>
            </tr>



        </table>




        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
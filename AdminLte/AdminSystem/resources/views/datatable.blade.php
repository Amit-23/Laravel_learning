<!-- @extends(user.userdashboard)

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endsection


@section('content')

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>

@endsection






@push('scripts')

<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>


<script>

    let table = new DataTable('#myTable');
</script>

@endpush -->
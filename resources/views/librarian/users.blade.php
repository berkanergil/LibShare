@extends("layouts.librarian")

@section('body_css')
style="background: linear-gradient(90deg, #6441a5 0%,#2a0845 100% ) !important;min-height: 100vh;overflow-y: hidden"
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.9/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.9/js/uikit-icons.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
@endsection 

@section('content')
<x-librarian-nav-bar/>

<form class="searchh mt-5" action="">
    <input id="myInput" onkeyup="myFunction()" type="search">
    <i class="fa fa-search"></i>
</form>

<table id="myTable">
    <tr class="header">
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td><a target="_blank" href="{{ route("librarian_user",$user) }}">{{ $user->username }}</a></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->email }}</td>
    </tr>
    @endforeach



</table>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
{{-- <h1>USERS</h1>
    <br>
    @if ($users->count())
        @foreach ($users as $user)
            <a href="{{ route("librarian_user",$user) }}">{{ $user->username }}</a>
<br>
@endforeach
@endif --}}





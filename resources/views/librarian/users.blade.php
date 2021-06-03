<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/deneme.css") }}">
    <title>Document</title>
</head>

<body>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

    <table id="myTable">
        <tr class="header">
            <th style="width:60%;">Name</th>
            <th style="width:40%;">Country</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><a href="{{ route("librarian_user",$user) }}">{{ $user->username }}</a></td>
        </tr>
        @endforeach
        
        
    </table>
</body>
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

</html>

{{-- @extends("layouts.librarian")

@section('content')
<x-librarian-nav-bar/>


<div style="background: transparent!important;" class="mt-0">
    <div uk-height-viewport="offset-top: true; offset-bottom: true">
        <div uk-grid uk-height-viewport="expand: true">
            <div class="uk-width-medium@m sidebar-background">
                <ul class="uk-nav uk-nav-default"
                    uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s"
                    uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                    <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                        <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                                class="button-tab-icon uk-visible@l"></span><i
                                style="margin-right: 10px !important; padding-left: 6px !important;"
                                class="fas fa-eye pl-1"></i> Display All Users</a>
                    </li>
                    <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                        <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                                class="button-tab-icon uk-visible@l"></span><i
                                style="margin-right: 9px !important; padding-left: 6px !important;"
                                class="fas fa-eye"></i> Display All Librarians</a>
                    </li>
                </ul>
            </div>
            <div class="uk-width-expand@m">
                <ul id="component-nav" class="uk-switcher uk-margin-large ">
                    <li>
                        <div class="uk-section ">
                            <table class="text-white"
                                        id="table"
                                        data-toggle="table"
                                        data-height="460">
                                    <thead>
                                    <tr>
                                        <th data-field="id" data-halign="right" data-align="center">Item ID</th>
                                        <th data-field="name" data-halign="center" data-align="left">Item Name</th>
                                        <th data-field="surname" data-halign="left" data-align="right">Item</th>
                                        <th data-field="username" data-halign="left" data-align="right">Item</th>
                                    </tr>
                                
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr class="clickable text-center" 
               onclick="window.location='https://ide.geeksforgeeks.org/Y4U8qx'">
                                            <td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->surname }}</td>
<td>{{ $user->username }}</td>
</tr>
@endforeach
</tbody>
</table> --}}
{{-- <div class="container-fluid">
                                <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;" class="text-white">
                                    All Users</h1>
                                <div id="toolbaruser" class="mb-3">
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table class="text-white" id="tableusers" data-toggle="table" data-search="true"
                                    data-filter-control="true"
                                    data-toolbar="#toolbaruser">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="first_name" data-filter-control="select"
                                                data-sortable="true">First Name</th>
                                            <th data-field="last_name" data-filter-control="input" data-sortable="true">
                                                Last Name</th>
                                            <th data-field="phone_number" data-filter-control="input"
                                                data-sortable="true">Phone Number</th>
                                            <th data-field="email" data-filter-control="select" data-sortable="true">
                                                    E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($users as $user)
                                        <tr>
                                    
                                            <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                    type="checkbox"></td>
                                            <td>{{ $user->username }}</td>
<td>{{ $user->surname }}</td>
<td>{{ $user->phone_number }}</td>
<td>{{ $user->email }}</td>
</tr>

@endforeach
</tbody>
</table>
</div> --}}
{{-- </div>

                    </li>
                    <li>
                        <div class="uk-section ">
                            <div class="container-fluid">
                                <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;" class="text-white">
                                    All Librarians</h1>
                                <div id="toolbar" class="mb-3">
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table class="text-white" id="table" data-toggle="table" data-search="true"
                                    data-filter-control="true" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="username" data-filter-control="select" data-sortable="true">
                                                Username</th>
                                            <th data-field="first_name" data-filter-control="input"
                                                data-sortable="true">First Name</th>
                                            <th data-field="last_name" data-filter-control="input" data-sortable="true">
                                                Last Name</th>
                                            <th data-field="phone_number" data-filter-control="select"
                                                data-sortable="true">Phone Number</th>
                                            <th data-field="email" data-filter-control="select" data-sortable="true">
                                                E-mail</th>
                                            <th data-field="manager_ID" data-sortable="true">Manager ID</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($librarians as $user)
                                        <tr>
                                            <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                    type="checkbox"></td>
                                            <td>{{ $user->username }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->surname }}</td>
<td>{{ $user->phone_number }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->manager_id }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

</li>

</ul>
</div>
</div>
</div>
</div> --}}


{{-- <h1>USERS</h1>
    <br>
    @if ($users->count())
        @foreach ($users as $user)
            <a href="{{ route("librarian_user",$user) }}">{{ $user->username }}</a>
<br>
@endforeach
@endif --}}
{{-- @endsection --}}
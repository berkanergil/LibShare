@extends('layouts.manager')
@section('css')
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    <link rel="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/3a82b90854.js"></script>
    <link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
    <link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
    <link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/tablemanager.css") }}">
@endsection

@section('js')

<script>
    $('.mail-choice').change(function() {
        if($(this).is(":checked")) {
            $(this).parent().addClass('selected-bg');
        } else {
            $(this).parent().removeClass('selected-bg');
        }
    });

    const colorInput = document.getElementById("colorpicker");

    colorInput.addEventListener("input", (e) => {
        document.body.style.setProperty("--button-color", e.target.value);
    });

    $('.inbox-calendar').click(function(){
        $('.calendar-container').toggleClass('calendar-show');
        $('.inbox-container').toggleClass('hide');
        $('.mail-detail').toggleClass('hide');
    });
</script>
<script>
    var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

    var trBoldBlue = $("table");

    $(trBoldBlue).on("click", "tr", function (){
        $(this).toggleClass("bold-blue");
    });
</script>
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

@section('body_css')
style="background:linear-gradient(90deg, #4cb8c4 0%,#3cd3ad 100% ) !important; "
@endsection

@section('content')
<x-manager-nav-bar/>


<section style="min-height: 150vh;">
    <div style="background: transparent!important;" class="mt-0">
        <div uk-height-viewport="offset-top: true; offset-bottom: true">
            <div uk-grid uk-height-viewport="expand: true">
                <div class="uk-width-medium@m sidebar-background">
                    <ul class="uk-nav uk-nav-default"
                        uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s"
                        uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                        <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                            <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m"
                                href="#"><span class="button-tab-icon uk-visible@l"></span><i
                                    style="margin-right: 9px !important; padding-left: 6px !important;"
                                    class="fas fa-eye"></i> Display All Books </a>
                        </li>
                        <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                            <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m"
                                href="#"><span class="button-tab-icon uk-visible@l"></span><i
                                    style="margin-right: 10px !important; padding-left: 6px !important;"
                                    class="fas fa-eye pl-1"></i> Display All E-Books</a>
                        </li>
                    </ul>
                </div>

                <div class="uk-width-expand@m">
                    <ul id="component-nav" class="uk-switcher uk-margin-large ">
                        <li>
                            <div class="uk-section ">
                                <form class="searchh mt-5" action="">
                                    <input id="myInput" onkeyup="myFunction()" type="search">
                                    <i class="fa fa-search"></i>
                                </form>
                                
                                <table id="myTable">
                                    <tr class="header">
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publish Date</th>
                                        <th>Language</th>
                                        <th>Description</th>
                                        <th>Stock Number</th>
                                    </tr>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td><a target="_blank" href="{{ route("manager_book",$book) }}">{{ $book->title }}</a></td>
                                        <td>{{ $book->author}}</td>
                                        <td>{{ $book->publish_date }}</td>
                                        <td>{{ $book->language }}</td>
                                        <td>{{ $book->description }}</td>
                                        <td>{{ $book->stock_number }}</td>
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

                            </div>

                        </li>
                        <li>
                            <div class="uk-section ">
                                <form class="searchh mt-5" action="">
                                    <input id="myInput" onkeyup="myFunction()" type="search">
                                    <i class="fa fa-search"></i>
                                </form>
                                
                                <table id="myTable">
                                    <tr class="header">
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publish Date</th>
                                        <th>Language</th>
                                        <th>Description</th>
                                       
                                    </tr>
                                    @foreach ($ebooks as $book)
                                    <tr>
                                        <td><a target="_blank" href="{{ route("manager_ebook",$book) }}">{{ $book->title }}</a></td>
                                        <td>{{ $book->author}}</td>
                                        <td>{{ $book->publish_date }}</td>
                                        <td>{{ $book->language }}</td>
                                        <td>{{ $book->description }}</td>
                                       
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

                            </div>

                        </li>


                    </ul>
                </div>

            </div>
        </div>
    </div>
    
</section>


    {{-- <h1>BOOKS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("manager_book",$book)}}">
            <div>
                <h3>{{ $book->title }}</h3>
                <img src="{{url('/images/books/'.$book->image)}}" alt="" width="300" height="500">
            </div>
        </a>
        @endforeach
        {{ $books->links() }}
    @else 
        <p>There are no books</p>
    @endif --}}
@endsection
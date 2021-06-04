@extends('layouts.manager')
@section('css')
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    <link rel="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/3a82b90854.js"></script>
    <link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
    <link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
    <link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
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
                                    class="fas fa-plus pl-1"></i> Display All E-Books</a>
                        </li>
                    </ul>
                </div>

                <div class="uk-width-expand@m">
                    <ul id="component-nav" class="uk-switcher uk-margin-large ">
                        <li>
                            <div class="uk-section ">
                                <div class="container-fluid">
                                    <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;"
                                        class="text-white">All Books</h1>
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
                                                <th data-field="book_name" data-filter-control="input"
                                                    data-sortable="true">Name of the Book</th>
                                                <th data-field="author_name" data-filter-control="input"
                                                    data-sortable="true">Name of Author</th>
                                                <th data-field="category" data-filter-control="select"
                                                    data-sortable="true">Category</th>
                                                <th data-field="language" data-filter-control="select"
                                                    data-sortable="true">Language</th>
                                                <th data-field="stock" data-sortable="true">Stock Number</th>
                                                <th data-field="librarian_id" data-filter-control="select"
                                                    data-sortable="true">Librarian Name</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-white">
                                            @foreach ($books as $book)
                        
                                            <tr>
                                                <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                        type="checkbox"></td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->category->title}}</td>
                                                <td>{{ $book->language }}</td>
                                                <td>{{ $book->stock_number }}</td>
                                                <td>{{ $book->librarian->username}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="uk-section ">
                                <div class="container-fluid">
                                    <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;"
                                        class="text-white">All E-Books</h1>
                                    <table class="text-white" id="table-ebook" data-toggle="table" data-search="true"
                                        data-filter-control="true" data-show-export="true" data-click-to-select="true"
                                        data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="librarian_id" data-filter-control="select"
                                                    data-sortable="true">Librarian Name</th>
                                                <th data-field="book_name" data-filter-control="input"
                                                    data-sortable="true">Name of the Book</th>
                                                <th data-field="author_name" data-filter-control="input"
                                                    data-sortable="true">Name of Author</th>
                                                <th data-field="category" data-filter-control="select"
                                                    data-sortable="true">Category</th>
                                                <th data-field="language" data-filter-control="select"
                                                    data-sortable="true">Language</th>
                                                <th data-field="stock" data-sortable="true">Stock Number</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-white">
                                            @foreach ($ebooks as $book)
                        
                                            <tr>
                                                <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                        type="checkbox"></td>
                                                        <td>{{ $book->librarian->username }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->category_id }}</td>
                                                <td>{{ $book->language }}</td>
                                                <td>{{ $book->stock_number }}</td>
                                                
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
@extends('layouts.admin')
@section('body_css')
style="background:linear-gradient(90deg, #141e30 0%,#243b55 100% ) !important;"
@endsection
@section('content')
<x-admin-nav-bar />
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
        <a href="{{route("admin_book",$book)}}">
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
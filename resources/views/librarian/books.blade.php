@extends('layouts.librarian')

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
style="background: linear-gradient(90deg, #6441a5 0%,#2a0845 100% ) !important;min-height: 100vh;overflow-y: hidden"
@endsection

@section('content')
<x-librarian-nav-bar />

<section style="min-height: 150vh;">
    <div style="background: transparent!important;" class="mt-0">
        <div uk-height-viewport="offset-top: true; offset-bottom: true" >
            <div uk-grid uk-height-viewport="expand: true">
                <div class="uk-width-medium@m sidebar-background">
                    <ul class="uk-nav uk-nav-default" uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s" uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                        {{-- <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                            <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 9px !important; padding-left: 6px !important;" class="fas fa-edit"></i> Update / Delete Book</a>
                        </li> --}}
                        <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                            <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 9px !important; padding-left: 6px !important;" class="fas fa-eye"></i> Display All Books </a>
                        </li>
                        <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                            <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 9px !important; padding-left: 6px !important;" class="fas fa-eye"></i> Display All E-Books </a>
                        </li>
                    </ul>
                </div>
                
                <div class="uk-width-expand@m">
                    <ul id="component-nav" class="uk-switcher uk-margin-large ">
                        {{-- <section>
                            <div class="smart-wrap" >
                                <div class="smart-forms smart-container wrap-2">
                                    <form method="post" id="new_post" name="new_post"  action="{{ route("librarian_addBook") }}" class="wpcf7-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="spacer-b30">
                                                <div class="tagline"><span class="font-weight-bold" style="color: #2a0845  !important;">Book Details</span></div><!-- .tagline -->
                                            </div>
                                            <div class="frm-row">
                                                @error('title')
                                                {{ $message }}
                                                <br>
                                                @enderror
                                                @if (session("error_title"))
                                                {{ session("errror_title") }}    
                                                <br>
                                                 @endif
                                                <div class="section colm colm6">
                                                    <label for="book_name" class="field prepend-icon">
                                                        <input type="text" name="title" id="book_name" class="gui-input" placeholder="Title of the Book" value="{{ old("title") }}">
                                                        <label for="book_name" class="field-icon"><i class="fas fa-book-open"></i></label>
                                                    </label>
                                                </div><!-- end section -->
                                                @error('author')
                                                {{ $message }}
                                                <br>
                                                @enderror
                                                <div class="section colm colm6">
                                                    <label for="author_name" class="field prepend-icon">
                                                        <input type="text" name="author" id="author_name" class="gui-input" placeholder="Name of the Author" value="{{ old("author") }}">
                                                        <label for="author_name" class="field-icon"><i class="fa fa-user"></i></label>
                                                    </label>
                                                </div><!-- end section -->
                                                @error('publish_date')
                                                {{ $message }}
                                                <br>
                                                @enderror
                                            </div><!-- end .frm-row section -->
                                            <div class="section">
                                                <label for="publish_date" class="field prepend-icon">
                                                    <input type="date" name="publish_date" id="publish_date" class="gui-input" value="{{ old("publish_date") }}">
                                                    <label for="publish_date" class="field-icon"><i class="far fa-hourglass"></i></label>
                                                </label>
                                            </div><!-- end section -->
                                            <div class="section">
                                                @error('language')
                                                {{ $message }}
                                                <br>
                                                @enderror
                                                <label class="field select">
                                                    <select id="language" name="language" value="{{ old("language") }}">
                                                        <option value=""> Language of the Book</option>
                                                        <option value="EN">English</option>
                                                        <option value="TR">Turkish</option>
                                                    </select>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div><!-- end section -->
                                            @error('image')
                                            {{ $message }}
                                            <br>
                                            @enderror
                        
                                            <div class="section extra-outline">
                                                <label for="file1" class="field file">
                                                    <span class="button btn-primary" style="background: #2a0845  !important;"><i class="fas fa-upload"></i> Upload Image File </span>
                                                    <input type="file" class="gui-file" name="image" id="file1" onChange="document.getElementById('uploader1').value = this.value;">
                                                    <input type="text" class="gui-input" id="uploader1" placeholder="Image of the Book" readonly>
                                                </label>
                                            </div><!-- end  section UPLOAD-->
                        
                                            @error('category')
                                            {{ $message }}
                                            <br>
                                            @enderror
                                            <div class="section">
                                                <span><i class="fas fa-list-ol"></i> Category of the Book </span>
                                                <label class="field select-multiple">
                                                        <select name="category_id" id="category" multiple>
                                                                @foreach ($categories as $key=>$value)
                                                                <option value="{{ $value->id }}"> 
                                                                    {{ $key+1 }}-{{$value->title }} 
                                                                </option>
                                                            @endforeach    
                                                        </select>
                                                    </label>
                                            </div><!-- end  section -->
                                            @error('description')
                                            {{ $message }}
                                            <br>
                                            @enderror
                                            <div class="section">
                                                <label for="description" class="field prepend-icon">
                                                    <textarea class="gui-textarea" id="description" name="description" placeholder="Description of the Book (Max. 250 characters)" value="{{ old("description") }}"></textarea>
                                                    <label for="description" class="field-icon"><i class="fa fa-comments"></i></label>
                        
                                                </label>
                                            </div><!-- end section -->

                                            @error('stock_number')
                                                {{ $message }}
                                                <br>
                                                @enderror
                                                <div class="section colm colm6">
                                                    <label for="author_name" class="field prepend-icon">
                                                        <input type="number" name="stock_number" id="stock_number" class="gui-input" placeholder="Stock Number" value="{{ old("stock_number") }}">
                                                        <label for="author_name" class="field-icon"><i class="fa fa-book"></i></label>
                                                    </label>
                                                </div><!-- end section -->
                        
                        
                                        </div><!-- end .form-body section -->
                                        @if (session("success"))
                                        {{ session("success") }}    
                                        <br>
                                    @endif
                                        <div class="form-footer">
                                            <button style="background:#2a0845  !important;" type="submit" class="button btn-primary"><i class="fas fa-plus"></i> Add Book </button>
                                            <button style="color: #FFFFFF;background: #7b1fa2 !important;" type="reset" class="button"><i class="fas fa-window-close"></i> Cancel </button>
                                        </div><!-- end .form-footer section -->
                                    </form>
                        
                                </div><!-- end .smart-forms section -->
                            </div>
                        
                        </section> --}}
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
                                        <td><a target="_blank" href="{{ route("librarian_book",$book) }}">{{ $book->title }}</a></td>
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
                                        <th>Stock Number</th>
                                    </tr>
                                    @foreach ($ebooks as $book)
                                    <tr>
                                        <td><a target="_blank" href="{{ route("librarian_ebook",$book) }}">{{ $book->title }}</a></td>
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
        <a href="{{route("librarian_book",$book)}}">
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
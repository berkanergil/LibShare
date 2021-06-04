@extends('layouts.librarian')

@section('css')
<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
<link rel="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
<script crossorigin="anonymous" src="https://kit.fontawesome.com/3a82b90854.js"></script>
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
<link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
<link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection

@section('body_css')
style="background: linear-gradient(90deg, #6441a5 0%,#2a0845 100% ) !important;min-height: 100vh;overflow-y: hidden"
@endsection

@section('content')
<x-librarian-nav-bar/>


<section style="min-height: 150vh;">
        <div style="background: transparent!important;" class="mt-0">
            <div uk-height-viewport="offset-top: true; offset-bottom: true" >
                <div uk-grid uk-height-viewport="expand: true">
                    <div class="uk-width-medium@m sidebar-background">
                        <ul class="uk-nav uk-nav-default" uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s" uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                            <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                                <a   class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 10px !important; padding-left: 6px !important;" class="fas fa-plus pl-1"></i> Add Book</a>
                            </li>
                        
                        </ul>
                    </div>
    
                    <div class="uk-width-expand@m">
                        <ul id="component-nav" class="uk-switcher uk-margin-large ">
                            <li>
                                <div class="smart-wrap" >
                                    <div class="smart-forms smart-container wrap-2">
                                        <form id="new_post" class="wpcf7-form" action="{{ route("librarian_addBook") }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <div class="form-body">
                                                <div class="spacer-b30">
                                                    <div class="tagline"><span class="font-weight-bold" style="color: #2a0845  !important;">Book Details</span></div><!-- .tagline -->
                                                </div>
                                                @error('title')
                                                        {{ $message }}
                                                    @enderror

                                                @if (session("error_title"))
                                                    {{ session("error_title") }}
                                                @endif
                                                <div class="frm-row">
                                                    <div class="section colm colm6">
                                                        <label for="book_name" class="field prepend-icon">
                                                            <input type="text" name="title" id="book_name" class="gui-input" placeholder="Title of the Book" value="{{ old("title") }}">
                                                            <label for="book_name" class="field-icon"><i class="fas fa-book-open"></i></label>
                                                        </label>
                                                    </div><!-- end section -->
                                                    
                                                    @error('author')
                                                        {{ $message }}
                                                    @enderror
    
                                                    <div class="section colm colm6">
                                                        <label for="author_name" class="field prepend-icon">
                                                            <input type="text" name="author" id="author_name" class="gui-input" placeholder="Name of the Author" value="{{ old("author") }}">
                                                            <label for="author_name" class="field-icon"><i class="fa fa-user"></i></label>
                                                        </label>
                                                    </div><!-- end section -->
                                                </div><!-- end .frm-row section -->
                                                @error('publish_date')
                                                        {{ $message }}
                                                    @enderror
                                                <div class="section">
                                                    <label for="publish_date" class="field prepend-icon">
                                                        <input type="date" name="publish_date" id="publish_date" class="gui-input" value="{{ old("publish_date") }}">
                                                        <label for="publish_date" class="field-icon"><i class="far fa-hourglass"></i></label>
                                                    </label>
                                                </div><!-- end section -->

                                                @error('language')
                                                        {{ $message }}
                                                    @enderror
                                                <div class="section">
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
                                                    @enderror
                                                <div class="section">
                                                    <label for="description" class="field prepend-icon">
                                                        <textarea class="gui-textarea" id="description" name="description" placeholder="Description of the Book (Max. 250 characters)" value="{{ old("description") }}"></textarea>
                                                        <label for="description" class="field-icon"><i class="fa fa-comments"></i></label>
                                                    </label>
                                                </div><!-- end section -->
                                                
                                                @if (session("success"))
                                                    {{ session("success") }}
                                                @endif

                                                <div class="section colm colm6">
                                                        <label for="author_name" class="field prepend-icon">
                                                            <input type="number" name="stock_number" id="author_name" class="gui-input" placeholder="Stock Number" value="{{ old("stock_number") }}">
                                                            <label for="author_name" class="field-icon"><i class="fa fa-user"></i></label>
                                                        </label>
                                                    </div>
                                                
                                            </div><!-- end .form-body section -->
                                            <div class="form-footer">
                                                <button style="background:#2a0845  !important;" type="submit" class="button btn-primary"><i class="fas fa-plus"></i> Add Book </button>
                                                <button style="color: #FFFFFF;background: #7b1fa2 !important;" type="reset" class="button"><i class="fas fa-window-close"></i> Cancel </button>
                                            </div><!-- end .form-footer section -->
                                        </form>
    
                                    </div><!-- end .smart-forms section -->
                                </div>
                            </li>
    
                        </ul>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    




    {{-- <h1>ADD BOOK</h1>
        <form action="{{ route("librarian_addBook") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="categories">category: </label>
            <select class="form-control" name="category_id" id="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> 
                        {{ $category->title }} 
                    </option>
                @endforeach    
            </select>
            <br>
            @error('title')
                    {{ $message }}
                    <br>
            @enderror
            @if (session("error_title"))
                {{ session("errror_title") }}    
                <br>
            @endif
            <input type="text" name="title" placeholder="title" value="{{ old("title") }}">
            <br>
            @error('title')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="author" placeholder="author" value="{{ old("author") }}">
            <br>
            @error('author')
                    {{ $message }}
                    <br>
            @enderror
            <label for="publish_date">publish date:</label>
            <input type="date" name="publish_date" id="publish_date" value="{{ old("publish_date") }}">
            <br>
            @error('publish_date')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="description" placeholder="description" value="{{ old("description") }}">
            <br>
            @error('description')
                    {{ $message }}
                    <br>
            @enderror
            <label for="language">language:</label>
            <select class="form-control" name="language" id="language" value="{{ old("language") }}">
                    <option value="english"> 
                        english
                    </option>
                    <option value="turkish"> 
                        turkish
                    </option>
            </select>
            <br>
            @error('language')
                    {{ $message }}
                    <br>
            @enderror
            <label for="image">image: </label>
            <input type="file" name="image" id="image" placeholder="image" value="{{ old("image") }}">
            <br>
            @error('image')
                    {{ $message }}
                    <br>
            @enderror
            <input type="number" name="stock_number" placeholder="stock number" value="{{ old("stock_number") }}">
            <br>
            @error('stock_number')
                    {{ $message }}
                    <br>
            @enderror
            <button type="submit" name="submit">Submit</button>
        </form>
         --}}
@endsection
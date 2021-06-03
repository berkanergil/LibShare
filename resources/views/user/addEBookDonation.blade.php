@extends('layouts.user')

@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Book_Donation.css") }}" rel="stylesheet">
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
<link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
<link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
@endsection

@section('body_css')
style="background:var(--background-color-primary) "
@endsection

@section('content')
<x-user-nav-bar/>

<section class="container-fluid mt-5" style="min-width: 30vh !important;">
    <div class="row d-flex justify-content-center align-items-center">
            <h1 class="text-white">Do You Want to Donate A Book?</h1>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <h3 class="text-white" style="opacity: .4 !important;">Fill The Form And Upload Your E-Book As PDF Format To Donate. Thank You <i class="far fa-smile"></i></h3>
    </div>
</section>
<section>
    <div class="smart-wrap" >
        <div class="smart-forms smart-container wrap-2">
            <form method="post" id="new_post" name="new_post"  action="{{ route("user_addEBookRequest") }}" class="wpcf7-form" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="spacer-b30">
                        <div class="tagline"><span class="font-weight-bold" style="color: #1E3E5B !important;">E-Book Details</span></div><!-- .tagline -->
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
                            <span class="button btn-primary" style="background: #1E3E5B !important;"><i class="fas fa-upload"></i> Upload Image File </span>
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
                    @error('file')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="section extra-outline">
                        <label for="file2" class="field file">
                            <span class="button btn-primary" style="background: #1E3E5B !important;"><i class="far fa-file-pdf"></i> Upload PDF File </span>
                            <input type="file" class="gui-file" name="file" id="file2" onChange="document.getElementById('uploader2').value = this.value;">
                            <input type="text" class="gui-input" id="uploader2" placeholder="File of the E-Book" readonly>
                        </label>
                    </div><!-- end  section UPLOAD-->



                </div><!-- end .form-body section -->
                @if (session("success"))
                {{ session("success") }}    
                <br>
            @endif
                <div class="form-footer">
                    <button style="background:#1E3E5B !important;" type="submit" class="button btn-primary"><i class="fas fa-hand-holding-medical"></i>  Donate E- Book </button>
                    <button style="color: #FFFFFF;background: #265D84 !important;" type="reset" class="button"><i class="fas fa-window-close"></i> Cancel </button>
                </div><!-- end .form-footer section -->
            </form>

        </div><!-- end .smart-forms section -->
    </div>

</section>

@endsection
    {{-- <h1>ADD EBOOK DONATION</h1>
        <form action="{{ route("user_addEBookRequest") }}" method="POST" enctype="multipart/form-data">
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
                    <option value="en"> 
                        english
                    </option>
                    <option value="tr"> 
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
            <label for="file">pdf: </label>
            <input type="file" name="file" id="file" placeholder="file" value="{{ old("file") }}">
            <br>
            @error('file')
                    {{ $message }}
                    <br>
            @enderror
            <button type="submit" name="submit">Submit</button>
        </form>

        @if (session("success"))
                {{ session("success") }}    
                <br>
            @endif --}}
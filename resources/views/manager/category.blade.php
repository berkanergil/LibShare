@extends('layouts.manager')

@section('body_css')
style="background:linear-gradient(90deg, #4cb8c4 0%,#3cd3ad 100% ) !important; "
@endsection


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
                                                        <a class="side-tab-link"
                                                                uk-toggle="cls: side-tab-link; mode: media; media: @m"
                                                                href="#"><span
                                                                        class="button-tab-icon uk-visible@l"></span><i
                                                                        style="margin-right: 10px !important; padding-left: 6px !important;"
                                                                        class="fas fa-user pl-1"></i> Category
                                                                Details</a>
                                                </li>
                                        </ul>
                                </div>
                                <div class="uk-width-expand@m">
                                        <ul id="component-nav" class="uk-switcher uk-margin-large ">
                                                <li>
                                                        <div class="smart-wrap">
                                                                <div class="smart-forms smart-container wrap-2">
                                                                    
                                                                                <div class="form-body">
                                                                                        <div class="spacer-b30">
                                                                                                <div class="tagline">
                                                                                                        <span class="font-weight-bold"
                                                                                                                style="color: #0B8F84 !important;">Category
                                                                                                                Details</span>
                                                                                                </div><!-- .tagline -->
                                                                                        </div>
                                                                                        
                                                                        


                                                                                        
                                                                                        <div class="section">
                                                                                                <div
                                                                                                        class="section colm colm6">
                                                                                                        

                                                                                                        <form action="{{ route("manager_update_category") }}" method="post">
                                                                                                            @csrf
                                
                                                                                                            <label for="title"
                                                                                                                class="field prepend-icon">
                                                                                                                <input type="text"
                                                                                                                    
                                                                                                                        name="title"
                                                                                                                        id="title"
                                                                                                                        class="gui-input"
                                                                                                                        placeholder="Title"
                                                                                                                        value="{{ $category->title }}">
                                                                                                                <label for="title"
                                                                                                                        class="field-icon"><i
                                                                                                                                class="far fa-envelope"></i></label>
                                                                                                        </label>
                                                                                                            <br>
                                                                                                            @error('title')
                                                                                                                {{ $message }}
                                                                                                                <br>
                                                                                                            @enderror
                                                                                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                                                                            <div class="form-footer">
                                                                                                                <button style="background: #4cb8c4  !important;" type="submit" name="submit" value="update" class="button btn-primary"><i class="fas fa-plus"></i> Update Book </button>
                                                                                                                <button style="background: #3cd3ad  !important;" type="submit" name="submit" value="delete" class="button btn-primary"><i class="fas fa-window-close"></i> Delete </button>
                                                                                                                <!--<button style="color: #FFFFFF;background: #7b1fa2 !important;" type="submit" name="submit" value="delete"   class="submit"><i class="fas fa-window-close"></i> Delete </button>-->
                                                                                                            </div><!-- end .form-footer section -->
                                                                                                        </form>
                                                                                                </div>
                                                                                        </div><!-- end section -->


                                                                                    


                                                                                </div><!-- end .form-body section -->
                                                                            
              

                                                                </div><!-- end .smart-forms section -->
                                                        </div>
                                                </li>

                                                
                                                
                                        
                                        </ul>
                                </div>
                        </div>
                </div>
        </div>
</section>

@endsection
 

{{-- @extends('layouts.manager')

@section('css')
<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
<link rel="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
<script crossorigin="anonymous" src="https://kit.fontawesome.com/3a82b90854.js"></script>
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
<link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
<link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
@endsection

@section('body_css')
style="background:linear-gradient(90deg, #4cb8c4 0%,#3cd3ad 100% ) !important; "
@endsection

@section('content')
<x-manager-nav-bar/>
<h1>CATEGORY</h1>
@isset($category)
    <form action="{{ route("manager_update_category") }}" method="post">
        @csrf
        <input type="text" name="title" value="{{ $category->title }}">
        <br>
        @error('title')
            {{ $message }}
            <br>
        @enderror
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <label for="delete">Delete: </label>
        <input type="submit" id="delete" name="submit" value="delete">
        <br>
        <label for="update">Update: </label>
        <input type="submit" name="submit" value="update">
    </form>
@endisset
@endsection --}}
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
            <div uk-height-viewport="offset-top: true; offset-bottom: true" >
                <div uk-grid uk-height-viewport="expand: true">
                    <div class="uk-width-medium@m sidebar-background">
                        <ul class="uk-nav uk-nav-default" uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s" uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                            <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                                <a   class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 10px !important; padding-left: 6px !important;" class="fas fa-plus pl-1"></i> Create Category</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="uk-width-expand@m">
                        <ul id="component-nav" class="uk-switcher uk-margin-large ">
                            <li>
                                <div class="smart-wrap" >
                                    <div class="smart-forms smart-container wrap-2">
                                        <form method="post" id="new_post" action="{{ route("manager_addCategory") }}" action="" class="wpcf7-form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="spacer-b30">
                                                    <div class="tagline"><span class="font-weight-bold" style="color: #1E3E5B !important;">Category</span></div><!-- .tagline -->
                                                </div>
                                                
                                                @error('title')
                                                            {{ $message }}
                                                            <br>
                                                    @enderror

                                                    <div class="frm-row">
                                                        <div class="section colm colm6">
                                                            <label for="firstname" class="field prepend-icon">
                                                                <input type="text" name="title" id="firstname" class="gui-input" placeholder="Title" value="{{ old("title") }}">
                                                                <label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
                                                            </label>
                                                        </div><!-- end section -->
                                                      
                                                @if (session("success"))
                                                        <span class="d-flex text-center">
                                                            <h4  style="color: #3AE374">{{ session("success") }}</h4>
                                                        </span>
                                                    
                                                    @endif 

                                                    @if (session("success"))
                                                        <span class="d-flex text-center">
                                                            <h4  style="color: #3AE374">{{ session("success") }}</h4>
                                                        </span>
                                                    
                                                    @endif 
    
    
                                            </div><!-- end .form-body section -->
                                            <div class="form-footer">
                                                <button style="background: #1E3E5B !important;" type="submit" class="button btn-primary widgets"><i class="fas fa-plus"></i>  Create Category </button>
                                                <button style="color: #FFFFFF;background: #265D84 !important;" type="reset" class="button"><i class="fas fa-window-close"></i> Cancel </button>
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


    {{-- <h1>ADD CATEGORY</h1>
        <form action="{{ route("manager_addCategory") }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title" value="{{ old("title") }}">
                <br>
                @error('title')
                        {{ $message }}
                        <br>
                @enderror
                @if (session("error_title"))
                    {{ session("error_title") }}
                    <br>
                @endif
                <button type="submit" name="submit">Submit</button>
        </form> --}}
@endsection
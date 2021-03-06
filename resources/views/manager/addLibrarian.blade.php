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
    <link rel="stylesheet" href="{{ asset("css/manager/Librarian.css") }}">
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
<script src="{{ asset("js/admin/Generate_Key.js") }}"></script>
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
                                <a   class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 10px !important; padding-left: 6px !important;" class="fas fa-plus pl-1"></i> Create Librarian</a>
                            </li>
                            
                            <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                                <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span class="button-tab-icon uk-visible@l" ></span><i style="margin-right: 9px !important; padding-left: 6px !important;" class="fas fa-key"></i> Generate Initial Password </a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="uk-width-expand@m">
                        <ul id="component-nav" class="uk-switcher uk-margin-large ">
                            <li>
                                <div class="smart-wrap" >
                                    <div class="smart-forms smart-container wrap-2">
                                        <form method="post" id="new_post" action="{{ route("manager_addLibrarian") }}" action="" class="wpcf7-form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="spacer-b30">
                                                    <div class="tagline"><span class="font-weight-bold" style="color: #0B8F84 !important;">User Details</span></div><!-- .tagline -->
                                                </div>
                                                
                                                @error('name')
                                                            {{ $message }}
                                                            <br>
                                                    @enderror
    
                                                <div class="frm-row">
                                                    <div class="section colm colm6">
                                                        <label for="firstname" class="field prepend-icon">
                                                            <input type="text" name="name" id="firstname" class="gui-input" placeholder="First Name" value="{{ old("name") }}">
                                                            <label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
                                                        </label>
                                                    </div><!-- end section -->
                                                    
                                                    
                                                    
                                                    @error('surname')
                                                            {{ $message }}
                                                            <br>
                                                    @enderror
    
                                                    <div class="section colm colm6">
                                                        <label for="lastname" class="field prepend-icon">
                                                            <input type="text" name="surname" id="lastname" class="gui-input" placeholder="Last Name" value="{{ old("surname") }}">
                                                            <label for="lastname" class="field-icon"><i class="fa fa-user"></i></label>
                                                        </label>
                                                    </div><!-- end section -->
                                                    
                                                    
    
                                                </div><!-- end .frm-row section -->
                                                
                                                @error('username')
                                                            {{ $message }}
                                                            <br>
                                                    @enderror
                                                    @if (session("error_username"))
                                                        {{ session("error_username") }}
                                                        <br>
                                                    @endif
    
                                                <div class="section">
                                                    <div class="section colm colm6">
                                                        <label for="username" class="field prepend-icon">
                                                            <input type="text" name="username" id="username" class="gui-input" placeholder="Username" value="{{ old("username") }}">
                                                            <label for="username" class="field-icon"><i class="far fa-user"></i></label>
                                                        </label>
                                                    </div>
                                                </div><!-- end section -->
                                                
                                                
                                                    @error('email')
                                                            {{ $message }}
                                                            <br>
                                                    @enderror
                                                    @if (session("error_email"))
                                                        {{ session("error_email") }}
                                                        <br>
                                                    @endif
                                                <div class="section">
                                                    <div class="section colm colm6">
                                                        <label for="email" class="field prepend-icon">
                                                            <input type="email" name="email" id="email" class="gui-input" placeholder="E-mail" value="{{ old("email") }}">
                                                            <label for="email" class="field-icon"><i class="far fa-envelope"></i></label>
                                                        </label>
                                                    </div>
                                                </div><!-- end section -->
                                                
    
                                                    @error('password')
                                                    {{ $message }}
                                                    <br>
                                                    @enderror    
                                                <div class="section">
                                                    <div class="section colm colm6">
                                                        <label for="password" class="field prepend-icon">
                                                            <input type="password" name="password" id="password" class="gui-input" placeholder="Password" >
                                                            <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
                                                        </label>
                                                    </div>
                                                </div><!-- end section -->
                                                
                                                <div class="section">
                                                    <div class="section colm colm6">
                                                        <label for="password" class="field prepend-icon">
                                                            <input type="password" name="password_confirmation" id="password" class="gui-input" placeholder="Re-Password" >
                                                            <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
                                                        </label>
                                                    </div>
                                                </div><!-- end section -->
                                                
    
    
                                                 @error('phone_number')
                                                            {{ $message }}
                                                            <br>
                                                 @enderror
                        
                                                      
                                                <div class="section">
                                                    <div class="section colm colm6">
                                                        <label for="phone_number" class="field prepend-icon">
                                                            <input type="number" name="phone_number" id="phone_number" class="gui-input" placeholder="Phone Number" placeholder="Phone Number" value="{{ old("phone_number") }}">
                                                            <label for="phone_number" class="field-icon"><i class="fas fa-phone"></i></label>
                                                        </label>
                                                    </div>
                                                </div><!-- end section -->
                                                
                                                @if (session("success"))
                                                        <span class="d-flex text-center">
                                                            <h4  style="color: #3AE374">{{ session("success") }}</h4>
                                                        </span>
                                                    
                                                    @endif 
    
    
                                            </div><!-- end .form-body section -->
                                            <div class="form-footer">
                                                <button style="background: #0B8F84 !important;" type="submit" class="button btn-primary widgets"><i class="fas fa-plus"></i>  Create Librarian </button>
                                                <button style="color: #FFFFFF;background: #0aaa9d !important;" type="reset" class="button"><i class="fas fa-window-close"></i> Cancel </button>
                                            </div><!-- end .form-footer section -->
                                        </form>
    
                                    </div><!-- end .smart-forms section -->
                                </div>
                            </li>
                        
                            <li>
                                <div class="uk-section ">
                                    <div class="uk-container uk-container-large">
                                        <div  class="uk-text-center" uk-grid>
                                            <div class="container ml-auto mr-auto" >
    
                                                <h2 class="title">Password Generator</h2>
                                                <div class="result">
                                                    <div class="result__title field-title">Generated Password</div>
                                                    <div class="result__info right">click to copy</div>
                                                    <div class="result__info left">copied</div>
                                                    <div class="result__viewbox" id="result">CLICK GENERATE</div>
                                                    <button id="copy-btn" style="--x: 0; --y: 0"><i class="far fa-copy"></i></button>
                                                </div>
                                                <div class="length range__slider" data-min="4" data-max="32">
                                                    <div class="length__title field-title" data-length='0'>length:</div>
                                                    <input id="slider" type="range" min="4" max="32" value="16" />
                                                </div>
    
                                                <div class="settings">
                                                    <span class="settings__title field-title">settings</span>
                                                    <div class="setting">
                                                        <input type="checkbox" id="uppercase" checked />
                                                        <label for="uppercase">Include Uppercase</label>
                                                    </div>
                                                    <div class="setting">
                                                        <input type="checkbox" id="lowercase" checked />
                                                        <label for="lowercase">Include Lowercase</label>
                                                    </div>
                                                    <div class="setting">
                                                        <input type="checkbox" id="number" checked />
                                                        <label for="number">Include Numbers</label>
                                                    </div>
                                                    <div class="setting">
                                                        <input type="checkbox" id="symbol" />
                                                        <label for="symbol">Include Symbols</label>
                                                    </div>
                                                </div>
    
                                                <button class="btn generate" id="generate">Generate Password</button>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
    
                            </li>
                            <li>
                                <div class="uk-section ">
                                    <div class="uk-container uk-container-xsmall">
    
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-section uk-section-default">
                                    <div class="uk-container uk-container-xsmall">
    
                                        <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider>
    
                                            <ul class="uk-slider-items uk-child-width-1-1@m uk-padding">
                                                <li class="uk-padding">
                                                    <ul class="uk-slider-items uk-child-width-1-2@s uk-grid  uk-grid-small">
                                                        <li>
                                                            <div class="uk-card uk-card-default">
                                                                <a href="#" uk-switcher-item="next" style="text-decoration:none;">
                                                                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
    
                                                                        <div><img src="https://banner2.kisspng.com/20171201/dcb/superman-logo-png-hd-5a219b596c0785.5547984215121518974425.jpg" width="150px" /></div>
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="uk-card uk-card-default">
                                                                <a href="#" uk-switcher-item="next" style="text-decoration:none;">
                                                                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
    
                                                                        <div><img src="https://banner2.kisspng.com/20171201/dcb/superman-logo-png-hd-5a219b596c0785.5547984215121518974425.jpg" width="150px" /></div>
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <img src="https://getuikit.com/docs/images/dark.jpg" alt="">
                                                    <div class="uk-position-center uk-panel">
                                                        <h1>2</h1>
                                                    </div>
                                                </li>
                                                <li>
                                                    <img src="https://getuikit.com/docs/images/light.jpg" alt="">
                                                    <div class="uk-position-center uk-panel">
                                                        <h1>3</h1>
                                                    </div>
                                                </li>
                                            </ul>
    
                                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    
                                        </div>
                                    </div>
                                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
    
                                </div>
    
                            </li>
                        </ul>
                    </div>
    
                </div>
            </div>
        </div>
    </section>    

    {{-- <h1>ADD LIBRARIAN</h1>
        <form action="{{ route("manager_addLibrarian") }}" method="POST">
                @csrf
                <input type="text" name="username" placeholder="username" value="{{ old("username") }}">
                <br>
                @error('username')
                        {{ $message }}
                        <br>
                @enderror
                @if (session("error_username"))
                    {{ session("error_username") }}
                    <br>
                @endif
                <input type="text" name="email" placeholder="email" value="{{ old("email") }}">
                <br>
                @error('email')
                        {{ $message }}
                        <br>
                @enderror
                @if (session("error_email"))
                    {{ session("error_email") }}
                    <br>
                @endif
                <input type="text" name="password" placeholder="password">
                <br>
                <input type="text" name="password_confirmation" placeholder="password_confirmation">
                <br>
                @error('password')
                        {{ $message }}
                        <br>
                @enderror
                <button type="submit" name="submit">Submit</button>
        </form> --}}

        @endsection
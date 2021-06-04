@extends('layouts.user')
@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Profile.css") }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("css/user/LibBasket.css") }}">
@endsection
@section('js')
<script src="{{ asset("js/user/CreditCard.js") }}"></script>
<script src="{{ asset("js/user/LibBasket.js") }}"></script>
@endsection
@section('body_css')
style="background: var(--background-color-primary) !important; "
@endsection



@section('content')
<x-user-nav-bar />
<section style="min-height: 100vh;">
  <div style="background: transparent!important;" class="mt-0">
    <div uk-height-viewport="offset-top: true; offset-bottom: true">
      <div uk-grid uk-height-viewport="expand: true">
        <div class="uk-width-medium@m sidebar-background">
          <ul class="uk-nav uk-nav-default"
            uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s"
            uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
            <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
              <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                  class="button-tab-icon uk-visible@l"></span><i class="fas fa-info pl-2 mr-3"></i> Personal Details</a>
            </li>
            <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
              <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                  class="button-tab-icon uk-visible@l"></span><i class="fas fa-credit-card pl-1 mr-2"></i> Payment
                Methods</a>
            </li>
            <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
              <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                  class="button-tab-icon uk-visible@l"></span><i style="margin-right: 10px!important;"
                  class="fas fa-book pl-1"></i> Reserved Books </a>
            </li>

          </ul>
        </div>
        <div class="uk-width-expand@m">
          <ul id="component-nav" class="uk-switcher uk-margin-large ">
            <li>
              <div class="smart-wrap">
                <div class="smart-forms smart-container wrap-2">
                  <form method="post" id="new_post" name="new_post" action="{{ route("user_updateUser") }}"
                    class="wpcf7-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                      <div class="spacer-b30">
                        <div class="tagline"><span class="font-weight-bold"
                            style="color: #1E3E5B !important; font-weight: 600;">User Details</span></div>
                        <!-- .tagline -->
                      </div>
                      <div class="frm-row">
                        <div class="section">
                          <div class="circle">
                            <img src="{{ asset("images/users/".Auth::user()->image) }}" alt="">
                          </div>
                        </div>
                      </div>
                      @error('name')
                      {{ $message }}
                      @enderror
                      <div class="frm-row">
                        <div class="section colm colm6">
                          <label for="firstname" class="field prepend-icon">
                            <input type="text" name="name" id="firstname" class="gui-input"
                              value="{{ ucwords(Auth::user()->name) }}">
                            <label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
                          </label>
                        </div><!-- end section -->

                        @error('surname')
                        {{ $message }}
                        @enderror
                        <div class="section colm colm6">
                          <label for="lastname" class="field prepend-icon">
                            <input type="text" name="surname" id="lastname" class="gui-input"
                              value="{{ ucwords(Auth::user()->surname) }}">
                            <label for="lastname" class="field-icon"><i class="fa fa-user"></i></label>
                          </label>
                        </div><!-- end section -->

                      </div><!-- end .frm-row section -->
                      @error('username')
                      {{ $message }}
                      @enderror
                      <div class="section colm colm6">
                        <label for="lastname" class="field prepend-icon">
                          <input type="text" name="username" id="lastname" class="gui-input"
                            value="{{ ucwords(Auth::user()->username) }}">
                          <label for="lastname" class="field-icon"><i class="fa fa-user"></i></label>
                        </label>
                      </div>
                      @error('email')
                      {{ $message }}
                      @enderror
                      @if (session("email"))
                      {{ session("email") }}
                      @endif
                      <div class="section">
                        <div class="section colm colm6">
                          <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input"
                              value="{{ Auth::user()->email }}">
                            <label for="email" class="field-icon"><i class="far fa-envelope"></i></label>
                          </label>
                        </div>
                      </div><!-- end section -->
                      @error('password')
                      {{ $message }}
                      @enderror
                      <div class="section">
                        <div class="section colm colm6">
                          <label for="password" class="field prepend-icon">
                            <input type="password" name="password" id="password" class="gui-input"
                              placeholder="Password">
                            <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
                          </label>
                        </div>
                      </div><!-- end section -->

                      <div class="section">
                        <div class="section colm colm6">
                          <label for="password" class="field prepend-icon">
                            <input type="password" name="password_confirmation" id="password" class="gui-input"
                              placeholder="Re-Password">
                            <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
                          </label>
                        </div>
                      </div><!-- end section -->
                      @error('phone_number')
                      {{ $message }}
                      @enderror
                      <div class="section">
                        <div class="section colm colm6">
                          <label for="phone_number" class="field prepend-icon">
                            <input type="number" name="phone_number" id="phone_number" class="gui-input"
                              placeholder="Phone Number" value="{{ Auth::user()->phone_number }}">
                            <label for="phone_number" class="field-icon"><i class="fas fa-phone"></i></label>
                          </label>
                        </div>
                      </div><!-- end section -->
                      @error('image')
                      {{ $message }}
                      @enderror
                      <div class="section extra-outline">
                        <label for="file1" class="field file">
                          <span class="button btn-primary" style="background: #1E3E5B !important;"><i
                              class="fas fa-upload"></i> Upload File </span>
                          <input type="file" class="gui-file" name="image" id="file1"
                            onChange="document.getElementById('uploader1').value = this.value;">
                          <input type="text" class="gui-input" id="uploader1" placeholder="Upload Profile Picture"
                            readonly>
                        </label>
                      </div><!-- end  section UPLOAD-->
                      @error('old_password')
                      {{ $message }}
                      @enderror
                      @if (session("old_password"))
                      {{ session("old_password") }}
                      @endif
                      <div class="section">
                        <div class="section colm colm6">
                          <label for="password" class="field prepend-icon">
                            <input type="password" name="old_password" id="password" class="gui-input"
                              placeholder="Old Password">
                            <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
                          </label>
                        </div>
                      </div><!-- end section -->

                      @if (session("success"))
                      {{ session("success") }}
                      @endif
                    </div><!-- end .form-body section -->
                    <div class="form-footer">
                      <button style="background: #1E3E5B !important;" type="submit"
                        class="button btn-primary widgets"><i class="far fa-save"></i> Save Changes </button>
                      <button style="color: #FFFFFF;background: #265D84 !important;" type="reset" class="button"><i
                          class="fas fa-window-close"></i> Cancel </button>
                    </div><!-- end .form-footer section -->
                  </form>

                </div><!-- end .smart-forms section -->
              </div>
            </li>
            <li class="creditt ">
              <div class="payment-title d-flex align-items-center justify-content-center">
                <div style="border-bottom: 3px solid #FFFFFF; width: 80%">
                  <h3 class="text-center  text-white">Payment Method</h3>
                </div>
              </div>
              <div class="row d-flex align-items-center justify-content-center">
                <div class="container d-flex  preload">
                  <div class="creditcard">
                    <div class="front">
                      <div id="ccsingle"></div>
                      <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471"
                        style="enable-background:new 0 0 750 471;" xml:space="preserve">
                        <g id="Front">
                          <g id="CardBackground">
                            <g id="Page-1_1_">
                              <g id="amex_1_">
                                <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                C0,17.9,17.9,0,40,0z" />
                              </g>
                            </g>
                            <path class="darkcolor greydark"
                              d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                          </g>
                          <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">0123 4567
                            8910 1112</text>
                          <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">JOHN
                            DOE</text>
                          <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                          <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                          <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                          <g>
                            <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire"
                              class="st2 st5 st9">01/23</text>
                            <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                            <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                            <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9    " />
                          </g>
                          <g id="cchip">
                            <g>
                              <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                            c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                            </g>
                            <g>
                              <g>
                                <rect x="82" y="70" class="st12" width="1.5" height="60" />
                              </g>
                              <g>
                                <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                              </g>
                              <g>
                                <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                              </g>
                              <g>
                                <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                              </g>
                              <g>
                                <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                              </g>
                              <g>
                                <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                              </g>
                              <g>
                                <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                              </g>
                            </g>
                          </g>
                        </g>
                        <g id="Back">
                        </g>
                      </svg>
                    </div>
                    <div class="back">
                      <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471"
                        style="enable-background:new 0 0 750 471;" xml:space="preserve">
                        <g id="Front">
                          <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                        </g>
                        <g id="Back">
                          <g id="Page-1_2_">
                            <g id="amex_2_">
                              <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                            C0,17.9,17.9,0,40,0z" />
                            </g>
                          </g>
                          <rect y="61.6" class="st2" width="750" height="78" />
                          <g>
                            <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                        C707.1,246.4,704.4,249.1,701.1,249.1z" />
                            <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                            <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                            <path class="st5"
                              d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z" />
                          </g>
                          <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">985</text>
                          <g class="st8">
                            <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">security code</text>
                          </g>
                          <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                          <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                          <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">John
                            Doe</text>
                        </g>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{ route("user_updateCard") }}" method="post">
                @csrf
                <div class="row d-flex align-items-center justify-content-center">
                  <div class="form-container">
                    @error('name')
                        {{ $message }}
                    @enderror
                    <div class="field-container">
                      <label class="text-white" for="name">NAME ON CARD</label>
                      <input id="name" maxlength="20" type="text" name="name" value="{{ ucwords($user->card->name) }}">
                    </div>
                    @error('number')
                        {{ $message }}
                    @enderror
                    <div class="field-container mt-3">
                      <label class="text-white" for="cardnumber">CARD NUMBER</label><span id="generatecard">generate
                        random</span>
                      <input id="cardnumber" inputmode="numeric" name="number" value="{{ $user->card->number }}">
                      <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  
                      </svg>
                    </div>
                    @error('expired_date')
                        {{ $message }}
                    @enderror
                    <div class="field-container mt-3">
                      <label class="text-white" for="expirationdate">EXPIRATION (mm/yy)</label>
                      <input type="text" name="expired_date" placeholder="expired_date" value="{{  $user->card->expired_date }}">
                    </div>
                    @error('cvc_number')
                        {{ $message }}
                    @enderror
                    <div class="field-container mt-3">
                      <label class="text-white" for="securitycode">SECURITY CODE</label>
                      <input id="securitycode" name="cvc_number" value="{{ $user->card->cvc_number }}">
                    </div>
  
                  </div>
  
                </div>
                <div class="d-flex justify-content-center align-items-center">
                  <button type="submit" class="buttons text-uppercase">Save Changes <i class="fas fa-save"></i></button>
                </div>
              </form>
            </li>
            <li>
              <div class="uk-section ">
                <div class="uk-container uk-container-medium">
                  <div class="wrap cf">
                    <div class="heading cf">
                        <h1 class="text-white">Reserved Books</h1>
                    </div>
                    <div class="cart">
                        <!--    <ul class="tableHead">
                              <li class="prodHeader">Product</li>
                              <li>Quantity</li>
                              <li>Total</li>
                               <li>Remove</li>
                            </ul>-->
                        <ul class="cartWrap">
                          
                          @if (count($books)<1)
                          <div class="container d-flex align-items-center justify-content-center">
                            <h1 class="text-white" style="font-size: 18px">You Did Not Reserve Any Books</h1>
                          </div>
                          @endif
                        
                          @foreach ($books as $book)
                          <li class="items odd">
                            <div class="infoWrap">
                                <div class="cartSection">
                                    <div class="row  d-flex align-items-center justify-content-center">
                                        <div class="col">
                                            <img src="{{ asset("images/books/".$book->image) }}" alt="" class="book-card-img">
        
                                        </div>
                                        <div class="col float-right">
                                        <span >
                                            <h2 class="modal-header">{{ ucwords($book->title) }}</h2>
                                        </span>
                                            <span>
                                            <h4 class="modal-text">{{ ucwords($book->author) }}</h4>
                                        </span>
                                            <span>
                                            <h4 class="modal-text">{{ $book->language=="EN"?"ENGLISH":"TURKISH" }}</h4>
                                        </span>
                                            <span>
                                            <h4 class="modal-text"> {{ ucfirst($book->description) }}</h4>
                                        </span>
                                            <span>
                                            <h4 class="stockStatus modal-text"> Reserved Until: {{ $book->end_date }}</h4>
                                        </span>
        
                                        </div>
        
                                    </div>
        
                                </div>
                            </div>
                        </li>
                          @endforeach
                           <!--<li class="items even">Item 2</li>-->
                        </ul>
                    </div>
                </div>
                </div>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</section>

{{-- <section style="min-height: 150vh;">
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
                                                                        class="fas fa-user pl-1"></i> Personal
                                                                Details</a>
                                                </li>
                                        </ul>
                                </div>
                                <div class="uk-width-expand@m">
                                        <ul id="component-nav" class="uk-switcher uk-margin-large ">
                                                <li>
                                                        <div class="smart-wrap">
                                                                <div class="smart-forms smart-container wrap-2">
                                                                        <form method="post" id="new_post"
                                                                                action="{{ route("user_updateUser") }}"
action="" class="wpcf7-form">
@csrf
<div class="form-body">
  <div class="spacer-b30">
    <div class="tagline">
      <span class="font-weight-bold" style="color: #1E3E5B !important;">User
        Details</span>
    </div><!-- .tagline -->
  </div>

  @error('name')
  {{ $message }}
  <br>
  @enderror

  <div class="frm-row">
    <div class="section colm colm6">
      <label for="firstname" class="field prepend-icon">
        <input type="text" name="name" id="firstname" class="gui-input" placeholder="First Name"
          value="{{ $user->name }}">
        <label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
      </label>
    </div>
    <!-- end section -->



    @error('surname')
    {{ $message }}
    <br>
    @enderror

    <div class="section colm colm6">
      <label for="lastname" class="field prepend-icon">
        <input type="text" name="surname" id="lastname" class="gui-input" placeholder="Last Name"
          value="{{ $user->surname }}">
        <label for="lastname" class="field-icon"><i class="fa fa-user"></i></label>
      </label>
    </div>
    <!-- end section -->



  </div>
  <!-- end .frm-row section -->

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
        <input type="text" name="username" id="username" class="gui-input" placeholder="Username"
          value="{{ $user->username }}">
        <label for="username" class="field-icon"><i class="far fa-envelope"></i></label>
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
        <input type="email" name="email" id="email" class="gui-input" placeholder="E-mail" value="{{ $user->email }}">
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
        <input type="password" name="password" id="password" class="gui-input" placeholder="Password">
        <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
      </label>
    </div>
  </div><!-- end section -->
  <div class="section">
    <div class="section colm colm6">
      <label for="re-password" class="field prepend-icon">
        <input type="password" name="password_confirmation" id="re-password" class="gui-input"
          placeholder="Re-Password">
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
        <input type="number" name="phone_number" id="phone_number" class="gui-input" placeholder="Phone Number"
          placeholder="Phone Number" value="{{ $user->phone_number }}">
        <label for="phone_number" class="field-icon"><i class="fas fa-phone"></i></label>
      </label>
    </div>
  </div><!-- end section -->

  @error('old_password')
  {{ $message }}
  @enderror
  @if (session("old_password"))
  {{ session("old_password") }}
  <br>
  @endif

  <div class="section">
    <div class="section colm colm6">
      <label for="password" class="field prepend-icon">
        <input type="password" name="old_password" id="re-password" class="gui-input" placeholder="Old Password">
        <label for="password" class="field-icon"><i class="fas fa-key"></i></label>
      </label>
    </div>
  </div>



  @if (session("success"))
  <span class="d-flex text-center">
    <h4 style="color: #3AE374">
      {{ session("success") }}
    </h4>
  </span>

  @endif


</div><!-- end .form-body section -->
<div class="form-footer">
  <button style="background: #1E3E5B !important;" type="submit" class="button btn-primary widgets"><i
      class="fas fa-plus"></i>
    Update
  </button>
  <button style="color: #FFFFFF;background: #265D84 !important;" type="reset" class="button"><i
      class="fas fa-window-close"></i>
    Cancel </button>
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
</section> --}}

{{-- <h1>USER UPDATE</h1>
        @if (isset($user))
        <form action="{{ route("user_updateUser") }}" method="POST">
@csrf
<input type="text" name="username" placeholder="username" value="{{ $user->username }}">
<br>
@error('username')
{{ $message }}
<br>
@enderror
@if (session("error_username"))
{{ session("error_username") }}
<br>
@endif
<input type="text" name="email" placeholder="email" value="{{ $user->email }}">
<br>
@error('email')
{{ $message }}
<br>
@enderror
@if (session("error_email"))
{{ session("error_email") }}
<br>
@endif
<input type="text" name="password" placeholder="new password(optional)">
<br>
<input type="text" name="password_confirmation" placeholder="new password_confirmation">
<br>
@error('password')
{{ $message }}
<br>
@enderror
<input type="text" name="old_password" placeholder="old password(required)">
<br>
@error('old_password')
{{ $message }}
<br>
@enderror
<button type="submit" name="submit">Submit</button>
@if (session("success"))
{{ session("success") }}
@endif
</form>
@endif --}}




@endsection
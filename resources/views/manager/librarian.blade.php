@extends('layouts.manager')
@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Profile.css") }}" rel="stylesheet">
@endsection
@section('body_css')
style="background:linear-gradient(90deg, #4cb8c4 0%,#3cd3ad 100% ) !important; "
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
<x-manager-nav-bar />
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

          </ul>
        </div>
        <div class="uk-width-expand@m">
          <ul id="component-nav" class="uk-switcher uk-margin-large ">
            <li>
              <div class="smart-wrap">
                <div class="smart-forms smart-container wrap-2">
                  <form method="post" id="new_post" name="new_post" action="{{ route("manager_update_librarian") }}"
                    class="wpcf7-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="librarian_id" value="{{ $user->id }}">
                    <div class="form-body">
                      <div class="spacer-b30">
                        <div class="tagline"><span class="font-weight-bold"
                            style="color: #0B8F84 !important; font-weight: 600;">User Details</span></div>
                        <!-- .tagline -->
                      </div>
                      <div class="frm-row">
                      @error('name')
                      {{ $message }}
                      @enderror
                      <div class="frm-row">
                        <div class="section colm colm6">
                          <label for="firstname" class="field prepend-icon">
                            <input type="text" name="name" id="firstname" class="gui-input"
                              value="{{ ucwords($user->name) }}">
                            <label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
                          </label>
                        </div><!-- end section -->

                        @error('surname')
                        {{ $message }}
                        @enderror
                        <div  class="section colm colm6">
                          <label for="lastname" class="field prepend-icon">
                            <input type="text" name="surname" id="lastname" class="gui-input"
                              value="{{ ucwords($user->surname) }}">
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
                            value="{{ ucwords($user->username) }}">
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
                              value="{{ $user->email }}">
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
                      @error('phone_number')
                      {{ $message }}
                      @enderror
                      <div class="section">
                        <div class="section colm colm6">
                          <label for="phone_number" class="field prepend-icon">
                            <input type="number" name="phone_number" id="phone_number" class="gui-input"
                              placeholder="Phone Number" value="{{ $user->phone_number }}">
                            <label for="phone_number" class="field-icon"><i class="fas fa-phone"></i></label>
                          </label>
                        </div>
                      </div><!-- end section -->


                      @if (session("success"))
                      {{ session("success") }}
                      @endif
                    </div><!-- end .form-body section -->
                    <div class="form-footer">
                      <button style="background: #0B8F84 !important;" type="submit" name="submit" value="update"
                        class="button btn-primary widgets"><i class="far fa-save"></i> Save Changes </button>
                      <button style="color: #FFFFFF;background: #0aaa9d !important;" name="submit"  value="delete" type="submit" class="button"><i
                          class="fas fa-window-close"></i> Delete </button>
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



@endsection


{{-- @extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
<h1>LIBRARIAN</h1>
@isset($librarian)
<form action="{{ route("manager_update_librarian") }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="username" value="{{ $librarian->username }}">
        <input type="hidden" name="librarian_id" value="{{ $librarian->id }}">
        <br>
        @error('username')
                {{ $message }}
                <br>
        @enderror
        <input type="text" name="email" placeholder="email" value="{{ $librarian->email }}">
        <br>
        @error('email')
                {{ $message }}
                <br>
        @enderror
        <input type="text" name="password" placeholder="password">
        <br>
        <input type="text" name="password_confirmation" placeholder="password_confirmation">
        <br>
        @error('password')
                {{ $message }}
                <br>
        @enderror
        <label for="update">Update: </label>
        <input type="submit" value="update" name="submit">
        <br>
        @if (session("success"))
            {{session("success")  }}
            <br>
        @endif
        <label for="delete">Delete: </label>
        <input type="submit" value="delete" name="submit">
        <br>

</form>
@endisset


@endsection --}}
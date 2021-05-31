@extends('layouts.user')

@section('css')
        <link rel="stylesheet" href="{{ asset("css/sign_up.css") }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="login-box">
        <h1 class="text-center">Libshare</h1>
        <h3 class="text-center" style="opacity: .5;">Sign Up</h3>
        <div class="tab">
            <button id="defaultOpen" class="tablinks" onclick="openTab(event,'PersonalDetails')">Personal Details</button>
            <button class="tablinks" onclick="openTab(event,'PaymentMethod')">Payment Methods</button>
            <button class="tablinks" onclick="openTab(event,'uploadPhoto')"> Profile Pic.</button>
        </div>
        <form class="formgroup" action="{{ route("user_register") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="PersonalDetails" class="tabcontent">
                    <div class="user-box">
                        <input type="text" name="first_name" value="{{ old("first_name") }}">
                        <label>First Name</label>
                    </div>
                    @error('first_name')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <input type="text" name="last_name" value="{{ old("last_name") }}">
                        <label>Last Name</label>
                    </div>
                    @error('last_name')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <input type="text" name="username"  value="{{ old("username") }}">
                        <label>User Name</label>
                    </div>
                    @error('username')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <input type="text" name="email" value="{{ old("email") }}">
                        <label>Email</label>
                    </div>
                    @error('email')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password_confirmation">
                        <label>Confirm Password</label>
                    </div>
                    @error('password')
                    {{ $message }}
                    <br>
                    @enderror
                    <a>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span> 
                        <button class="tablinks" type="button" onclick="openTab(event,'PaymentMethod')">Next</button>
                    </a>
            </div>
            <div id="PaymentMethod" class="tabcontent">
                    <div class="user-box">
                        <input type="text" name="name" value="{{ old("name")  }}">
                        <label>Name On Card</label>
                    </div>
                    @error('name')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <input type="text" name="number" value="{{ old("number") }}">
                        <label>Card Number</label>
                    </div>
                    @error('number')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <label> Expiry Date</label>
                        <br>
                        <input type="date" name="expired_date" value="{{ old("expired_date") }}">
                    </div>
                    @error('expired_date')
                    {{ $message }}
                    <br>
                    @enderror
                    <div class="user-box">
                        <input type="number" name="cvc_number" value="{{ old("cvc_number") }}">
                        <label>CVC</label>
                    </div>
                    @error('cvc_number')
                    {{ $message }}
                    <br>
                    @enderror
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <button class="tablinks" type="button" onclick="openTab(event,'uploadPhoto')">Next</button>
                    </a>
            </div>
            <div id="uploadPhoto" class="tabcontent">
                    <div class="user-box">
                        <input type="file" id="img" name="image">
                        <label>Upload a Profile Picture</label>
                    </div>
                    <button type="submit" name="submit" value="1">Submit</button>
            </div>
            
    </form>
    </div>
</div>
<script>
    /*TABS*/

    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>


    {{-- <h1>USER REGISTER</h1>
        <form action="{{ route("user_register") }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="username" value="{{ old("username") }}">
            <br>
            @error('username')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="email" placeholder="email" value="{{ old("email") }}">
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
            <br>
            <br>
            <input type="text" name="name" placeholder="name" value="{{ old("name")  }}">
                <br>
                @error('name')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="number" placeholder="number" value="{{ old("number") }}">
                <br>
                @error('number')
                        {{ $message }}
                        <br>
                @enderror
                <input type="date" name="expired_date" placeholder="expired_date" value="{{ old("expired_date") }}">
                <br>
                @error('expired_date')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="cvc_number" placeholder="cvc_number" value="{{ old("cvc_number") }}">
                <br>
                @error('cvc_number')
                        {{ $message }}
                        <br>
                @enderror
                <button type="submit" name="submit">Submit</button>
            <button type="submit" name="submit">Submit</button>
        </form> --}}
@endsection
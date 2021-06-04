@extends('layouts.user')

@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Contact.css") }}" rel="stylesheet">
@endsection

@section('js')
<script src ="{{ asset("js/user/Contact.js") }}"></script>
@endsection

@section('body_css')
style="background:var(--background-color-primary) "
@endsection

@section('content')
<x-user-nav-bar/>

<section style="background: var(--background-color-primary) !important; min-height: 100vh">

    <section style="min-height: 150vh" class="mt-5 pt-5 mb-5">
        <div class="container-fluid pl-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 pl-5  pt-5 ">
                    <h1>Do you have questions and / or suggestions?</h1>
                    <p>Briefly explain your question and/or suggestion, our team will consider and we will get back you soon! </p>
                </div>
                <div class="col-lg-8 col-md-12 pt-4 col-sm-12 d-sm-block d-md-block">
                    <section class="get-in-touch">
                        <h1 class="title">CONTACT US!</h1>
                        <form class="contact-form ">
                            <div class="row">
                                <div class="form-field col x-50">
                                    <input id="name" class="input-text js-input" type="text" required>
                                    <label class="label" for="name">Name & Surname</label>
                                </div>
                                <div class="form-field col x-50">
                                    <input id="email" class="input-text js-input" type="email" required>
                                    <label class="label" for="email">E-mail</label>
                                </div>
                                <div class="form-field col x-50">
                                    <input id="phone" class="input-text js-input" type="text" required>
                                    <label class="label" for="phone">Phone Number</label>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="container">
                                    <section class="ftco-section">
                                        <h3 >Choose Your Topic:</h3>
                                        <div class="row justify-content-center mt-2">
                                            <div class="col ">
                                                <ul class="ks-cboxtags float-left">

                                                    <li>
                                                        <input type="checkbox" id="checkboxTwo" value="Order Two">
                                                        <label for="checkboxTwo">Question</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="checkboxThree" value="Order Two">
                                                        <label for="checkboxThree">Suggestion</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="checkboxFour" value="Order Two">
                                                        <label for="checkboxFour">Other</label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                            </div>
                            <div class="row ">
                                <div class="form-field col x-100 ">
                                    <input id="message" class="input-text js-input" type="text" required>
                                    <label class="label" for="message">Message</label>
                                </div>
                            </div>

                            <div class="form-field col x-100 align-center">
                                <input style="color: #FFFFFF" class="submit-btn" type="submit" value="Send">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="row pt-5 ">
                <div class="col-lg-4 col-md-12 ">
                    <h1>Always at your service...</h1>
                </div>
                <div class="col-lg-5 pt-5 col-md-12 pt-4 col-sm-12 d-sm-block d-md-block">
                    <div class="row pt-5">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <h4 class="pl-4">General Questions</h4> <br>
                            <h5 style="font-weight: normal" class="pl-4">info@libshare.com</h5>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h4 class="pl-4">Contact Number</h4> <br>
                            <h5 style="font-weight: normal" class="pl-4">+90 523 918 10 22</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</section>

    {{-- <h1>BOOKS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("user_book",$book)}}">
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
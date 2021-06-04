@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset("css/global.css") }}">
<link rel="stylesheet" href="{{ asset("css/user/LibBasket.css") }}">
<link href="{{ asset("css/user/Categories.css") }}" rel="stylesheet">
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
<link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
<link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
@endsection

@section('body_css')
style="background: var(--background-color-primary) !important; "
@endsection

@section('js')
<script src="{{ asset("js/user/LibBasket.js") }}"></script>
<script src="{{ asset("js/user/Categories.js") }}"></script>
@endsection

@section('content')

<x-user-nav-bar />

<section style="min-height: 150vh;">
    <div class="wrap cf">
        <div class="heading cf">
            <h1 class="text-white">Lib-Basket Cart</h1>
            <a href="{{ route("user_categories") }}" class="continue">Continue Surfing</a>
        </div>
        @foreach ($books as $book)
        <div class="book-card">
            <div class="content-wrapper">
                <img src="{{url('/images/books/'.$book->image)}}" alt="" class="book-card-img"
                    style="width: 175px; height: 275px;">
                <div class="card-content">
                    <div class="book-name">{{ ucwords($book->title) }}</div>
                    <div class="book-by">{{ ucwords($book->author) }}</div>
                    <span class="book-voters card-vote"> <i class="fas fa-eye"></i>&nbsp;&nbsp;{{ rand(10,100) }} Total
                        Reserves</span>
                    <div class="book-sum card-sum">{{ ucfirst($book->description) }} </div>
                </div>
            </div>

            <div class=" d-flex align-items-center justify-content-center">
                <button type="button" data-toggle="modal" data-target="#{{ trim( $book->trim) }}"
                    class="button-books ">View Details <i class="fas fa-info-circle"></i></button>
            </div>
            <div class="modal fade" id="{{ trim( $book->trim) }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form action="{{route("user_reservebook_store")}}" method="post">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content" style="cursor: context-menu" style="max-height: 400px !important;">
                            <div class="modal-header">
                                <h3 style="color: #1E3E5B" class="font-weight-bold" id="exampleModalLongTitle">Book
                                    Details</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="imagebook">
                                            <img src="{{url('/images/books/'.$book->image)}}" alt="" class="book-card-img">
                                        </div>
                                    </div>
                                    <div class="col">
                
                                        <h2 class="modal-header" style="color: #1e1e1e !important;">{{ ucwords($book->title) }} </h2>
                                        <span>
                                            <h4 class="modal-text">{{ ucwords($book->author) }}</h4>
                                        </span>
                                        <span>
                                            <h4 class="modal-text">{{ $book->publish_date }}</h4>
                                        </span>
                                        <span>
                                            <h4 class="modal-text">{{ $book->language=="EN"?"ENGLISH":"TURKISH" }}</h4>
                                        </span>
                                        <span>
                                            <h5 class="modal-text">{{ ucfirst($book->description) }}</h5>
                                        </span>

                                        
                                            <input type="hidden" name="stocked_book_id"
                                                value="{{ $book->stocked_book_id }}">
                                            <input type="hidden" name="saved_book_id" value="{{ $book->saved_book_id }}">
                                            <input type="hidden" name="start_date" value="{{ $book->available_date }}">
                                            <label style="color: black" for="date">Select End Date:</label>
                                            <input id="date" type="date" name="end_date"
                                                min="{{ date('Y-m-d', strtotime($book->available_date . ' +1 day')) }}"
                                                max="{{ date('Y-m-d', strtotime($book->available_date . ' +14 day')) }}"
                                                value="{{ date('Y-m-d', strtotime($book->available_date . ' +1 day')) }}">
                                            <br>
                                            <br>
                                           
                                    

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="button-details-cancel" data-dismiss="modal"><i
                                        class="far fa-window-close"></i> Cancel</button>
                                <button type="submit" aria-disabled="true" tabindex="-1" 
                                    ><i class="fas fa-cart-plus"></i> Add to
                                    Lib-Basket</button>
                            </div>
        
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>



{{-- <h1>LIBBASKET</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("user_reservebook",$book )}}">
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
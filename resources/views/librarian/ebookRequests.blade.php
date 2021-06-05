@extends('layouts.librarian')

@section('css')
<link rel="stylesheet" href="{{ asset("css/global.css") }}">
<link href="{{ asset("css/librarian/bookrequest.css") }}" rel="stylesheet">
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
<link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
<link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
@endsection

@section('body_css')
style="background: linear-gradient(90deg, #6441a5 0%,#2a0845 100% ) !important;min-height: 100vh;overflow-y: hidden"
@endsection

@section('content')

<x-librarian-nav-bar />

<section style="min-height: 150vh;">
    <div class="wrap cf">
        <div class="heading cf">
            <h1 class="text-white">E Book Requests</h1>
        </div>
        @foreach ($books as $book)
        <div class="book-card" >
            <div class="content-wrapper">
                <img src="{{url('/images/ebook_requests/'.$book->image)}}" alt="" class="book-card-img"
                    style="width: 175px; height: 275px;">
                <div class="card-content ">
                    <div class="book-name">{{ ucwords($book->title) }}</div>
                    <div class="book-by">{{ ucwords($book->author) }}</div>
                    <div class="book-by">{{ ucfirst($book->description) }} </div>
                </div>
                <h4>Open: <a href="{{ url('/pdfs/ebook_requests/'.$book->file) }}" target="_blank">E-Book</a></h4>
            </div>

                <input type="hidden" name="stocked_book_id" value="{{ $book->stocked_book_id }}">
                <div class="modal-footer">
                    <a class="footer-buttons" href="{{ route("librarian_ebookRequestStore",$book) }}"> <i class="fas fa-plus"></i> Store</a>
                    <a class="footer-buttons" href="{{ route("librarian_ebookRequestRemove",$book) }}"><i class="fas fa-trash"></i> Remove</a>
                </div>

            {{-- <div class=" d-flex align-items-center justify-content-center">
                <button type="button" data-toggle="modal" data-target="#{{ trim( $book->trim) }}"
                    class="button-books ">View Details <i class="fas fa-info-circle"></i></button>
            </div>
            <div class="modal fade" id="{{ trim( $book->trim) }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            
                                    <h2 class="modal-header" style="color: #1e1e1e !important;">{{ $book->title }} {{ $book->available_date}}</h2>
                                    <span>
                                        <h4 class="modal-text">{{ $book->author }}</h4>
                                    </span>
                                    <span>
                                        <h4 class="modal-text">{{ $book->publish_date }}</h4>
                                    </span>
                                    <span>
                                        <h4 class="modal-text">{{ $book->language }}</h4>
                                    </span>
                                    <span>
                                        <h5 class="modal-text">{{ $book->description }}</h5>
                                    </span>

                                    <form action="{{route("user_reservebook_store")}}" method="post">
                                        @csrf
                                        <input type="hidden" name="stocked_book_id"
                                            value="{{ $book->stocked_book_id }}">
                                        <input type="hidden" name="saved_book_id" value="{{ $book->saved_book_id }}">
                                        <input type="hidden" name="start_date" value="{{ $book->available_date }}">
                                        <label for="date">Select end date:</label>
                                        <input id="date" type="date" name="end_date"
                                            min="{{ date('Y-m-d', strtotime($book->available_date . ' +1 day')) }}"
                                            value="{{ date('Y-m-d', strtotime($book->available_date . ' +1 day')) }}">
                                        <br>
                                        <br>
                                        <label for="button">Reserve book: </label>
                                        <input type="submit" id="button">
                                    </form>

                                </div>
                            </div>
                        </div>
                        @if (session("success"))
                        {{ session("success") }}
                        @endif
                        @if ($book->saved_status=="0")
                        <form action="{{route("user_book_store")}}" method="post">
                            @csrf
                            <input type="hidden" name="stocked_book_id" value="{{ $book->stocked_book_id }}">
                            <div class="modal-footer">
                                <button type="reset" class="button-details-cancel" data-dismiss="modal"><i
                                        class="far fa-window-close"></i> Cancel</button>
                                <button type="submit" class="button-details"><i class="fas fa-cart-plus"></i> Add to
                                    Lib-Basket</button>
                            </div>
                        </form>
                        @else
                        <div class="modal-footer">
                            <button type="button" class="button-details-cancel" data-dismiss="modal"><i
                                    class="far fa-window-close"></i> Cancel</button>
                            <button type="button" aria-disabled="true" tabindex="-1" disabled
                                class="disabled-button  "><i class="fas fa-cart-plus"></i> Add to
                                Lib-Basket</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div> --}}
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

{{-- <h1>EBOOK REQUESTS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("librarian_ebookRequest",$book)}}">
<div>
    <h3>{{ $book->title }}</h3>
    <img src="{{url('/images/ebook_requests/'.$book->image)}}" alt="" width="300" height="500">
</div>
</a>
@endforeach
{{ $books->links() }}
@else
<p>There are no books</p>
@endif --}}

@extends('layouts.user')

@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Categories.css") }}" rel="stylesheet">
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css" rel="stylesheet">
<link href=" https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css" rel="stylesheet">
<link href="https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=7103" rel="stylesheet">
@endsection

@section('body_css')
style="background:var(--background-color-primary) "
@endsection

@section('content')
<x-user-nav-bar />
<section style="min-height: 150vh;">
    <section style="border-bottom: 3px solid #FFFFFF" class="container pb-3">
        <div class="row pt-3 d-flex align-items-center justify-content-center">
            <img class="img-fluid" style="max-width: 600px" src="{{ asset("images/system/category_donation.png") }}">
        </div>
        <div class="row pt-3 d-flex align-items-center justify-content-center">
            <button onclick="window.location.href = '../Book_Donation/Book_Donation.html'"
                class="buttons text-uppercase">Make a Donation <i class="fas fa-location-arrow"></i></button>
        </div>
    </section>

    <section class="container d-flex justify-content-center align-items-center"
        style="border-bottom: 3px solid #FFFFFF">
        <label id="img_category_label" class="field" for="img_category" data-value="">
            <span>{{ $category_name === ""?'Category':$category_name }}</span>
            <div id="img_category" class="psuedo_select" name="img_category">
                <span class="selected"></span>
                <ul id="img_category_options" class="options">
                    @foreach ($categories as $key=>$value)
                     <li class="option" data-value="{{ $value->id }}"><a class="category-options" href="{{ route("user_categories_id",$value->id) }}">{{ $value->title }}</a></li>
                    @endforeach
                    
                </ul>
            </div>
        </label>

    </section>

    <div id="categories" class="popular-books " style="">
        <form class="searchh mt-5" action="">
            <input type="search" id="myInput" onkeyup="myFunction()">
            <i class="fa fa-search"></i>
        </form>
        <div id="mother_cards" class="book-cards">
            
            @if (count($books)<1)
            <div class="d-flex text-center align-items-center justify-content-center ">
                <h1 class="text-white text-center" style="font-size: 20px;">Currently, There Are No Books Available For This Section</h1>
            </div>
            @endif
            @foreach ($books as $book)
            <div class="book-card">
                <div class="content-wrapper">
                    <img src="{{url('/images/books/'.$book->image)}}"
                        alt="" class="book-card-img" style="width: 175px; height: 275px;">
                    <div class="card-content">
                        <div class="book-name">{{ $book->title }}</div>
                        <div class="book-by">{{ $book->author }}</div>
                        <span class="book-voters card-vote"> <i class="fas fa-eye" ></i>&nbsp;&nbsp;{{ rand(10,100) }} Total Reserves</span>
                        <div class="book-sum card-sum">{{ $book->description }} </div>
                    </div>
                </div>

                <div class=" d-flex align-items-center justify-content-center">
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
                                            <img src="{{url('/images/books/'.$book->image)}}"
                                                alt="" class="book-card-img">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="modal-header">{{ $book->title }}</h2>
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
                                        <span>
                                            <h4 class="modal-text">Stock Status: <span
                                                    style="color: #3ae374">Available</span></h4>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="button-details-cancel" data-dismiss="modal"><i
                                        class="far fa-window-close"></i> Cancel</button>
                                <button type="button" class="button-details"><i class="fas fa-cart-plus"></i> Add to
                                    Lib-Basket</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            

            {{-- <div class="book-card">
                <div class="content-wrapper">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/7167iiDUeAL.jpg" alt=""
                        class="book-card-img">
                    <div class="card-content">
                        <div class="book-name">Dominicana</div>
                        <div class="book-by">by Angie Cruz</div>
                        <div class="rate">
                            <fieldset class="rating book-rate">
                                <input type="checkbox" id="star-c6" name="rating" value="5">
                                <label class="full" for="star-c6"></label>
                                <input type="checkbox" id="star-c7" name="rating" value="4">
                                <label class="full" for="star-c7"></label>
                                <input type="checkbox" id="star-c8" name="rating" value="3">
                                <label class="full" for="star-c8"></label>
                                <input type="checkbox" id="star-c9" name="rating" value="2">
                                <label class="full" for="star-c9"></label>
                                <input type="checkbox" id="star-c10" name="rating" value="1">
                                <label class="full" for="star-c10"></label>
                            </fieldset>
                            <span class="book-voters card-vote">1.987 total reservers</span>
                        </div>
                        <div class="book-sum card-sum">Readers of all ages and walks of life have drawn inspiration and
                            empowerment from Elizabeth Gilbert’s books for years. </div>
                    </div>
                </div>
                <div class=" d-flex align-items-center justify-content-center">
                    <button type="button" data-toggle="modal" data-target="#modal2" class="button-books ">View Details
                        <i class="fas fa-info-circle"></i></button>
                </div>
                <div class="modal fade" id="modal2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content" style="cursor: context-menu" style="max-height: 400px !important;">
                            <div class="modal-header">
                                <h3 style="color: #1E3E5B" class="font-weight-bold" id="modeltitle2">Book Details</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="imagebook">
                                            <img src="https://images-na.ssl-images-amazon.com/images/I/7167iiDUeAL.jpg"
                                                alt="" class="book-card-img">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="modal-header">Dominicana</h2>
                                        <span>
                                            <h4 class="modal-text">Angie Cruz </h4>
                                        </span>
                                        <span>
                                            <h4 class="modal-text">2020</h4>
                                        </span>
                                        <span>
                                            <h4 class="modal-text">Turkish</h4>
                                        </span>
                                        <span>
                                            <h5 class="modal-text">The novel is set in 2015 on Martha's Vineyard, an
                                                island on the coast of Massachusetts. In the late 1960s the three
                                                friends met each other in a college in Connecticut where they fell in
                                                love with Jacy.</h5>
                                        </span>
                                        <span>
                                            <h4 class="modal-text">Stock Status: <span style="color: #cc0000"> Not
                                                    Available </span></h4>
                                            <h4 class="modal-text">Closest Available Date: <span style="color: #cc0000">
                                                    04.06.2021 </span></h4>

                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="button-details-cancel" data-dismiss="modal"><i
                                        class="far fa-window-close"></i> Cancel</button>
                                <button type="button" aria-disabled="true" tabindex="-1" disabled
                                    class="disabled-button  "><i class="fas fa-cart-plus"></i> Add to
                                    Lib-Basket</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#mother_cards book-name").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

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
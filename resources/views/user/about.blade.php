@extends('layouts.user')

@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/About.css") }}" rel="stylesheet">
@endsection

@section('body_css')
style="background:var(--background-color-primary) "
@endsection

@section('content')
<x-user-nav-bar/>

<section class= "pt-5 " style="background: var(--background-color-primary) !important; min-height: 160vh">
    <div class="container-fluid pt-5">
      <section class="open-book mx-auto ">
        <header>
          <h1>Online Library System</h1>
          <h6>Tolgahan - Berkan - Hüseyin - Mehmet
          </h6>
        </header>
        <article>
          <h2 class="chapter-title">About LibShare</h2>
          <p>
            Libshare is a Online Library System for a local Library located in Turkish Republic of North Cyprus.
          </p>
          <p>
            The aim of development of Libshare is, bringing the innovation of Online Library Management Systems to the island.
          </p>
          <p>
            Libshare is making things easier.
          </p>
          <p>
            Libshare is reducing the time to reserve a book
          </p>
          <p>
            You can easily check the target book and see the availability.
          </p>
          <p>
            If you find your book, and if it is available, it is really easy to reserve it up to days you want.
          </p>
          <p>
            Through the aid of Libshare, you can follow your due dates for your book. When you pass your due date, you need to pay a small amount of bill in order to keep our reliability.
          </p>
          <dl>
            <dt>We<strong> Have&bull; Libshare&bull;</strong>Card</dt>
            <dd>
              <em>Here is the Demonstration of LibShare Member Card</em><br>
              <img style="border-radius: 10px; max-width: 100%"  src="../../Images/libshare_card.png" alt="">
            </dd>
          </dl>
          <p>
            Libshare is the first Online Library System developed in TRNC.
          </p>
          <p>
            LibWallet is a new virtual money and money transaction system for LibShare Library.
          </p>
          <p>
            You can use LibWallet without any doubt, it is safe and fast.
          </p>
          <p>
            We are here for you, and will be here for you since 1979.
          </p>
  
        </article>
        <footer>
          <ol id="page-numbers">
            <li>1</li>
            <li>2</li>
          </ol>
        </footer>
      </section>
      <div class="container my-5 justify-content-center">
        <div class=" row justify-content-center ">
          <div class="col-lg-6 col-12 mt-5 ">
            <div class="card mt-3 ">
              <div class="layer"></div>
              <div class="content">
                <div class="card-header text-center border-0">
                  <div class="row justify-content-center my-4">
                    <div class="col">
                      <div class="d-flex flex-lg-row flex-column-reverse no-gutters justify-content-center">
                        <div class="col-3 text-right"><img class="img-fluid" id="quotes" src="https://img.icons8.com/ultraviolet/40/000000/quote-left.png" width="110" height="110"></div>
                        <div class="col pr-lg-5 "><img class=" img-1 mr-lg-5" src="../../Images/testimonial1.jpg"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body text-center pb-3 ">
                  <div class="row justify-content-center">
                    <div class="col text-center justify-content-center ">
                      <p class="bold text-center px-md-3 text-white">Whenever you think about a book, you can easily search for it in Libshare. Libshare allows you to find your book, check its availability and reserve it for yourself to come and pick up if it is available. It's amazing! I wish we have more organizations support these kind of services.</p>
                    </div>
                  </div>
                </div>
                <hr class="mt-auto pb-4">
                <div class="card-footer text-center border-0 mt-0 pt-0 mb-3">
                  <div class="row text-center name mt-auto ">
                    <div class="col">
                      <h4 class="mb-0 Elizabeth">Michelle T Alvarez</h4> <small class="mt-0 text-white">Hair Specialist</small>
                      <p><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 mt-5 ">
            <div class="card mt-3 ">
              <div class="layer"></div>
              <div class="content">
                <div class="card-header text-center border-0">
                  <div class="row justify-content-center my-4">
                    <div class="col">
                      <div class="d-flex flex-lg-row flex-column-reverse no-gutters justify-content-center">
                        <div class="col-3 text-right"><img class="img-fluid" id="quotes" src="https://img.icons8.com/ultraviolet/40/000000/quote-left.png" width="110" height="110"></div>
                        <div class="col pr-lg-5"><img class=" img-1 mr-lg-5 " src="../../Images/testimonial2.jpg""></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body text-center pb-3 ">
                  <div class="row justify-content-center">
                    <div class="col text-center justify-content-center ">
                      <p class="bold text-center px-md-3 text-white"> In today's global world, you need to automate some old and manual work to get rid off extra effort and time, when you think about libraries, of course Libshare is the first organization that comes into mind. You can easily follow your due-dates to not to miss anything. Perfect! </p>
                    </div>
                  </div>
                </div>
                <hr class="mt-auto pb-4">
                <div class="card-footer text-center border-0 mt-0 pt-0 mb-3">
                  <div class="row text-center name mt-auto ">
                    <div class="col">
                      <h4 class="mb-0 Elizabeth">Judith Starnes</h4> <small class="mt-0 text-white">Director of Marketing</small>
                      <p><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star-half text-warning mr-1"></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
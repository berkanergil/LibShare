@extends('layouts.user')

@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Home.css") }}" rel="stylesheet">
@endsection

@section('body_css')
style="background: var(--background-color-primary) !important;"
@endsection

@section('content')
<x-user-nav-bar/>

<body style="background: var(--background-color-primary) !important;">
    <section style="background: var(--background-color-primary) !important; min-height: 300vh">
        <section style="background: var(--background-color-primary) !important;" class="pt-5 mt-5 mb-5">
        <section class="d-flex justify-content-center align-items-center" style="min-height: 70vh">
            <div class="container">
                <div id="carouselExampleIndicators " class="carousel slide " data-ride="carousel">
                    <ol class="carousel-indicators ">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <img class="d-block  w-100" src="{{ asset("images/system/slider_pic_1.png") }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block  w-100" src="{{ asset("images/system/slider_pic_2.png") }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block  w-100" src="{{ asset("images/system/slider_pic_3.png") }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            </section>
        <section class="d-flex justify-content-center align-items-center pt-5" style="min-height: 70vh">
                <div class="main ">
                    <h1 class="text-center text-white mb-5" style="border-bottom: 3px solid #1E3E5B">The Newest Arrivials</h1>
                    <ul id="bk-list" class="bk-list clearfix ">
                        <li>
                            <div class="bk-book book-1 bk-bookdefault ">
                                <div class="bk-front ">
                                    <div class="bk-cover-back"></div>
                                    <div class="bk-cover">
                                        <h2>
                                            <span>Anthony Burghiss</span>
                                            <span>A Clockwork Orange</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="bk-page">
                                    <div class="bk-content bk-content-current">
                                        <p>Red snapper Kafue pike fangtooth humums slipmouth, salmon cutlassfish; swallower European perch mola mola sunfish, threadfin bream. Billfish hog sucker trout-perch lenok orbicular velvetfish. Delta smelt striped bass, medusafish dragon goby starry flounder cuchia round whitefish northern anchovy spadefish merluccid hake cat shark Black pickerel. Pacific cod.</p>
                                    </div>
                                    <div class="bk-content">
                                        <p>Whale catfish leatherjacket deep sea anglerfish grenadier sawfish pompano dolphinfish carp large-eye bream, squeaker amago. Sandroller; rough scad, tiger shovelnose catfish snubnose parasitic eel? Black bass soldierfish duckbill--Rattail Atlantic saury Blind shark California halibut; false trevally warty angler!</p>
                                    </div>
                                    <div class="bk-content">
                                        <p>Trahira giant wels cutlassfish snapper koi blackchin mummichog mustard eel rock bass whiff murray cod. Bigmouth buffalo ling cod giant wels, sauger pink salmon. Clingfish luderick treefish flatfish Cherubfish oldwife Indian mul gizzard shad hagfish zebra danio. Butterfly ray lizardfish ponyfish muskellunge Long-finned sand diver mullet swordfish limia ghost carp filefish.</p>
                                    </div>
                                </div>
                                <div class="bk-back">
                                    <p>In this nightmare vision of cats in revolt, fifteen-year-old Alex and his friends set out on a diabolical orgy of robbery, rape, torture and murder. Alex is jailed for his teenage delinquency and the State tries to reform him - but at what cost?</p>
                                </div>
                                <div class="bk-right"></div>
                                <div class="bk-left">
                                    <h2>
                                        <span>Anthony Burghiss</span>
                                        <span>A Clockwork Orange</span>
                                    </h2>
                                </div>
                                <div class="bk-top"></div>
                                <div class="bk-bottom"></div>
                            </div>
                            <div class="bk-info">
                                <button class="bk-bookback">Flip</button>
                                <button class="bk-bookview">View inside</button>
                                <h3>
                                    <span>Anthony Burghiss</span>
                                    <span>A Clockwork Orange</span>
                                </h3>
                                <p>Social prophecy? Black comedy? Study of freewill? A Clockwork Orange is all of these. It is also a dazzling experiment in language, as Burghiss creates a new language - 'meow', the cat slang of a not-too-distant future.</p>
                            </div>
                        </li>
                        <li>
                            <div class="bk-book book-2 bk-bookdefault">
                                <div class="bk-front">
                                    <div class="bk-cover-back"></div>
                                    <div class="bk-cover">
                                        <h2>
                                            <span  style="font-size: 60px;">The Godfather</span>
                                            <span  style="font-size: 60px;">Mario Purrzo</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="bk-page">
                                    <div class="bk-content">
                                        <p>Whale catfish leatherjacket deep sea anglerfish grenadier sawfish pompano dolphinfish carp large-eye bream, squeaker amago. Sandroller; rough scad, tiger shovelnose catfish snubnose parasitic eel? Black bass soldierfish duckbill--Rattail Atlantic saury Blind shark California halibut; false trevally warty angler!</p>
                                    </div>
                                    <div class="bk-content">
                                        <p>Trahira giant wels cutlassfish snapper koi blackchin mummichog mustard eel rock bass whiff murray cod. Bigmouth buffalo ling cod giant wels, sauger pink salmon. Clingfish luderick treefish flatfish Cherubfish oldwife Indian mul gizzard shad hagfish zebra danio. Butterfly ray lizardfish ponyfish muskellunge Long-finned sand diver mullet swordfish limia ghost carp filefish.</p>
                                    </div>
                                    <div class="bk-content bk-content-current">
                                        <p>Red snapper Kafue pike fangtooth humums's slipmouth, salmon cutlassfish; swallower European perch mola mola sunfish, threadfin bream. Billfish hog sucker trout-perch lenok orbicular velvetfish. Delta smelt striped bass, medusafish dragon goby starry flounder cuchia round whitefish northern anchovy spadefish merluccid hake cat shark Black pickerel. Pacific cod.</p>
                                    </div>
                                </div>
                                <div class="bk-back">
                                    <p>Tyrant, blackmailer, racketeer, murderer - his influence reaches every level of American society. Meet Cat Corleone, a friendly cat, a just cat, a reasonable cat. The deadliest lord of the Cata Nostra. The Catfather.</p>
                                </div>
                                <div class="bk-right"></div>
                                <div class="bk-left">
                                    <h2>
                                        <span>The Godfather</span>
                                        <span>by Mario Purrzo</span>
                                    </h2>
                                </div>
                                <div class="bk-top"></div>
                                <div class="bk-bottom"></div>
                            </div>
                            <div class="bk-info">
                                <button class="bk-bookback">Flip</button>
                                <button class="bk-bookview">View inside</button>
                                <h3>
                                    <span>Mario Purrzo</span>
                                    <span>The Godfather</span>
                                </h3>
                                <p>A modern masterpiece,The Godfather is a searing portrayal of the 1940s criminal underworld. It is also the intimate story of the Corleone family, at once drawn together and ripped apart by its unique position at the core of the American Mafia. </p>
                            </div>
                        </li>
                        <li>
                            <div class="bk-book book-3 bk-bookdefault">
                                <div class="bk-front">
                                    <div class="bk-cover-back"></div>
                                    <div class="bk-cover">
                                        <h2>
                                            <span>J.C. Salinger</span>
                                            <span>The Catcher in the Rye</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="bk-page">
                                    <div class="bk-content bk-content-current">
                                        <p>Oceanic flyingfish spotted danio fingerfish leaffish, Billfish halibut Atlantic cod threadsail poacher slender mola. Swallower muskellunge, turbot needlefish yellow perch trout dhufish dwarf gourami false moray southern smelt cod dwarf gourami. Betta blue catfish bottlenose electric ray sablefish.</p>
                                    </div>
                                    <div class="bk-content">
                                        <p>Whale catfish leatherjacket deep sea anglerfish grenadier sawfish pompano dolphinfish carp large-eye bream, squeaker amago. Sandroller; rough scad, tiger shovelnose catfish snubnose parasitic eel? Black bass soldierfish duckbill--Rattail Atlantic saury Blind shark California halibut; false trevally warty angler!</p>
                                    </div>
                                    <div class="bk-content">
                                        <p>Trahira giant wels cutlassfish snapper koi blackchin mummichog mustard eel rock bass whiff murray cod. Bigmouth buffalo ling cod giant wels, sauger pink salmon. Clingfish luderick treefish flatfish Cherubfish oldwife Indian mul gizzard shad hagfish zebra danio. Butterfly ray lizardfish ponyfish muskellunge Long-finned sand diver mullet swordfish limia ghost carp filefish.</p>
                                    </div>
                                </div>
                                <div class="bk-back">
                                    <img src="" alt="cat"/>
                                    <p>Holden Catfield is a seventeen-year-old dropout who has just been kicked out of his fourth school. Navigating his way through the challenges of growing up, Holden dissects the 'phony' aspects of society.</p>
                                </div>
                                <div class="bk-right"></div>
                                <div class="bk-left">
                                    <h2>
                                        <span>J.C. Salinger</span>
                                        <span>The Catcher in the Rye</span>
                                    </h2>
                                </div>
                                <div class="bk-top"></div>
                                <div class="bk-bottom"></div>
                            </div>
                            <div class="bk-info">
                                <button class="bk-bookback">Flip</button>
                                <button class="bk-bookview">View inside</button>
                                <h3>
                                    <span>J.C. Salinger</span>
                                    <span>The Catcher in the Rye</span>
                                </h3>
                                <p>Originally published for adults, this novel has since become popular with adolescent readers for its themes of cat confusion, angst, alienation, and rebellion.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
    
        <section class="d-flex justify-content-center align-items-center" style="min-height: 60vh">
                <div class="container-fluid mb-5">
                    <div class="c-carousel mb-5 m-auto">
                        <h2 class="mb-4" style="color: var(--text-color-primary);">Recommendations</h2>
                        <div class="c-carousel__arrow c-carousel__arrow--left"></div>
                        <div class="c-carousel__arrow c-carousel__arrow--right"></div>
                        <ul class="c-carousel__slides ">
                            <li>
                                <a href=""><img class="img-bookss" src="../../Images/book8.jpg" /> </a>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center align-items-center pt-5">
                            <button onclick="window.location.href = '../Categories/Categories.html'" class="buttons text-uppercase">See More <i class="far fa-eye"></i></button>
                        </div>
                    </div>
                </div>
            </section>
    
            <div class="container-fluid">
            <div class="sectiontitle">
                <h2>Projects statistics</h2>
                <span class="headerLine"></span>
            </div>
            <div id="projectFacts" class="sectionClass">
                <div class="fullWidth eight columns">
                    <div class="projectFactsWrap ">
                        <div class="item wow fadeInUpBig animated animated" data-number="6" style="visibility: visible;">
                            <i class="fas fa-users"></i>
                            <p style="font-family: Helvetica;" id="number1" class="number">4</p>
                            <span></span>
                            <p style="font-family: Helvetica;">Staff Members</p>
                        </div>
                        <div class="item wow fadeInUpBig animated animated" data-number="435" style="visibility: visible;">
                            <i class="far fa-clock"></i>
                            <p style="font-family: Helvetica;" id="number2" class="number">+160</p>
                            <span></span>
                            <p style="font-family: Helvetica;">Sleepless Hours</p>
                        </div>
                        <div class="item wow fadeInUpBig animated animated" data-number="712" style="visibility: visible;">
                            <i class="fas fa-laptop-code"></i>
                            <p style="font-family: Helvetica;" id="number3" class="number">+10000 </p>
                            <span></span>
                            <p style="font-family: Helvetica;">Lines of Code</p>
                        </div>
                        <div class="item wow fadeInUpBig animated animated" data-number="1842" style="visibility: visible;">
                            <i class="far fa-file-word"></i>
                            <p style="font-family: Helvetica;" id="number4" class="number">4</p>
                            <span></span>
                            <p style="font-family: Helvetica;">Reports</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    
        </section>
    </section>

    {{-- <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("user_books") }}">books</a>
    <br>
    <a href="{{ route("user_ebooks") }}">ebooks</a>
    <br>
    <a href="{{ route("user_libbasket") }}">libBasket</a>
    <br>
    <a href="{{ route("user_reservedbooks") }}">reservedBooks</a>
    <br>
    <a href="{{ route("user_addEBookRequest") }}">addEBookDonation</a>
    <br>
    <a href="{{ route("user_settings") }}">settings</a>
    <br>
    <a href="{{ route("user_logout") }}">logout</a> --}}
@endsection
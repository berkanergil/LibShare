$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
});

//BOOKS

$('#sort-title').click(function() {
    tinysort('.books ul>li', 'span.book-title');
    $('.books ul li a').matchHeight();
})
$('#sort-author').click(function() {
    tinysort('.books ul>li', 'span.book-author');
    $('.books ul li a').matchHeight();
})
$('#sort-pub-date').click(function() {
    tinysort('.books ul>li', 'span.book-pub-date');
    $('.books ul li a').matchHeight();
})

// var mn = $(".sort");
// mns = "sort-scrolled";
// hdr = $('header').height();
// mc = $(".main");
// mcs = "main-scrolled";

// $(window).scroll(function() {
//     if ($(this).scrollTop() > hdr) {
//         mn.addClass(mns);
//         mc.addClass(mcs);
//     } else {
//         mn.removeClass(mns);
//         mc.removeClass(mcs);
//     }
// });
// $(function() {
//     $('.books ul li a').matchHeight();
// });
// 'use strict';

var carousel = function carousel(options) {

    var _carousel = {

        paused: false,

        stopped: false,

        options: {
            speed: 3000,
            acceleration: 5,
            reverse: false,
            selector: '.c-carousel',
            slidesSelector: '.c-carousel__slides',
            leftArrowSelector: '.c-carousel__arrow--left',
            rightArrowSelector: '.c-carousel__arrow--right'
        },

        init: function init() {
            var options = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

            // Copy options to this.options
            for (var prop in options) {
                if (!options.hasOwnProperty(prop)) break;
                this.options[prop] = options[prop];
            }

            // Cache nodes
            var carousel = document.querySelector(options.selector || this.options.selector);
            var slides = this._slides = carousel.querySelector(this.options.slidesSelector);
            this._leftArrow = carousel.querySelector(this.options.leftArrowSelector);
            this._rightArrow = carousel.querySelector(this.options.rightArrowSelector);

            // Multiply speed value by the number of slides
            this.options.speed = this.options.speed * slides.children.length;

            // Set slides container width
            this.width = slides.offsetWidth;

            // Repeat elements
            slides.innerHTML = slides.innerHTML + slides.innerHTML + slides.innerHTML;

            this._registerEvents();
            this._animate();
        },
        _registerEvents: function _registerEvents() {
            var _this = this;

            var speed = this.options.speed;
            var reverse = this.options.reverse;

            this._rightArrow.addEventListener('mouseover', function() {
                _this.options.speed = speed / _this.options.acceleration;
                _this.options.reverse = false;
            });
            this._rightArrow.addEventListener('mouseleave', function() {
                _this.options.speed = speed;
                _this.options.reverse = reverse;
            });
            this._leftArrow.addEventListener('mouseover', function() {
                _this.options.speed = speed / _this.options.acceleration;
                _this.options.reverse = true;
            });
            this._leftArrow.addEventListener('mouseleave', function() {
                _this.options.speed = speed;
                _this.options.reverse = reverse;
            });

            // Pause when cursor is over carousel
            this._slides.addEventListener('mouseover', this.pause.bind(this));
            this._slides.addEventListener('mouseleave', this.start.bind(this));

            // Pause when cursor is over carousel
            window.addEventListener('resize', function() {
                _this.width = _this._slides.offsetWidth;
            });
        },
        pause: function pause() {
            this.paused = true;
        },
        start: function start() {
            this.paused = false;
        },
        stop: function stop() {
            this.stopped = true;
        },
        _animate: function _animate() {
            var _this2 = this;

            var slides = this._slides;
            var oneThird = slides.lastElementChild.getBoundingClientRect().right / 3;
            var framesCount = 0;
            var step = 0;
            var posX = 0;

            var animate = function animate() {
                if (!_this2.paused) {

                    framesCount = _this2.options.speed * 60 / 1000;
                    step = oneThird / framesCount;

                    posX += _this2.options.reverse ? step : -step;

                    slides.style.transform = 'translateX(' + posX + 'px)';

                    if (_this2.options.reverse) {
                        if (posX >= _this2.width - oneThird) {
                            posX = _this2.width - oneThird * 2;
                        }
                    } else {
                        if (Math.abs(posX) >= oneThird * 2) {
                            posX = -oneThird;
                        }
                    }
                }!_this2.stopped && requestAnimationFrame(animate);
            };
            animate();
        }
    };

    _carousel.init(options);

    return _carousel;
};

window.onload = function() {
    return carousel({
        selector: '.c-carousel'
    });
};

/*CAROUSEL 3*/
var carousel = function carousel(options) {

    var _carousel = {

        paused: false,

        stopped: false,

        options: {
            speed: 3000,
            acceleration: 5,
            reverse: false,
            selector: '.c-carousel2',
            slidesSelector: '.c-carousel__slides2',
            leftArrowSelector: '.c-carousel__arrow--left2',
            rightArrowSelector: '.c-carousel__arrow--right2'
        },

        init: function init() {
            var options = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

            // Copy options to this.options
            for (var prop in options) {
                if (!options.hasOwnProperty(prop)) break;
                this.options[prop] = options[prop];
            }

            // Cache nodes
            var carousel = document.querySelector(options.selector || this.options.selector);
            var slides = this._slides = carousel.querySelector(this.options.slidesSelector);
            this._leftArrow = carousel.querySelector(this.options.leftArrowSelector);
            this._rightArrow = carousel.querySelector(this.options.rightArrowSelector);

            // Multiply speed value by the number of slides
            this.options.speed = this.options.speed * slides.children.length;

            // Set slides container width
            this.width = slides.offsetWidth;

            // Repeat elements
            slides.innerHTML = slides.innerHTML + slides.innerHTML + slides.innerHTML;

            this._registerEvents();
            this._animate();
        },
        _registerEvents: function _registerEvents() {
            var _this = this;

            var speed = this.options.speed;
            var reverse = this.options.reverse;

            this._rightArrow.addEventListener('mouseover', function() {
                _this.options.speed = speed / _this.options.acceleration;
                _this.options.reverse = false;
            });
            this._rightArrow.addEventListener('mouseleave', function() {
                _this.options.speed = speed;
                _this.options.reverse = reverse;
            });
            this._leftArrow.addEventListener('mouseover', function() {
                _this.options.speed = speed / _this.options.acceleration;
                _this.options.reverse = true;
            });
            this._leftArrow.addEventListener('mouseleave', function() {
                _this.options.speed = speed;
                _this.options.reverse = reverse;
            });

            // Pause when cursor is over carousel
            this._slides.addEventListener('mouseover', this.pause.bind(this));
            this._slides.addEventListener('mouseleave', this.start.bind(this));

            // Pause when cursor is over carousel
            window.addEventListener('resize', function() {
                _this.width = _this._slides.offsetWidth;
            });
        },
        pause: function pause() {
            this.paused = true;
        },
        start: function start() {
            this.paused = false;
        },
        stop: function stop() {
            this.stopped = true;
        },
        _animate: function _animate() {
            var _this2 = this;

            var slides = this._slides;
            var oneThird = slides.lastElementChild.getBoundingClientRect().right / 3;
            var framesCount = 0;
            var step = 0;
            var posX = 0;

            var animate = function animate() {
                if (!_this2.paused) {

                    framesCount = _this2.options.speed * 60 / 1000;
                    step = oneThird / framesCount;

                    posX += _this2.options.reverse ? step : -step;

                    slides.style.transform = 'translateX(' + posX + 'px)';

                    if (_this2.options.reverse) {
                        if (posX >= _this2.width - oneThird) {
                            posX = _this2.width - oneThird * 2;
                        }
                    } else {
                        if (Math.abs(posX) >= oneThird * 2) {
                            posX = -oneThird;
                        }
                    }
                }!_this2.stopped && requestAnimationFrame(animate);
            };
            animate();
        }
    };

    _carousel.init(options);

    return _carousel;
};

window.onload = function() {
    return carousel({
        selector: '.c-carousel'
    });
};






/*FLIPPING BOOKS*/
var Books = (function() {

    var $books = $('#bk-list > li > div.bk-book'),
        booksCount = $books.length;

    function init() {

        $books.each(function() {

            var $book = $(this),
                $other = $books.not($book),
                $parent = $book.parent(),
                $page = $book.children('div.bk-page'),
                $bookview = $parent.find('button.bk-bookview'),
                $content = $page.children('div.bk-content'),
                current = 0;

            $parent.find('button.bk-bookback').on('click', function() {

                $bookview.removeClass('bk-active');

                if ($book.data('flip')) {

                    $book.data({
                        opened: false,
                        flip: false
                    }).removeClass('bk-viewback').addClass('bk-bookdefault');

                } else {

                    $book.data({
                        opened: false,
                        flip: true
                    }).removeClass('bk-viewinside bk-bookdefault').addClass('bk-viewback');

                }

            });

            $bookview.on('click', function() {

                var $this = $(this);

                $other.data('opened', false).removeClass('bk-viewinside').parent().css('z-index', 0).find('button.bk-bookview').removeClass('bk-active');
                if (!$other.hasClass('bk-viewback')) {
                    $other.addClass('bk-bookdefault');
                }

                if ($book.data('opened')) {
                    $this.removeClass('bk-active');
                    $book.data({
                        opened: false,
                        flip: false
                    }).removeClass('bk-viewinside').addClass('bk-bookdefault');
                } else {
                    $this.addClass('bk-active');
                    $book.data({
                        opened: true,
                        flip: false
                    }).removeClass('bk-viewback bk-bookdefault').addClass('bk-viewinside');
                    $parent.css('z-index', booksCount);
                    current = 0;
                    $content.removeClass('bk-content-current').eq(current).addClass('bk-content-current');
                }

            });

            if ($content.length > 1) {

                var $navPrev = $('<span class="bk-page-prev">&lt;</span>'),
                    $navNext = $('<span class="bk-page-next">&gt;</span>');

                $page.append($('<nav></nav>').append($navPrev, $navNext));

                $navPrev.on('click', function() {
                    if (current > 0) {
                        --current;
                        $content.removeClass('bk-content-current').eq(current).addClass('bk-content-current');
                    }
                    return false;
                });

                $navNext.on('click', function() {
                    if (current < $content.length - 1) {
                        ++current;
                        $content.removeClass('bk-content-current').eq(current).addClass('bk-content-current');
                    }
                    return false;
                });

            }

        });

    }

    return {
        init: init
    };

})();
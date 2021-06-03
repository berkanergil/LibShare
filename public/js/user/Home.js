

/*BOOK CAROUSEL*/
var carousel1 = function carousel(options) {

    var _carousel1 = {

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
            var carousel1 = document.querySelector(options.selector || this.options.selector);
            var slides = this._slides = carousel1.querySelector(this.options.slidesSelector);
            this._leftArrow = carousel1.querySelector(this.options.leftArrowSelector);
            this._rightArrow = carousel1.querySelector(this.options.rightArrowSelector);

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

    _carousel1.init(options);

    return _carousel1;
};

window.onload = function() {
    return carousel1({
        selector: '.c-carousel'
    });
};



$.fn.jQuerySimpleCounter = function( options ) {
    var settings = $.extend({
        start:  0,
        end:    100,
        easing: 'swing',
        duration: 400,
        complete: ''
    }, options );

    var thisElement = $(this);

    $({count: settings.start}).animate({count: settings.end}, {
        duration: settings.duration,
        easing: settings.easing,
        step: function() {
            var mathCount = Math.ceil(this.count);
            thisElement.text(mathCount);
        },
        complete: settings.complete
    });
};

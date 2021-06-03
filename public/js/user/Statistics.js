$('#number1').jQuerySimpleCounter({end: 6,duration: 3000});
$('#number2').jQuerySimpleCounter({end: 435,duration: 3000});
$('#number3').jQuerySimpleCounter({end: 712,duration: 2000});
$('#number4').jQuerySimpleCounter({end: 1842,duration: 2500});



/* AUTHOR LINK */
$('.about-me-img').hover(function(){
    $('.authorWindowWrapper').stop().fadeIn('fast').find('p').addClass('trans');
}, function(){
    $('.authorWindowWrapper').stop().fadeOut('fast').find('p').removeClass('trans');
});
$(document).ready(function(){
    $('.mobile-button').click(function(e){
        e.preventDefault();
        $(this).toggleClass('opened');
        $('.mobile-menu').slideToggle(200);
    });
});
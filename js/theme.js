(function($){
    $(document).ready(function(){
        $('.child').hide(); //Hide children by default
        $('.parent').children().click(function () {
            // event.preventDefault();
            $(this).children('.child').slideToggle('slow');
            $(this).find('span').toggle();
        });
        $('nav#menu').mmenu();
    });
    $(window).load(function(){

    });




    $('.widget > ul').addClass('list-group-flush');
    $('.widget > ul li').addClass('list-group-item');
})(jQuery);
(function($){
    $(document).ready(function(){
        $('.child').hide(); //Hide children by default
        $('.parent').children().click(function () {
            event.preventDefault();
            $(this).children('.child').slideToggle('slow');
            $(this).find('span').toggle();
        });
    });
    $(window).load(function(){

    });
})(jQuery);
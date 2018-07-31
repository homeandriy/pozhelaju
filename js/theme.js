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

    var clipboard = new ClipboardJS('.copy');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
})(jQuery);
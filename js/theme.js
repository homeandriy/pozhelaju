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

    $('#open-search').on('click', function (event) {
        event.preventDefault();
        console.log($(this));
        $('#s-box').removeClass('hide-search-box');
        $('#s-box').addClass('search-wrap');
    })
    $('#close-search').on('click', function (event) {
        event.preventDefault();
        console.log($(this));
        $('#s-box').addClass('hide-search-box');
        $('#s-box').removeClass('search-wrap');
    })

    function return_rend_color ()
    {
        var arr_color =['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
        return arr_color[randomIntFromInterval(0,6)];
    }
    function randomIntFromInterval(min,max)
    {
        return Math.floor(Math.random()*(max-min+1)+min);
    }
    $('.widget-title').each(function () {
        $(this).addClass('bg-'+return_rend_color ())
    })
})(jQuery);
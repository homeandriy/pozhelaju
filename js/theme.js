(function($){
    $(document).ready(function(){
        $('.child').hide(); //Hide children by default
        $('.parent').children().click(function () {
            event.preventDefault();
            $(this).children('.child').slideToggle('slow');
            $(this).find('span').toggle();
        });
        $('nav#menu').mmenu();
    });
    $(window).load(function(){

    });

    var clipboard = new ClipboardJS('.copy');

    clipboard.on('success', function(event) {
        event.trigger.innerHTML = '<i class="fa fa-check-square-o" aria-hidden="true"></i> Скопировано';
        event.trigger.style.backgroundColor = '#3498DB';
        window.setTimeout(function() {
            event.trigger.innerHTML = '<i class="fa fa-clipboard" aria-hidden="true"></i>  Скопировать';
            event.trigger.style.backgroundColor = "#34495e";
        }, 2000);
    });

    clipboard.on('error', function(event) {
        event.trigger.innerHTML = '<span>Ваш браузер не поддерживает автоматическое копирование, нажмите Ctrl+C для копирования </span>';
        window.setTimeout(function() {
            event.trigger.textContent = 'Copy';
        }, 2000);
    });
})(jQuery);
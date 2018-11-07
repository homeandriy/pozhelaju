(function($){
	$(document).ready(function(){
		$('.child').hide(); //Hide children by default
		$('.parent').children().click(function () {
			// event.preventDefault();
			$(this).children('.child').slideToggle('slow');
			$(this).find('span').toggle();
		});
		$('nav#menu').mmenu();


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

		$('#open-search').on('click', function (event) {
			event.preventDefault();
			// console.log($(this));
			$('#s-box').removeClass('hide-search-box');
			$('#s-box').addClass('search-wrap');
		})
		$('#close-search').on('click', function (event) {
			event.preventDefault();
			// console.log($(this));
			$('#s-box').addClass('hide-search-box');
			$('#s-box').removeClass('search-wrap');
		})



	});
	$(window).load(function(){

	});




	$('.widget > ul').addClass('list-group-flush');
	$('.widget > ul li').addClass('list-group-item');    

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



	$('.list_all_prazdniks>a').click( function(e) {

			e.preventDefault();

			$.ajax({
				url: window.ajaxurl,
				type: 'POST',
				data: {
					action : 'all_holidays',
				},
				beforeSend: function() {
					// $('#misha_button').text('Загрузка, 5 сек...');
				},
				success: function( res ) {
					var list_cat = JSON.parse(res);
					console.log(list_cat);
					var formatHTML = new String();

					list_cat.map( function (element) {

						var name = element.name;

						if( element.name.indexOf('Поздравления на') != -1 ) {
							name = element.name.replace( 'Поздравления на', '');
						}

						if( element.name.indexOf('Поздравление') != -1 ) {
							name = element.name.replace( 'Поздравление', '');
						}

						if( element.name.indexOf('Поздравления с') != -1 ) {
							name = element.name.replace( 'Поздравления с', 'С');
						}

						return formatHTML+= '<a href="'+ element.url +'" class="">'+ name + '</a><br/>';
					});
					$('#all_holidays').append( formatHTML );
					// console.log( res );
				}
			});
			
			$('#list_holidays').modal('show');
			$('#list_holidays').css({
				'background-color': 'rgba(2,2,2,.8)',
				
			});
			

		});

	var open = false;

	var show_right_panel = function ( this_open ) {
		open = !this_open;

		if( this_open  == false ) {
			var html_content = $('#secondary').html();
			
		}
	}

	
	$(document).on('click', '#right_panel', function(event) {
		event.preventDefault();
		/* Act on the event */
		show_right_panel ( open ? true : false );
	});
})(jQuery);
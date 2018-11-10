(function($){
	$(document).ready(function(){
		$('.child').hide(); //Hide children by default
		$('.parent').children().click(function () {
			// event.preventDefault();
			$(this).children('.child').slideToggle('slow');
			$(this).find('span').toggle();
		});
		$('nav#menu').mmenu();


		$('.copy').on('click', function(event) {
			/* Act on the event */
			event.preventDefault();
		});

		var clipboard = new ClipboardJS('.copy');

		clipboard.on('success', function(event) {
			event.trigger.innerHTML = '<i class="fa fa-check-square-o" aria-hidden="true"></i> Скопировано';
			event.trigger.style.backgroundColor = '#3498DB';
			event.trigger.style.color = "#ffffff";
			window.setTimeout(function() {
				event.trigger.innerHTML = '<i class="fa fa-clipboard" aria-hidden="true"></i>  Скопировать';
				event.trigger.style.backgroundColor = "#34495e";
				event.trigger.style.color = "#ffffff";
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
			if($(this).hasClass('is_open_s'))
			{
				$(this).removeClass('is_open_s');
				$('#search_input').removeClass('is_open_s');


				$('#search_input').css({
					'height' : '0px',
					'top'    : $('#masthead').outerHeight()+ 5 + 'px',
					'opacity'    : 0
				});

				setTimeout( function() {
					$('#search_input').css({'visibility' : 'hidden'});
				},800);
			}
			else {
				$(this).addClass('is_open_s');
				$('#search_input').addClass('is_open_s');

				$('#search_input').css({
					top          : $('#masthead').outerHeight()+ 5 + 'px',
					'height'     : '100px',
					'visibility' : 'visible',
					'opacity'    : 1
				});

				$('#search').focus();
			}
			

		});

		var container = $("#search_input"); // YOUR CONTAINER SELECTOR

	  	$(document).mouseup(function (e)
        {
		  	if (!container.is(e.target) && container.has(e.target).length === 0 && container.hasClass('is_open_s')) // ... nor a descendant of the container
		  	{
		  		$('#open-search').removeClass('is_open_s');
				$('#search_input').removeClass('is_open_s');

			    $('#search_input').css({
					'height' : '0px',
					'top'    : $('#masthead').outerHeight()+ 5 + 'px',
					'opacity'    : 0
				});
		  	}
	  	});

		$('#close-search').on('click', function (event) {
			event.preventDefault();
			// console.log($(this));
			// $('#s-box').addClass('hide-search-box');
			// $('#s-box').removeClass('search-wrap');
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
		

		var html_content = $('#secondary').html();
		var panel = $('#r_mob_menu');

		if( this_open  == false ) {
			
			panel.css({
				width   : 0
			});
			setTimeout(function(){
				panel.html('');
			}, 800);
			
		}
		else {
			panel.append( html_content );
			panel.css({
				width   : window.screen.availWidth,
				top     : +$('#mob_navbar').outerHeight()+ 5 + 'px'
			});
		}

		
	}

	
	$(document).on('click', '#right_panel', function(event) {
		event.preventDefault();
		/* Act on the event */
		// var open = true;
		console.log(open);
		show_right_panel ( open ? false : true );
		open = !open;
	});

	if($('#bottom_panel').length > 0 )
	{
		setTimeout(function () {
			$('#bottom_panel').css({
				height : '40px'
			});
		},2000);
		
	}


	var time_i = +new Date;
	$('#search').on('keyup', function(event) {
		event.preventDefault();		
		if($(this).val().length >= 3) {

			if( +new Date - time_i >= 500 ) {
				// console.log( +new Date - time_i );

				search( $(this).val() );
				time_i = +new Date;
			}
			else {
				time_i = +new Date;
			}
		}
	});

	function search ( $what_search ) {
		$.ajax({
				url: window.ajaxurl,
				type: 'POST',
				data: {
					action : 'search',
					word   : $what_search
				},
				beforeSend: function() {
					// $('#misha_button').text('Загрузка, 5 сек...');
				},
				success: function( res ) {
					var list_cat = JSON.parse(res);
					console.log(list_cat);
					
					// console.log( res );
				}
			});
	}

})(jQuery);
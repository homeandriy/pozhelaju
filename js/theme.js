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

		$('#menu').css({visibility: 'visible'});

		function mobile_content_top_fix () {
			if(window.innerWidth < 990) {
				$('.site-content').css({'margin-top': '1%'});
			}
			else {
				$('.site-content').css({'margin-top': '0'});
			}
		}
		mobile_content_top_fix();

		$( window ).resize(function(event) {
			mobile_content_top_fix();
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
					'opacity'    : 0,
					'visibility' : 'hidden'
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
					'height'     : 'max-content',
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
					'opacity'    : 0,
				    'visibility' : 'hidden'
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

	var mo = function () {
			var m = new Date().getMonth();
			return ++m
		}
	var calendar = {
		mounth : mo(),
		yearYoSearch : 2018,
		currentYear : new Date().getFullYear(),
		currentDay  : new Date().getDate(),
		mounthName : {
					'1' : 'Январь',
					'2' : 'Февраль',
					'3' : 'Март',
					'4' : 'Апрель',
					'5' : 'Май',
					'6' : 'Июнь',
					'7' : 'Июль',
					'8' : 'Август',
					'9' : 'Сентябрь',
					'10' : 'Октябрь',
					'11' : 'Ноябрь',
					'12' : 'Декабрь'
					}
	}

	$('.list_all_prazdniks>a').click( function(e) {

			e.preventDefault();
			ajaxCalendar()

	});

	$('#move-mounth-to-end').click( function(e) {

			// e.preventDefault();
			--calendar.mounth < 1 ? calendar.mounth = 12 : calendar.mounth;
			
			ajaxCalendar()

	});

	$('#move-mounth-to-start').click( function(e) {

			// e.preventDefault();
			++calendar.mounth >= 13 ? calendar.mounth = 1: calendar.mounth;
			ajaxCalendar()

	});


	function ajaxCalendar () {
		$.ajax({
			url: window.ajaxurl,
			type: 'POST',
			data: {
				action : 'all_holidays',
				param :  calendar
			},
			beforeSend: function() {
				$('#all_holidays').html('').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');
			},
			success: function( res ) {

				
				// Перевіряємо чи відкрите меню?
				// Якщо відкрите, то закриємо
				if($('nav#menu').hasClass('mm-menu_opened')) {
					$("nav#menu").data( "mmenu" ).close();
				}

				if($('#right_panel').hasClass('open_right_menu') ) {
					show_right_panel(false);
				}

				$('#list_holidays').modal('show');
				var list_cat = JSON.parse(res);
				// console.log(list_cat);
				var formatHTML = new String();

				$('#curr_mounth').text(calendar.mounthName[calendar.mounth]);
				createCalendar("all_holidays", calendar.currentYear, calendar.mounth, list_cat.result);
				// console.log( res );
			}
		});
		
		
		$('#list_holidays').css({
			'background-color': 'rgba(2,2,2,.8)',
			
		});
		
	}

	// Пеерключалка місяців
	window.openMounth = function (evt) {
		
		var m = new Date($(evt.target).val()).getMonth();
		calendar.mounth = ++m;

		ajaxCalendar();
	}
	function createCalendar(id, year, month, objday) {
		var elem = document.getElementById(id);

		var mon = month - 1; // месяцы в JS идут от 0 до 11, а не от 1 до 12
		var d = new Date(year, mon);

		var table = '<div class="table-responsive"><table class="table table-hover table-bordered"><tr><th>пн</th><th>вт</th><th>ср</th><th>чт</th><th>пт</th><th>сб</th><th>вс</th></tr><tr>';

		// заполнить первый ряд от понедельника
		// и до дня, с которого начинается месяц
		// * * * | 1  2  3  4
		for (var i = 0; i < getDay(d); i++) {
			table += '<td></td>';
		}

		// ячейки календаря с датами
		while (d.getMonth() == mon) {
			
			// Змінна для того щоб виділити активний лень у календарі
			var active = '';
			if(d.getDate() === calendar.currentDay && new Date().getMonth() === mon)
				active = 'active-day';
			table += '<td class="'+active+'" ><div class="current-date">' + d.getDate() + '</div><br>'+searchCurrentDateHolidays(d.getDate(), objday)+'</td>';

			if (getDay(d) % 7 == 6) { // вс, последний день - перевод строки
				table += '</tr><tr>';
			}

			d.setDate(d.getDate() + 1);
		}

		// добить таблицу пустыми ячейками, если нужно
		if (getDay(d) != 0) {
			for (var i = getDay(d); i < 7; i++) {
				table += '<td></td>';
			}
		}

		// закрыть таблицу
		table += '</tr></table></div>';

		// только одно присваивание innerHTML
		elem.innerHTML = '';
		elem.innerHTML = table;
	}

	function searchCurrentDateHolidays ( day, objectWhere ) {
		var htmlBuild = '';
		var count = 1;
		objectWhere.map( function(element){
			holidaydate = new Date(element.meta_value).getDate();

			// console.log(holidaydate);
			if(holidaydate === day) {
				var str = element.name.replace(/(Поздравления|Поздравление)/gm, '');
				htmlBuild += '<a href="/category/'+element.slug+'" class="item-title">'+count+'. '+str+'</a><br><hr>';
				count++;
			}
		});

		return htmlBuild;
	}

	function getDay(date) { // получить номер дня недели, от 0(пн) до 6(вс)
		var day = date.getDay();
		if (day == 0) day = 7;
			return day - 1;
	}



	   

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
		// event.preventDefault();

		show_right_panel ( open ? false : true );
		if(!open) {
			$(this).addClass('open_right_menu');
		}
		else {
			$(this).removeClass('open_right_menu');
		}
		
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

					$('#ressearch').html('');

					console.log(list_cat.htmlCreateCategory.no_result);
					if( list_cat.htmlCreateCategory.no_result === undefined ) {
						$('#ressearch').html(render_category_list(list_cat.htmlCreateCategory));
					}
					
					console.log(list_cat);
					
					// console.log( res );
				}
			});
	}

	function render_category_list ( array_list ) {

		var startHTML = '<table class="table">\
  						<thead>\
					    	<tr>\
						      <th scope="col">#</th>\
						      <th scope="col">Категория</th>\
						      <th scope="col">Родители</th>\
						    </tr>\
						  </thead> <tbody>';
	  	var mapRes = '';
		if( Array.isArray( array_list ) ) {
			array_list.map( function ( element , index ) {
				var linkToRes = element['linksParent'] === undefined ? '': element['linksParent']; 
				return mapRes += ' <tr>\
									      <th scope="row">'+ index +'</th>\
									      <td><a href="'+ element['url'] +'">'+element['name']+'</a></td> \
									      <td>'+ linkToRes +'</td>\
									    </tr>';
			} );
		}

		startHTML += mapRes + '</tbody></table>';
		return startHTML;
	} 

	$('.entry-content').hover(function() {
		console.log($(this));
		/* Stuff to do when the mouse enters the element */
		$('.square-' + $(this).data('attrid')).css({
			opacity: 1
		});
	}, function() {
		/* Stuff to do when the mouse leaves the element */
		$('.square-' + $(this).data('attrid')).css({
			opacity: 0
		});
	});

})(jQuery);
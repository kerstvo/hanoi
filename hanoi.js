var Hanoi = function(el, cnt){
	var columns_selector		= '[data-type="column"]', 
		block_selector			= '[data-type="block"]',
		columns					= el.find(columns_selector),
		tower_h					= el.find('[data-type="tower"]').height(),
		victory_el				= el.find('[data-type="victory"]'),
		counter_el				= el.find('[data-type="counter"]'),
		share_el				= el.find('[data-type="share"]'),
		counter					= 0,
		timer_el				= el.find('[data-type="timer"]'),
		timer					= 0,
		timer_interval			= 0,
		min_width				= 20,
		from					= 0,
		to						= 0,
		count					= cnt;

	var init = function(){
		generate_blocks(3);
		// обнулим счетчики, таймеры
		counter_el.text(counter);
		timer_el.text(timer);
		clearInterval(timer_interval);
		victory_el.hide();

		columns.sortable({
			connectWith: columns_selector,
			items: '> [data-sortable]',
			start: function( event, ui ){
				// сохраним откуда тащим
				from =  ui.item.parent().data("num");
				// запустим таймер игры, как только взяли первый блок
				if (timer_interval === 0) timer_interval = setInterval(start_timer,1000);
			},
			beforeStop: function( event, ui ){
				var blocks = ui.item.siblings().filter(block_selector);

				// только если это верхний блок
				if (ui.item.data('sortable') === false){
					return false;
				}
				if (blocks.length > 0){
					// prevent putting one block before existing
					if (ui.item.prevAll(block_selector).length > 0){
						return false;
					}
					// prevent putting one block on wider other
					if(ui.item.nextAll(block_selector).data('width') < ui.item.data('width')){
						return false;
					}
				}
			},
			stop: function( event, ui ){
				// сохраним куда тащим
				to =  ui.item.parent().data("num");
				// если было перемещение на другую башню
				if (from !== to){
					// обновим счетчик
					counter_el.text(++counter);
					// запишем в файл
					save(counter,from,to,timer);
				}
				// проверим на победу, если в одной башне все собрались - умница
				var blocks_count = ui.item.siblings().filter(block_selector).length;
				if ( blocks_count === count-1 && to != 1 ){
					clearInterval(timer_interval);
					// columns.sortable('disable');
					victory_el.show();
					new Ya.share({
						element: 'ya_share',
						theme: 'counter',
						elementStyle: {
							'type': 'icon',
							'linkIcon': true,
							'quickServices': ['vkontakte', 'facebook', 'twitter', 'odnoklassniki', 'gplus'],
						},
						link: window.location.href,
						title: 'Онлайн игра Ханойские башни',
						description: "Блоков: " + count + ",  шагов: " + counter + "; секунд: " + timer,
						image: window.location.href + "hanoi.png",
					});
					// запишем в файл победу!!
					save(counter,0,0,timer);
				}
			},
		});
	};

	// таймер игры
	var start_timer = function(){
		timer_el.text(++timer);
	};

	// сохраним в файл на сервере
	var save = function(counter, from, to){
		$.ajax({
				url: 'hanoi.php',
				type: 'post',
				data: {'counter':counter, 'from': from, 'to': to, 'timer': timer},
				success: function (data) {
					
				}
			});
		// console.log(from+' -> '+to);
	};

	// генерируем нужное количество блоков
	var generate_blocks = function(){
		var delta				= (100 - min_width) / (count - 1),
			block_h			= tower_h / count,
			generated_blocks	= "";

		// columns.css('min-height',(block_h)+'px');

		for(var i = min_width; i <= 101; i += delta){
			generated_blocks += '<tr class="block-wrapper" data-type="block" data-width="'+i+'" data-sortable="false" style="height:'+block_h+'px;"><td class="block" style="width: '+i+'%;">&nbsp;</td></tr>';
		}

		columns.html("<tr><td></td></tr>");

		// начинаем с певой башни
		columns.first().append(generated_blocks);
		renew_sortable();
	};

	// нельзя двигать нижние блоки, только те, которые сверху
	var renew_sortable = function(){
		columns.each(function(i){
			$(this).find(block_selector).data('sortable', false);
			$(this).find(block_selector).first().data('sortable', true);
		});
	};

	// после каждого хода нужно обновить состояние блоков
	columns.on("sortstop", function( event, ui ){
		renew_sortable();
	});

	init();
};

$('#hanoi-start').on('click',function(){
	var crcl_cnt = $('#inputblocks-Count').val();

	hanoi = new Hanoi($('[data-type=Hanoi]'), crcl_cnt);
});

$('#hanoi-start').trigger('click');
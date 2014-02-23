var Hanoy = function(el, cnt){
	var columns_selector		= '[data-type="column"]', 
		block_selector			= '[data-type="block"]',
		columns					= el.find(columns_selector),
		tower_h					= el.find('[data-type="tower"]').height(),
		counter_el				= el.find('[data-type="counter"]'),
		counter					= 0,
		timer_el				= el.find('[data-type="timer"]'),
		timer					= 0,
		timer_interval			= 0,
		min_width				= 20,
		from					= 0,
		to						= 0,
		count					= cnt;

	var init = function(){
		// обнулим счетчик
		counter_el.text(counter);
		timer_el.text(timer);
		clearInterval(timer_interval);

		columns.sortable({
			connectWith: columns_selector,
			items: '> [data-sortable]',
			start: function( event, ui ){
				// сохраним откуда тащим
				from =  ui.item.parent().data("num");
				if (timer_interval == 0) timer_interval = setInterval(start_timer,1000);
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
					save(counter,from,to);
				}
			},
		});
	};

	var start_timer = function(){
		timer_el.text(++timer);
	};

	var save = function(counter, from, to){
		$.ajax({
				url: 'hanoy.php',
				type: 'post',
				data: {'counter':counter, 'from': from, 'to': to},
				success: function (data) {
					
				}
			});
		// console.log(from+' -> '+to);
	};

	var generate_blocks = function(){
		var delta				= (100 - min_width) / (count - 1),
			block_h			= tower_h / count,
			generated_blocks	= "";

		// columns.css('min-height',(block_h)+'px');

		for(var i = min_width; i <= 101; i += delta){
			generated_blocks += '<tr class="block-wrapper" data-type="block" data-width="'+i+'" data-sortable="false" style="height:'+block_h+'px;"><td class="block" style="width: '+i+'%;">&nbsp;</td></tr>';
		}

		columns.html("<tr><td></td></tr>");

		columns.first().append(generated_blocks);
		renew_sortable();
	};

	var renew_sortable = function(){
		columns.each(function(i){
			$(this).find(block_selector).data('sortable', false);
			$(this).find(block_selector).first().data('sortable', true);
		});
	};

	columns.on("sortstop", function( event, ui ){
		renew_sortable();
	});

	generate_blocks(3);
	init();
};

var hanoy = new Hanoy($('[data-type=Hanoy]'), 3);


$('#hanoy-start').on('click',function(){
	var crcl_cnt = $('#inputblocks-Count').val();

	hanoy = new Hanoy($('[data-type=Hanoy]'), crcl_cnt);
});
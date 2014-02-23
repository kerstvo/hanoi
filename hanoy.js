var Hanoy = function(el, cnt){
	var columns_selector		= '[data-type="column"]', 
		circle_selector			= '[data-type="circle"]',
		columns					= el.find(columns_selector),
		tower_h					= el.find('[data-type="tower"]').height(),
		counter_el				= el.find('[data-type="counter"]'),
		counter					= 0,
		min_width				= 20,
		from					= 0,
		to						= 0,
		count					= cnt;

	var init = function(){
		counter_el.text(counter);
		columns.sortable({
			connectWith: columns_selector,
			items: '> [data-sortable]',
			start: function( event, ui ){
				// сохраним откуда тащим
				from =  ui.item.parent().data("num");
			},
			beforeStop: function( event, ui ){
				var circles = ui.item.siblings().filter(circle_selector);

				if (ui.item.data('sortable') === false){
					return false;
				}
				if (circles.length > 0){
					// prevent putting one circle before existing
					if (ui.item.prevAll(circle_selector).length > 0){
						return false;
					}
					// prevent putting one circle on wider other
					if(ui.item.nextAll(circle_selector).data('width') < ui.item.data('width')){
						return false;
					}
				}
			},
			stop: function( event, ui ){
				// сохраним куда тащим
				to =  ui.item.parent().data("num");
				// запишем в файл
				save(from,to);
				counter_el.text(++counter);
			},
		});
	};

	var save = function(from, to){
		$.ajax({
				url: 'hanoy.php',
				type: 'post',
				data: {'from': from, 'to': to},
				success: function (data) {
					
				}
			});
		console.log(from+' -> '+to);
	};

	var generate_circles = function(){
		var delta				= (100 - min_width) / (count - 1),
			circle_h			= tower_h / count,
			generated_circles	= "";

		// columns.css('min-height',(circle_h)+'px');

		for(var i = min_width; i <= 101; i += delta){
			generated_circles += '<tr class="circle-wrapper" data-type="circle" data-width="'+i+'" data-sortable="false" style="height:'+circle_h+'px;"><td class="circle" style="width: '+i+'%;">'+i+'</td></tr>';
		}

		columns.html("<tr><td></td></tr>");

		columns.first().append(generated_circles);
		renew_sortable();
	};

	var renew_sortable = function(){
		columns.each(function(i){
			$(this).find(circle_selector).data('sortable', false);
			$(this).find(circle_selector).first().data('sortable', true);
		});
	};

	columns.on("sortstop", function( event, ui ){
		renew_sortable();
	});

	generate_circles(3);
	init();
};

var hanoy = new Hanoy($('[data-type=Hanoy]'), 3);


$('#hanoy-start').on('click',function(){
	var crcl_cnt = $('#inputCircles-Count').val();

	hanoy = new Hanoy($('[data-type=Hanoy]'), crcl_cnt);
});
$(window).ready(function(){
	$('.panel_tasks').css('left', ($('.panel_tasks').width()*2)-20);
	$('.panel_task_home').css('right', -$('.panel_task_home').width());
});
$('.panel_tasks').hover(function(){
	if($(this).attr('class')!='panel_tasks active'){
		$(this).children('i').animate({'opacity':0},200);
		$(this).animate({
			left: $('.panel_tasks').width()+'px'
		},200, function(){
			$(this).attr('class', 'panel_tasks active');
		});
	}
}, function(){
	if($(this).attr('class')=='panel_tasks active'){
		$(this).children('i').animate({'opacity':1},200);
		$(this).attr('class', 'panel_tasks');
		$(this).animate({
			left: ($('.panel_tasks').width()*2)-20+'px'
		},200);
	}
}).on('hover', 'body', function(){
	left: ($('.panel_tasks').width()*2)-20+'px'
});
$('.task').hover(function(){
	$id_task = $(this).data('task_id');
	$id_account = $(this).data('id');
	// alert($id);
	$.ajax({
		url: 'libs/function/add_view_account.php',
		type: 'post',
		data: {
			id_task:$id_task,
			id_account:$id_account
		}
	});
	$(this).children('.panel_task_home').animate({
		right: '0px'
	},300);
}, function(){
	$(this).children('.panel_task_home').animate({
		right: -$('.panel_task_home').width()+'px'
	},300);
})
$('#task_ok').click(function(e){
	e.preventDefault();
	$id_task = $(this).parent('.panel_task_home').parent('.task').data('task_id');
	$.ajax({
		url: 'libs/function/update_active.php',
		type: 'post',
		data: {
			id_task:$id_task
		},
		success: function(){
			location.reload();
		}
	});
})
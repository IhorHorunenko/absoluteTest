$(window).ready(function(){
	$('.panel_tasks').css('left', ($('.panel_tasks').width()*2)-20);
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
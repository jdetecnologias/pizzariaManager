$(document).ready(function(){
	$("button").each(function(e){
		$(this).text($(this).attr("id"));
		
	});
	
	$("button#hide").on("click",function(){
		$(this).siblings("div").hide();
		
	});
	$("button#show").on("click",function(){
		$(this).siblings("div").show();
		
	});
	$("button#toggle").on("click",function(){
		$(this).siblings("div").toggle();
		
	});
	$("button#fadeIn").on("click",function(){
		$(this).siblings("div").fadeIn();
		
	});
	$("button#fadeOut").on("click",function(){
		$(this).siblings("div").fadeOut();
		
	});
	$("button#fadeToggle").on("click",function(){
		$(this).siblings("div").fadeToggle();
		
	});
	$("button#fadeTo").on("click",function(){
		$(this).siblings("div").fadeTo("slow",0.4);
		
	});
	$("button#slideDown").on("click",function(){
		$(this).siblings("div").slideDown(5000);
		
	});
	$("button#slideUp").on("click",function(){
		$(this).siblings("div").slideUp(5000);
		
	});
	$("button#slideToggle").on("click",function(){
		$(this).siblings("div").slideToggle(5000);
		
	});
	$("button#stop").on("click",function(){
		$(this).siblings("div").stop();
		
	});
	
	$("button#animar").on("click", function(){
		$(this).next().animate({
			fontSize:'33px',
			textAlign: 'right'
			
		});
		
	});
	
	
});
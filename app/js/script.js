$(document).ready(function() {

    $('.datepicker').datepicker({
		format: 'yyyy/mm/dd',
		autoclose: true
	});

	var swipe = new Hammer(document);
	// detect swipe and call to a function
	swipe.on('swiperight swipeleft', function(e) {
	  e.preventDefault();
	  if (e.type == 'swiperight') {
	    // open menu
	    $('.sidenav-mobile').animate({
	      width: "250px",
	      display: 'block'
	    });
	  } else {
	    // close/hide menu
	    $('.sidenav-mobile').animate({
	      width: "0px",
	      display: 'none'
	    });
	  }

	});

	// function fullHeight(){
	//     $('.block-left').css({
	//         height: $(window).height() + 'px'
	//     });
	// };
	 
	// задаем высоту при первичной загрузке
	// fullHeight();
	 
	// высота при изменении размера окна браузера
	// $(window).resize( fullHeight );

	// Get width
	// var large = 1200;
	// var medium = 992;
	// var small = 768;
	// function getWidth(){
	// 	if($(window).width() > medium ){
	// 		document.location.href="http://todo/main.php";
	// 		console.log(1);
	// 	}else if($(window).width() > small && $(window).width() <= medium){
	// 		document.location.href="http://todo/main.php";
	// 		console.log(2);
	// 	}else if($(window).width() <= small){
	// 		document.location.href="http://todo/m.main.php";
	// 		console.log(3);

	// 	}
	// }

	// getWidth();

	// $(window).resize( getWidth );
	


});
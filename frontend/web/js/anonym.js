$(document).ready(function() {

	$('.slider-of-news').slick({
		infinite: true,
		dots: false,
		arrows: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 756,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});


	$('.slider-of-news-big').slick({
		infinite: true,
		dots: false,
		arrows: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 756,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});



	$('.slider-in-news-news').slick({
		infinite: true,
		dots: false,
		arrows: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 756,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});




	if ($('#market').length>0) {
		var market= document.getElementById("market").getContext("2d");
		var pieDataM = [
			{
				value: 1,
				color:"#656668"
			},
			{
				value : 27,
				color : "#d7e8f1"
			},
			{
				value : 36,
				color : "#b3d2e1"
			},
			{
				value : 21,
				color : "#75b4cc"
			},
			{
				value : 6,
				color : "#54a8c3"
			},
			{
				value : 7,
				color : "#00447c"
			},
			{
				value : 7,
				color : "#000"
			}
		];

		var pieOptions = {
			segmentShowStroke : false,
			animateScale : true
		};

		new Chart(market).Pie(pieDataM, pieOptions);
	};

	if ($('#market-two').length>0) {
		var marketTwo= document.getElementById("market-two").getContext("2d");
		var pieDataM2 = [
			{
				value: 1,
				color:"#656668"
			},
			{
				value : 27,
				color : "#d7e8f1"
			},
			{
				value : 36,
				color : "#b3d2e1"
			},
			{
				value : 21,
				color : "#75b4cc"
			},
			{
				value : 6,
				color : "#54a8c3"
			},
			{
				value : 7,
				color : "#00447c"
			},
			{
				value : 7,
				color : "#000"
			}
		];

		new Chart(marketTwo).Pie(pieDataM2, pieOptions);
	};

	if ($('#market-three').length>0) {
		var marketThree= document.getElementById("market-three").getContext("2d");
		var pieDataM3 = [
			{
				value: 1,
				color:"#656668"
			},
			{
				value : 27,
				color : "#d7e8f1"
			},
			{
				value : 36,
				color : "#b3d2e1"
			},
			{
				value : 21,
				color : "#75b4cc"
			},
			{
				value : 6,
				color : "#54a8c3"
			},
			{
				value : 7,
				color : "#00447c"
			},
			{
				value : 7,
				color : "#000"
			}
		];

		new Chart(marketThree).Pie(pieDataM3, pieOptions);
	};




	$('.open_menu').on('click', function(event) {
		event.preventDefault();
		$(this).siblings('ul').slideToggle();
	});

	$('.open_menu-all-news').on('click', function(event) {
		event.preventDefault();
		console.log('test');
		$(this).siblings('ul').slideToggle();
	});

	function windowSize(){
		if ($(window).width() >= '768'){
			$('.secondary-menu>ul').show();
			$('.secondary-menu>ul').css('display','table');
		} else {
			$('.secondary-menu>ul').hide();
		}
	}
	$(window).resize(windowSize); // при изменении размеров
	// или "два-в-одном", вместо двух последних строк:
	$(window).on('load resize',windowSize);



});
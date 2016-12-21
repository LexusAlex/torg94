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




	$('.open_menu').on('click', function(event) {
    	event.preventDefault();
    	$(this).siblings('ul').slideToggle();
    });

 
});
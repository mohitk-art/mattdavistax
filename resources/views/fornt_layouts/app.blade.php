<!DOCTYPE HTML>
<html>
<head>
<title>Tax Preparations Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Decline Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG,sonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ url('fornt/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />


<link href='//fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,600i,700,700i,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
<!--Custom-Theme-files-->
<link href="{{ url('fornt/css/font-awesome.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url('fornt/css/flexslider.css') }}" type="text/css" media="screen" property="" /><!--Blog slider-->
<link rel="stylesheet" href="{{ url('fornt/css/slider.css') }}">
<link href="{{ url('fornt/css/style.css') }}" rel='stylesheet' type='text/css' />
</head>
	<body>
        @include('fornt_layouts.menu')

        @yield('content')




    @include('fornt_layouts.footer')

<!-- JavaScripts -->
<script type="text/javascript" src="{{ url('fornt/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ url('fornt/js/sleekslider.js') }}"></script>
<script type="text/javascript" src="{{ url('fornt/js/app.js') }}"></script>
<!--/script-->
<!-- stats -->
	<script src="{{ url('fornt/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ url('fornt/js/jquery.countup.js') }}"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!-- flexSlider -->
	<script defer src="{{ url('fornt/js/jquery.flexslider.js') }}"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
<!-- //flexSlider -->
<script type="text/javascript" src="{{ url('fornt/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ url('fornt/js/easing.js') }}"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

<!--Custom-Theme-files-->
<!-- required-js-files-->
							<link href="{{ url('fornt/css/owl.carousel.css') }}" rel="stylesheet">
							    <script src="{{ url('fornt/js/owl.carousel.js') }}"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items :3,
									itemsDesktop : [800,2],
									itemsDesktopSmall : [414,1],
							        lazyLoad : true,
							        autoPlay : true,
							        navigation :true,

							        navigationText :  false,
							        pagination : true,

							      });

							    });
							    </script>
								 <!--//required-js-files-->

			<!--start-smooth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed:1200,
											easingType: 'linear'
								 		};
										*/

										$().UItoTop({ easingType: 'easeOutQuart' });

									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- for bootstrap working -->
		<script src="{{ url('fornt/js/bootstrap.js') }}"></script>
<!-- //for bootstrap working -->
</body>
</html>

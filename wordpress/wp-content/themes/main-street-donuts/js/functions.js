;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

	function initialize_maps() {
		var maps = $('.google-map').each(function () {
			var myLatlng = new google.maps.LatLng($(this).data('lat'), $(this).data('lng'));

	        var map_options = {
		    	center: myLatlng,
		    	zoom: 15,
		    	mapTypeId: google.maps.MapTypeId.ROADMAP
		    }

	        var map = new google.maps.Map(this, map_options);
	        
	        var marker = new google.maps.Marker({
				position: myLatlng,
				map: map
			});
		});

    }

	$doc.ready(function() {
		google.maps.event.addDomListener(window, 'load', initialize_maps);

		$('.products .product-image > a.cboxElement').colorbox({
			returnFocus: false,
			rel:'cboxElement',
			width: '50%',
			height: '50%'
		});

		$('.menu-btn').on('click', function(e) {
			var $this = $(this);

			$('.nav').toggleClass('show');

			e.preventDefault();
		});
	});
})(jQuery, window, document);

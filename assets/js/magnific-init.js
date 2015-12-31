$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
        closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
            verticalFit: true,
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
                return item.el.find('img').attr('title') + '<small>' + item.el.find('img').attr('alt') + '</small>';
            }
		},
        zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
				return element.find('img');
			}
        }
	});
});
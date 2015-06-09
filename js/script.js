jQuery(function () {
	jQuery('.slideshow > ul > li > img').fadeOut();
	changeSlideshowPicture(jQuery('.slideshow > ul > li').first());

	jQuery('#lang-select ul.dropdown-menu a').click(function () {
		jQuery(this).parent().siblings().each(function () {
			jQuery(this).removeClass('hidden');
		});
		jQuery(this).parent().addClass('hidden');
		window.location = '/lang_change.php?lang=' + jQuery(this).text();
	});
});

function changeSlideshowPicture(obj) {
	obj.children('img').fadeIn(750);
	setTimeout(function () {
		obj.children('img').fadeOut(750);
		if(obj.next().is('li')) {
			changeSlideshowPicture(obj.next());
		} else {
			changeSlideshowPicture(obj.siblings().first());
		}
	}, 5000);
}
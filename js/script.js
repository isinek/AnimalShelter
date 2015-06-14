jQuery(function () {
	jQuery('.slideshow > ul > li > img').fadeOut();
	changeSlideshowPicture(jQuery('.slideshow > ul > li').first());

	jQuery('#lang-select ul.dropdown-menu a').click(function () {
		var newLangObj = jQuery(this);

		jQuery.post(
			'/lang_change.php',
			{ 'lang' : newLangObj.text() },
			function (data) {
				window.location = data;
				/*newLangObj.parent().siblings().each(function () {
					jQuery(this).removeClass('hidden');
				});
				newLangObj.parent().addClass('hidden');
				newLangObj.parent().parent().siblings('button').first().html(newLangObj.text() + ' <span class="caret"></span>');*/
			}
		).fail(function (error) {
			console.log(error);
		});
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
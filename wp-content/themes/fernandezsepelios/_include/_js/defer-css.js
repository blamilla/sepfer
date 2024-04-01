(function ($, root, undefined) {
	"use strict";

	var that_stylesheets = [
			//["_lib/fontawesome/css/font-awesome.min.css",1],			
			
		];
		var that_path = "";
		var base_url = "";
		//var base_url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname.split('/')[1]; //fix for localhost and web at same time
		that_stylesheets.forEach(function(element) {
			if( element[1] > 0 ){
				that_path = base_url + "/wp-content/themes/fernandezsepelios/_include/_css/";
			}
			var giftofspeed = document.createElement('link');
			giftofspeed.href = that_path + element[0];
			giftofspeed.type = 'text/css';
			giftofspeed.rel = 'stylesheet';
			var godefer = document.getElementsByTagName('link')[0];
			godefer.parentNode.insertBefore(giftofspeed, godefer);
			
		});

})(jQuery, this);

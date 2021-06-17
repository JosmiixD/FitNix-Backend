"use strict";

// Class Definition
var KTAddUser = function () {


	var _initAvatar = function () {
		_avatar = new KTImageInput('kt_user_add_avatar');
	}

	return {
		// public functions
		init: function () {
			_initAvatar();
		}
	};
}();

jQuery(document).ready(function () {
	KTAddUser.init();
});

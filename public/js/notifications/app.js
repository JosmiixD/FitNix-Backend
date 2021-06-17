"use strict";
// Class definition

var contentFunctions = function () {
	var _setReadNotification = function () {
        $(document).on('click','.set_read_notification',function (e) {
            let url   = $(this).data('href'),
                _this = $(this);
            factoryNixDit.methods.processDataByAjax(url,'GET').done(function(response) {
                if(!response.error){
                    $('#unread_notifications_count').text(response.notifications);
                    _this.removeClass('bg-light-info');
                    _this.addClass('bg-light-success');
                    _this.removeClass('set_read_notification');
                    _this.css({'cursor': 'default'});
                    var _icon = _this.find('.icon_notification');
                    _icon.empty();
                    _icon.html(`
                        <span class="svg-icon svg-icon-success svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                                    <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                                </g>
                            </svg>
                        </span>
                    `);
                    var _read_content = _this.find('.read_content');
                    _read_content.html(`
                        <span class="text-info mr-1"><small>Leído: ${response.read_at}</small></span>
                    `);
                } else {
                    toastr.error(response.message);
                }
            })
        })
    }

    var _setReadAllNotification = function () {
        $('#setReadAllNotification').click(function(){
            let url          = $(this).data('href'),
                notification = $('div.notification_content.bg-light-info');
            factoryNixDit.methods.processDataByAjax(url,'GET').done(function(response){
                console.log(response);
                if(!response.error){
                    $('#unread_notifications_count').text(response.notifications);
                    notification.removeClass('bg-light-info');
                    notification.addClass('bg-light-success');
                    notification.removeClass('set_read_notification');
                    notification.css({'cursor': 'default'});
                    var _icon = notification.find('.icon_notification');
                    _icon.empty();
                    _icon.html(`
                        <span class="svg-icon svg-icon-success svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                                    <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                                </g>
                            </svg>
                        </span>
                    `);
                    var _read_content = notification.find('.read_content');
                    _read_content.html(`
                        <span class="text-info mr-1"><small>Leído: ${response.read_at}</small></span>
                    `);
                    $('#set_read_all_notification_content').hide();
                } else {
                    toastr.error(response.message);
                }
            });
        });
    }

    return {
		// Init
		init: function () {
			_setReadNotification();
            _setReadAllNotification();
		},
	};
}();

// Class Initialization
jQuery(document).ready(function () {
    contentFunctions.init();
});

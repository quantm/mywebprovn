/*
8 BALL CREDITS SCREEN
*/

$(function() {
	$('.credits-popup').click(function() {
		document.getElementById('game-embed').actionOpenShop(1);

		return false;
	});
});


/* -- COMMENTS BOX BUTTON HIDER -- */
$(function() {

	/* Show button on textarea focus */
	$('#comment-form textarea').focus(function() {
		$('#comment-form input').stop().show().animate({marginTop: '3px'}, 100, 'swing');
	});

	/* Hide button on textarea blur */
	$('#comment-form textarea').blur(function() {
		// Don't hide if user has typed something
		if($(this).val() == "" || $(this).val() == $(this).attr("alt")) {
			$('#comment-form input').stop().animate({marginTop: '-25px'}, 100, 'swing', function() {$(this).hide();});
		}
	});

    /**
     * Submit hidden support form with users data
     */
    $('#help-buttonlink').click(function() {
        if ($('#help-form').data('do-submit') == true) {
            $('#help-form').submit();
        }
    });
	
    function getUrlVars()
    {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

	$('a.social-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});

$(function() {
	if (typeof sendEvent !== 'undefined') {
		// post a Playing action to the users facebook timeline if they are connected
		setTimeout(function(){
			sendEvent('play','');
		}, 120000);
	}
});

$(function(){
    if(typeof game_data !== 'undefined') {
	if (game_data.is_visible === 1 && game_data.is_internal !== 1) {
		var killswitch = $.cookie('mcb_enabled_features_2');
		if (killswitch != undefined) {
			var parsed_killswitch = JSON.parse(killswitch);
			if ($.inArray('activity-feed',parsed_killswitch) != -1) {
                            if(typeof user_id !== 'undefined') {
				if (user_id != 0) {
					setTimeout(function(){
						$.ajax({
							url:		"/games/activity/add/",
							dataType:	"JSON",
							type:		"POST",
							data: {'verb':'play','object_value':game_data.game_id,'object_type':'game'},
							async:		true,
							success: function(data) {}
						}, 5000);
					})
				}
			}
                    }
		}
	}  
    }
});

function showFlashError(gameWidth,gameHeight) {
	$('#no-flash-notification').show();
}

function getFlash() {
	window.open('http://get.adobe.com/flashplayer/', '_blank');
	return false;
}

function getShockwave() {
	window.open('http://get.adobe.com/shockwave/', '_blank');
	return false;
}

function shockwaveIsInstalled() {

	var tVersionString = "0";
	var shockwaveInstalled = false;

	if (navigator.mimeTypes && navigator.mimeTypes["application/x-director"] && navigator.mimeTypes["application/x-director"].enabledPlugin) {
		if (navigator.plugins && navigator.plugins["Shockwave for Director"] && (tVersionIndex = navigator.plugins["Shockwave for Director"].description.indexOf(".")) != - 1) {
			tVersionString = navigator.plugins["Shockwave for Director"].description.substring(tVersionIndex-2, tVersionIndex+2);
		}
	} else if(navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0) {

		try {
			var obj = new ActiveXObject("SWCtl.SWCtl");
			if(obj != null) {
				tVersionString = obj.ShockwaveVersion("");
			}
		} catch(e) {

		}

		if(obj != null) {
			delete obj;
		}

	}

	if (parseInt(tVersionString) >= 11) {
		shockwaveInstalled = true;
	}

	return shockwaveInstalled;

}

var shockwave_check_timeout;

/**
 * hide the shockwave game container and display an error notifcation
 */
function showShockwaveError() {
	$('#no-shockwave-notification').insertBefore('#shockwave-game-container').slideDown();
	$('#no-shockwave-notification').show();
	//shockwave_check_timeout = setInterval('shockwaveCheckInstall()', 5000);
}

function shockwaveCheckInstall() {
	if (shockwaveIsInstalled()) {
		//clearInterval(shockwave_check_timeout);
		$('#no-shockwave-notification').hide();
	}
}

function newUserTrigger(user_id, user_name) {
	$.ajax({
		url: '/games/ajax/newuser/',
		dataType: 'JSON',
		type: 'GET',
		success: function(result) {
			var html = result.data;

			// Make sure it doesn't already exist
			$('.welcome-bar').remove();
			$('body').prepend(html);

			$('.welcome-bar .drop-top-close').click(function(){
				$('.welcome-bar').remove();
			});

			$('html, body').animate({scrollTop:0}, 'fast');
			$('.welcome-bar').slideDown();
		}
	});
}



// Alert user if they try to leave an ongoing game
var _inGame = false;
var _text = "";

function lobbyInGame(inGame, text) {
	_inGame = inGame;
	_text = text;
}

function lobbyConfirmLeave() {
	if (_inGame) {
		return _text;
	}
}

window.onbeforeunload = lobbyConfirmLeave;


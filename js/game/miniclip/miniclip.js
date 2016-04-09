MC.Currency.Miniclip = new function() {
	this._overlay = $jmc('<div/>').addClass('body-overlay');
	this._payment_modal = null;
	this._credits_iframe = null;
	this._old = false;

	/**
	 * Initiate and populate above variables
	 */
	this._initModal = function()
	{
		// Make sure the payment window doesn't already exist
		$jmc('#payment-modal').remove();

		// Create the payment modal
		if (this._payment_modal === null) {
			var container_width = $jmc('#game-container').hasClass('webgame') ? ($jmc('#game-container').width() / 2) : 475;

			this._payment_modal = $jmc('<div/>').attr('id', 'payment-modal').css({
				zIndex: 999,
				position: 'fixed',
				top: '50%',
				left: '50%',
				margin: '-275px 0 0 -' + container_width + 'px'
			});
		}

		// Create the credits frame
		if (this._credits_iframe === null) {
			this._credits_iframe = $jmc('<iframe/>').attr({
				id: 'credits_iframe',
				scrolling: 'no'
			}).css({
				width: 950,
				height: 550
			});
		}
	};

	/**
	 * Show the topup window
	 * @param {object} params
	 */
	this.showTopup = function(params)
	{
		this._openWindow(this._windowUrl(params, 'topup'));

		if (MC.Currency._game_type === 'flash') {
			if (typeof MC.Currency._game_obj[0] !== 'undefined' && typeof MC.Currency._game_obj[0].notifyBundleWindowOpened !== 'undefined') {
				if (this._old === true) {
					MC.Currency._game_obj[0].notifyTopupWindowOpen();
				} else {
					MC.Currency._game_obj[0].notifyTopupWindowOpened();
				}
			}
		} else if (MC.Currency._game_type === 'unity') {
			MC.Currency._game_obj.invokeService('notifyTopupWindowOpen', null);
		}
	};

	/**
	 * Purchase bundle and trigger modal
	 * @param {object} params
	 */
	this.purchaseBundle = function(params)
	{
		this._openWindow(this._windowUrl(params, 'currency'));

		if (MC.Currency._game_type === 'flash') {
			if (typeof MC.Currency._game_obj[0] !== 'undefined' && typeof MC.Currency._game_obj[0].notifyBundleWindowOpened !== 'undefined') {
				MC.Currency._game_obj[0].notifyBundleWindowOpened();
			}
		} else if (MC.Currency._game_type === 'unity') {
			MC.Currency._game_obj.invokeService('notifyBundleWindowOpened', null);
		}
	};

	/**
	 * Purchase an item
	 * @param {object} params
	 */
	this.purchaseItem = function(params)
	{
		this._openWindow(this._windowUrl(params, 'item'));

		if (MC.Currency._game_type === 'flash') {
			if (typeof MC.Currency._game_obj[0] !== 'undefined' && typeof MC.Currency._game_obj[0].notifyItemWindowOpened !== 'undefined') {
				MC.Currency._game_obj[0].notifyItemWindowOpened();
			}
			if (typeof MC.Currency._game_obj[0] !== 'undefined' && typeof MC.Currency._game_obj[0].notifyItemWindowClosed !== 'undefined') {
				MC.Currency._game_obj[0].notifyItemWindowClosed({success: false, result: this._params});
			}
		}
	};

	/**
	 * Get the window URL
	 * @param {object} params
	 * @param {string} type
	 * @returns {string}
	 */
	this._windowUrl = function(params, type)
	{
		// Make sure we have a valid object
		if (typeof params === 'undefined') {
			params = {};
		}

        // Not used yet, but for GA.
        if (typeof document.affiliation != 'undefined') {
            params.affiliation = document.affiliation;
        }

		// Set the type
		params.type = type;

		// For legacy reasons
		if (params.old === true) {
			this._old = true;
		}

		// Is this a webgame?
		if ($jmc('#game-container').hasClass('webgame')) {
			params.webmaster = 'true';
		}

		// Rename the currency_id param
		if (typeof params.currency_id != 'undefined') {
			params.payment_currency_id = params.currency_id;
			delete params.currency_id;
		}

		// Set globally to notify the game when the window is closed
		this._params = params;

		var domain = this._getPaymentsDomain();
		var language = this._getLanguage() ? this._getLanguage() : 'en';

		var domain = this._getPaymentsDomain();
		var window_url = '//' + domain + '/currency/' + language + '/';

		// Are we showing the bnudle list or purchase screen?
		if (typeof(params.type) != 'undefined' && params.type === 'topup') {
			window_url += 'bundles/?'
		} else {
			window_url += 'purchase/?';
		}

		for (var key in params) {
			window_url += key + '=' + params[key] + '&';
		}

		return window_url;
	};

	/**
	 * Helper function to get the correct language for the user
	 * @returns {string}
	 */
	this._getLanguage = function()
	{
		var name = 'language_code';
		var value = "; " + document.cookie;
		var parts = value.split('; ' + name + '=');

		if (parts.length == 2) {
			return parts.pop().split(';').shift();
		}
	};

	/**
	 * Helper function to get the correct domain for payments
	 * @returns {string}
	 */
	this._getPaymentsDomain = function()
	{
		var domain;

		if ((typeof(window.app_env) != 'undefined' && window.app_env === 'development') || window.location.host.indexOf('testing.miniclip.com') !== -1)  {
			domain ='payments.' + window.location.host;
		} else {
			domain = 'payments.miniclip.com';
		}

		return domain;
	};

	/**
	 * Open the payment modal
	 * @param {string} window_url
	 */
	this._openWindow = function(window_url)
	{
		// Intiliase the modal
		this._initModal();

		// Hide game if exists
		if (MC.Currency._game_type !== 'none') {
			this._hideGame();
		}

		// Make sure that there is a game id set
		if (typeof this._params.game_id === 'undefined' && typeof this._params.source_id === 'undefined') {
			alert('There has been a problem with the purchase window, please reload the page');
			this._showGame();
			return false;
		}

		// Create the credits frame
		this._credits_iframe.attr('src', window_url);

		// Add the credits iframe to the payment modal
		this._payment_modal.append(this._credits_iframe);

		// Add the overlay and payment modal to the page
		$jmc('body').prepend(this._overlay);
		$jmc('body').prepend(this._payment_modal);

		var game_container_width = $jmc('#game-container').width();
		var game_container_height = $jmc('#game-container').height();
		var overlay_top = $jmc('#game-container').length > 0 ? $jmc('#game-container').offset().top + ((game_container_height - 425) / 2) : 0;
		var overlay_left = 846 - ( game_container_width / 2);

		// Custom layout test for 8BPM & Robot Rage
		if (this._params.game_id === 2471 || this._params.game_id === 3491 ) {
			if (!$jmc('#game-container').hasClass('webgame') && this._payment_modal !== null) {
				$jmc('#payment-modal').css({
					'position': 'absolute',
					'top': overlay_top + 'px',
					'left': '50%',
					'margin': '0 0 0 -' + overlay_left + 'px'
				});
			}
		}

		// Webmaster games need to have a smaller payment modal
		if ($jmc('#game-container').hasClass('webgame')) {
			this._credits_iframe.css({
				'width': $jmc('#game-container').find('> div').width(),
				'height': $jmc('#game-container').find('> div').height()
			});

			// Cross domain wizardry to resize the buy content to the right height
			this._credits_iframe.load(function() {
				var $contents = $jmc(this).contents();

				// 16 is the combined height of the top and bottom blue border
				$contents.find('.buy-content').height(parent.$jmc('#credits_iframe').height() - 16);

				var $credits = $contents.find('.buy-content');
				var iframe_height = $credits.height() - $credits.find('header').outerHeight();
				$contents.find('#payment_window').height(iframe_height);
			});
		}
	};

	/**
	 * Close the payment window
	 * @param {boolean} success
	 * @param {float} balance
	 */
	this._hideWindow = function(success, balance)
	{
		this._payment_modal.remove();
		this._overlay.remove();

		if (MC.Currency._game_type === 'flash' && typeof MC.Currency._game_obj[0] !== 'undefined') {
			this._hideWindowFlash(success, balance);
		} else if (MC.Currency._game_type === 'unity') {
			this._hideWindowUnity(success, balance);
		}

		this._showGame();
	};

	/**
	 * Close the payment window for Flash
	 * @param {boolean} success
	 * @param {float} balance
	 */
	this._hideWindowFlash = function(success, balance)
	{
		switch (this._params.type) {
			case 'topup':
				if (this._old === true && typeof MC.Currency._game_obj[0].notifyTopupWindowClose !== 'undefined') {
					MC.Currency._game_obj[0].notifyTopupWindowClose({success: success, result: balance});
				} else if (typeof MC.Currency._game_obj[0].notifyTopupWindowClosed !== 'undefined') {
					MC.Currency._game_obj[0].notifyTopupWindowClosed({success: success, result: this._params});
				}
				break;
			case 'currency':
				if (typeof MC.Currency._game_obj[0].notifyBundleWindowClosed !== 'undefined') {
					MC.Currency._game_obj[0].notifyBundleWindowClosed({success: success, result: this._params});
				}
				break;
			case 'item':
				if (typeof this._game_obj[0].notifyItemWindowClosed !== 'undefined') {
					MC.Currency._game_obj[0].notifyItemWindowClosed({success: success, result: this._params});
				}
				break;
		}
	};

	/**
	 * Close the payment window for Unity
	 * @param {boolean} success
	 * @param {float} balance
	 */
	this._hideWindowUnity = function(success, balance)
	{
		switch (this._params.type) {
			case 'topup':
				if (this._old === true) {
					MC.Currency._game_obj.invokeService('notifyTopupWindowClose', {success: success, result: balance});
				} else {
					MC.Currency._game_obj.invokeService('notifyTopupWindowClosed', {success: success, result: this._params});
				}
				break;
			case 'currency':
				MC.Currency._game_obj.invokeService('notifyBundleWindowClosed', {success: success, result: this._params});
				break;
			case 'item':
				MC.Currency._game_obj.invokeService('notifyItemWindowClosed', {success: success, result: this._params});
				break;
		}
	};

	/**
	 * Hide the flash game so it doesn't show above the payment box
	 */
	this._hideGame = function()
	{
		// Hide in a different way depending on the game type
		switch (MC.Currency._game_type) {
			case 'shockwave':
				MC.Currency._game_obj.css('visibility', 'hidden !important');
				break;
			case 'flash':
				if (navigator.userAgent.indexOf('MSIE') !== -1) {
					MC.Currency._game_obj.css('left', '-900px');
				} else {
					MC.Currency._game_obj.css('visibility', 'hidden');
				}
				break;
			default:
				MC.Currency._game_obj.hideAllObjects();
				break;
		}

		// Custom fake shop background for 8BPM
		if (this._params.game_id === 2471) {
			this._showBackground();
		}
	};

	/**
	 * Show the game background
	 */
	this._showBackground = function()
	{
		var background = $jmc('<div/>').attr('id', 'game-background').css('position', 'relative');
		var panel = $jmc('<div/>').attr('id', 'game-background-panel').css({
			position: 'absolute',
			width: 750,
			height: 520,
			margin: '0 5px',
			background: 'url(/layout/panels/credits/game-backgrounds/2471.jpg) no-repeat 0 0'
		});

		$jmc(background).append(panel);
		$jmc('#game-container #game-embed').before(background);
	};

	/**
	 * Show the game again after the payment window has been closed
	 */
	this._showGame = function()
	{
		// Show in a different way depending on the game type
		switch (MC.Currency._game_type) {
			case 'shockwave':
				MC.Currency._game_obj.css('visibility', 'visible !important');
				break;
			case 'flash':
				if (navigator.userAgent.indexOf('MSIE') !== -1) {
					MC.Currency._game_obj.css('left', '0px');
				} else {
					MC.Currency._game_obj.css('visibility', 'visible');
				}
				break;
			default:
				MC.Currency._game_obj.showAllObjects();
				break;
		}

		// Remvoe the game background
		$('#game-background').remove();
	};
};
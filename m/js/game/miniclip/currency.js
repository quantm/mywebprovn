/**
 * The Global currency object
 * @type type
 */
MC.Currency = new function() {
	// setup the defaults for the variables
	this._params = {};

	// which interface object to use
	this._interface = null;
	this._interface_handler = null;

	// Used externally
	this._game_width = null;
	this._game_height = null;

	this.attempts = 0;
	this.max_attempts = 10;

	// the game objects
	this._game_obj = null;
	this._game_type = 'none';

	this._dependencies = [];

	this._construct = new function () {
	};

	/**
	 * Init the platform and determine what library to use
	 * @returns {undefined}
	 */
	this._init = function() {
		var body = document.getElementsByTagName('body').item(0);

		var platform = body.getAttribute('data-platform');

		if (platform === '' || platform === null) {
			platform = 'external';
		}

		this._interface = 'MC.Currency.' + platform.charAt(0).toUpperCase() + platform.slice(1).toLowerCase();

		if (typeof this._dependencies[this._interface] === 'undefined') {
			this._dependencies.push(this._interface);
		}

		// make available if on fb or mc
		if (platform != 'external') {
			if (typeof Currency === 'undefined') {
				window['Currency'] = this;
			}
		}

		MC._loadDependencies(this._dependencies);
	};

	/**
	 * Init the game object
	 * @returns {undefined}
	 */
	this._initGameObject = function() {
		// get the game object
		// test for unity game first - using the jGameloader
		if (typeof(getGameInstance) != 'undefined') {
			this._game_obj  = getGameInstance();
			this._game_type = 'unity';
		} else {
			// set it as flash
			this._game_obj  = jQuery('#game-embed');
			this._game_type = 'flash';

			// if not then must be shockwave
			if (this._game_obj == null) {
				// if the game object is shockwave
				this._game_obj  = jQuery('#shockwaveGameContainer embed');
				this._game_type = 'shockwave';

				// if no game was found
				if (this._game_obj.length === 0) {
					this._game_obj  = null;
					this._game_type = 'none';
				}
			}
		}
	};

	/**
	 * This is called just before any functions called from
	 * the game to set the game up and handler up
	 * @returns {undefined}
	 */
	this._postInit = function(){

		// setup game object
		if (this._game_obj === null) {
			this._initGameObject();
		}
		// setup interface handler
		if (this._interface_handler === null) {
			var interface_array = this._interface.split('.');
			this._interface_handler = window[interface_array[0]][interface_array[1]][interface_array[2]];
		}
	}

	/**
	 * open topup window wrapper
	 * @param {type} params
	 * @returns {undefined}
	 */
	this.showTopup = function(params) {
		this._postInit();
		this._interface_handler.showTopup(params);
	};

	/**
	 * This to to hide and window and has to be included for legacy reasons.
	 * CALLED EXTERNALLY!
	 * @returns {undefined}
	 */
	this._hideWindow = function(success, balance){
		this._postInit();
		this._interface_handler._hideWindow(success, balance);
	};

	/**
	 * Handle bundle purchase
	 * @param {type} params
	 * @returns {undefined}
	 */
	this.purchaseBundle = function(params) {
		this._postInit();
		this._interface_handler.purchaseBundle(params);
	};

	/**
	 * Handle item purchase
	 * @param {type} params
	 * @returns {undefined}
	 */
	this.purchaseItem = function(params) {
		this._postInit();
		this._interface_handler.purchaseItem(params);
	};

	/**
	 * Convert string to float
	 * @param {type} number
	 * @returns {unresolved}
	 * @deprecated
	 */
	this._parseToFloat = function(number) {
		var text = number[0].toString();

		text = text.replace(/\,/g,'');
		return parseFloat(text);
	};

	/**
	 * Change currency font sizes?
	 * @returns {undefined}
	 * @deprecated
	 */
	this.sizeCurrency = function() {
		var max_price = 0;

		// get all of the bundle prices
		jQuery('.credits_amount_price a').each(function(index, bundle){
			price = _parseToFloat($(this).text().match(/[0-9]+(?:\,?)[0-9]*\.[0-9]{2}/g));

			if (price > max_price) {
				max_price = price;
			}
		});

		var em = 1;

		if (max_price > 9999999){
			em = 0.6;
		} else if (max_price > 999999) {
			em = 0.68;
		} else if (max_price > 99999) {
			em = 0.78;
		} else if (max_price > 9999) {
			em = 0.92;
		} else if (max_price > 999) {
			em = 1.0;
		} else if (max_price > 99) {
			em = 1.1;
		} else {
			em = 1.2;
		}

		jQuery('.credits_amount_price a').attr('style', 'font-size: ' + em + 'em');
	};

	/**
	 * Check whether transaction is complete
	 * Used on currency waiting box
	 * This is only used on the miniclip and external platforms
	 * @param {type} game_id
	 * @param {type} transaction_session
	 * @param {type} max_retries
	 * @param {type} url
	 * @returns {undefined}
	 */
	this.pollForTransactionCompletion = function(game_id, transaction_session, max_retries, url) {
		start_ts = new Date().getTime();
		this.interval = setInterval(function(){
			Currency._checkTransactionStatus(game_id, transaction_session, max_retries, start_ts, url);
		}, 5000);
	};

	/**
	 * Check the transaction status
	 * This is only used in the miniclip and external platforms
	 * @param {type} game_id
	 * @param {type} transaction_session
	 * @param {type} max_retries
	 * @param {type} started_on
	 * @param {type} url
	 * @returns {Boolean}
	 */
	this._checkTransactionStatus = function(game_id, transaction_session, max_retries, started_on, url) {
		if (!max_retries)
		{
			max_retries = 40;
		}
		if (this.attempts > max_retries) {
			clearInterval(this.interval);

			new_location        = url + 'error=1&reason=MAX_RETRIES';
			window.location     = new_location;
			return false;
		}

		jQuery.getJSON('/currency/status/?transaction_session_id=' + transaction_session,
			function(data) {
				if (!data) {
					// error - but do nothing as we want try again
				} else {
					switch (data.status) {
						case 'COMPLETE':
							window.location = url + '&tw=' + Math.round(((new Date().getTime() - started_on) / 1000));
							break;
						default:
							this.attempts++;
							break;
					}
				}
			}
		);
	};

	/**
	 * Return all the stringified params
	 * @returns {@exp;JSON@call;stringify}
	 * @deprecated
	 */
	this.debugParams = function() {
		return JSON.stringify(this._params);
	};

    /**
	 * This function is called to track sales of a bundle
	 * @param {type} bundle
	 * @param {type} source_button
	 * @param {type} redirect_link
	 * @returns {Boolean}
	 */
    this.trackBundleStats = function(bundle, source_button, redirect_link) {

        if (typeof(bundle) == "undefined") {
            if (redirect_link) {
                setTimeout(redirectPage(redirect_link), 500);
            }
        }

        var tracking_id = 0;

        // try and get where we are...
        if (typeof(Currency) != "undefined" && typeof(Currency._params) != "undefined" && typeof(Currency._params.source_id) != "undefined") {

            tracking_id = Currency._params.source_id;
        } else if (typeof(game_data) != "undefined" && typeof(game_data.game_id) != "undefined") {

            tracking_id = game_data.game_id;
        } else {

            tracking_id = 0;
        }

        var topup_tag   = 'binary/credits/topup/' + bundle + '/' + source_button + '/' + tracking_id;

        if (statTracker != "undefined") {
            statTracker(topup_tag);
        } else if (top.statTracker != "undefined") {
            top.statTracker(topup_tag);
        }

        if (redirect_link) {
            setTimeout(redirectPage(redirect_link), 500);
        }

        return false;
    };

    this._init();
};

/**
 * Legacy Credits
 * @type type
 * @deprecated
 */
var credits = new function() {
	this._params = {
		old: true
	};

	this.__init = function(game_id) {
		this._params.game_id = game_id;
	};

	this.ShowTopupWindow = function() {
		Currency.showTopup(this._params);
	};

	this.ShowPurchaseOptions = function() {
		Currency.showTopup(this._params);
	};

	this.HideTopupWindow = function(action, user_balance) {
		Currency._hideWindow(action, user_balance);
	};

	this.SetWindowType = function() { };

	this.GetGameId = function() {
		return this._params.game_id;
	};

	this.GetGameWidth = function() {
		return Currency._game_height;
	};

	this.GetGameHeight = function() {
		return Currency._game_height;
	};

	this.GetWindowType = function() {
		return 1;
	};
};
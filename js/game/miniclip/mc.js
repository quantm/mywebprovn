var $jmc;
if (typeof $ === 'undefined') {
    var $;
}

// @todo Needs to be removed once support for IE8 has been dropped
if (!JSON) {
	var JSON = JSON || {};
	JSON.stringify = JSON.stringify || function (obj) {
		var t = typeof obj;
		if (t !== 'object' || obj === null) {
			if (t === 'string') obj = '"' + obj + '"';
			return String(obj);
		} else {
			var n, v, json = [], arr = (obj && obj.constructor === Array);
			for (n in obj) {
				v = obj[n]; t = typeof v;
				if (t === 'string') v = '"' + v + '"';
				else if (t === 'object' && v !== null) v = JSON.stringify(v);
				json.push((arr ? '' : '"' + n + '":') + String(v));
			}
			return (arr ? '[' : '{') + String(json) + (arr ? ']' : '}');
		}
	};
	JSON.parse = JSON.parse || function (str) {
		var p;
		if (str === '') str = '""';
		eval('p=' + str + ';');
		return p;
	};
}

// @todo Needs to be removed once support for IE8 has been dropped
if (!Array.indexOf) {
	Array.prototype.indexOf = function(searchElement, fromIndex) {
		if (this === undefined || this === null) {
			throw new TypeError('"this" is null or not defined');
		}

		var length = this.length >>> 0; // Hack to convert object.length to a UInt32

		fromIndex = +fromIndex || 0;

		if (Math.abs(fromIndex) === Infinity) {
			fromIndex = 0;
		}

		if (fromIndex < 0) {
			fromIndex += length;
			if (fromIndex < 0) {
				fromIndex = 0;
			}
		}

		for (; fromIndex < length; fromIndex++) {
			if (this[fromIndex] === searchElement) {
				return fromIndex;
			}
		}

		return -1;
	};
}

var MC = new function() {
    this.mc_path;
    this.app_id;
    this.language_code;
    this.login_needed;
    
	this.proxy;
	this.callback;
	this.dialog;
	this.dialog_interval;
       
	this.valid_modules = [
        'easyxdm',
        'share',
        'currency',
        'social'
	];

	/**
	 * Construct
	 */
	this._construct = new function() {
		if (typeof jQuery === 'undefined') {
			var body = document.getElementsByTagName('body').item(0);
			var script = document.createElement('script');

            script.src = '//code.jquery.com/jquery.min.js';
            script.onload = setupJquery;

            if (body !== null) {
                body.appendChild(script);
            } else {
                throw 'The MC.js library must be used after the body tag';
            }
        } else {
            setupJquery();
        }

        function setupJquery() {
            // We use $jmc in our code so it must be defined
            $jmc = jQuery.noConflict();

            // If we're on Miniclip, we can safely assign jQuery to $
            if (location.host.indexOf('miniclip.com') > 0) {
                $ = $jmc;
            }
        }
    };

    /**
     * Init function
     * @param {object} params
     */
    this.init = function(params) {
		MC.mc_path = this._path();
		MC.app_id = params.app_id || 0;
		MC.language_code = params.language_code || 'en';

		window.onload = function() {
			var modules = params.modules || [];

			// Add easy XDM module by default
			modules.unshift('easyxdm');
        
			// Load modules
			MC._loadModules(modules);
		};
    };

	/**
	 * Load and validate all the associated modules specified from MC.Init()
	 * @param {object} modules_array
	 */
	this._loadModules = function(modules_array) {
		var dependencies = [];

		if (typeof modules_array !== 'object') {
			throw 'The modules param must be an object';
		}

		// each specified modules in MC.init
		for (var selected_module_key in modules_array) {
			// @todo Needs to be removed once support for IE8 has been dropped
			if (typeof modules_array[selected_module_key] !== 'string') {
				continue;
			}

			// each valid module
			var module = modules_array[selected_module_key].toLowerCase();
			if (MC.valid_modules.indexOf(module) < 0) {
				throw modules_array[selected_module_key] + ' is not a valid module';
			}

			// formatted object
			var object_name = modules_array[selected_module_key].charAt(0).toUpperCase() + modules_array[selected_module_key].slice(1).toLowerCase();
			dependencies.push('MC.' + object_name);
		}

		// autoload dependencies
        this._loadDependencies(dependencies);
	};

	/**
	 * Get path to mc dependancies and dialogs
	 * @returns {String}
	 */
	this._path = function() {
		var scripts = document.getElementsByTagName('script');

		if (scripts && scripts.length > 0) {
			for (var i in scripts) {
				if (scripts[i].src && scripts[i].src.match(/\/js\/mc\.js/)) {
					if (scripts[i].src.indexOf('sandbox') > 0) {
						return '//sandbox.miniclip.com';
					} else if (scripts[i].src.indexOf('miniclipcdn') > 0) {
						return '//www.miniclip.com';
					} else {
						return '//' + scripts[i].src.replace(/https?:\/\/(?:api\.)?(.+)\/js\/mc\.js.*$/, '$1');
					}
				}
			}
		}
	};

	/**
	 * Load the dependencies
	 * @param {object} array_dep
	 */
    this._loadDependencies = function(array_dep) {
        for (key in array_dep) {
            if (array_dep.hasOwnProperty(key)) {
                this._include(array_dep[key]);
            }
        }
    };

	/**
	 * This will include the specified libraries
	 * @param {string} object_name this is the dependancy, E.g. MC.Currency.External
	 * @param {string} file_name any specific filename
	 */
    this._include = function (object_name, file_name) {
        var body = document.getElementsByTagName('body').item(0);
        var script = document.createElement('script');
        var script_version = $jmc('body').data('scriptVersion');

		if(MC._objectExists(object_name, window) === false) {
			if (typeof file_name === 'undefined' || file_name.length <= 0) {
				// remove MC
				file_name = object_name.replace('MC', '');
				// construct file path
				file_name = file_name.replace(/\./g, '/').toLowerCase();
				// set src
				script.src = this._path() + '/js' + file_name + '.js';
			} else {
				script.src = file_name;
			}

			script.src += typeof(script_version) != 'undefined' ? '?' + script_version : '';

			body.appendChild(script);
		}
    };

	/**
	 * Check whether an object exists within a given object
	 * @param {string} object_name The object to look for
	 * @param {object} reference The Object to check against
	 * @returns {boolean}
	 */
	this._objectExists = function(object_name, reference) {
		var object_array = object_name.split(".");
		var currenct_object = object_array[0];
		var result = false;

		// if found
		if (typeof reference[currenct_object] !== 'undefined') {
			// deal with next in line
			object_array.shift();
			if (typeof object_array[0] !== 'undefined') {
				// go 1 level deeper
				result = MC._objectExists(object_array.join('.'), reference[currenct_object]);
			} else {
				// hooray!
				result = true;
			}
		}

		return result;
	};

	/*
     * Open the dialog box
     * @param {string} url
     */
    this._open = function(url) {
		var remote_url = 'https:' + MC.mc_path;
		var loading_url = remote_url + '/dialog/loading/';

        this.dialog = window.open(loading_url, 'MiniclipDialog', 'width=500,height=500');
		this.dialog_interval = setInterval(this._close, 1000);

		this._setupProxy(remote_url);

        this.proxy.open(url, 'MiniclipDialog');
    };

	/**
	 * Triggered when dialog box is closed outside of the proxy
	 */
	this._close = function() {
		if (MC.dialog.closed) {
			if (typeof MC.callback === 'function') {
				MC.callback({
					data: {
						cancelled: true
					}
				});
			}

			clearInterval(MC.dialog_interval);
		}
	};

	/**
	 * Setup cross domain proxy
	 * @param {string} remote_url
	 */
	this._setupProxy = function(remote_url) {
		var proxy_config, proxy_remote, proxy_local;

		var arbiter = remote_url + '/dialog/arbiter/' + MC.app_id + '/' + MC.language_code + '/';
		arbiter += '?request=' + encodeURIComponent(location.protocol + '//' + location.host);

		proxy_config = {
			swf: '/easyxdm/easyxdm.swf',
			remote: arbiter
		};

		proxy_remote = {
			open: {},
			postMessage: {}
		};

		proxy_local = {
			postMessage: function(data_string) {
				if (typeof MC.callback === 'function') {
					var data = data_string.data || {};
					clearInterval(MC.dialog_interval);
					MC.callback(JSON.parse(decodeURIComponent(data)));
				}
			}
		};

		this.proxy = new easyXDM.Rpc(proxy_config, {
			remote: proxy_remote,
			local: proxy_local
		});
	};

    /**
     * Run the callback
     * @param {function} cb
     */
    this._callback = function(cb) {
        this.callback = typeof cb === 'function' ? cb : null;
    };

    /**
     * Open the login dialog
     * @param {function} cb
     */
    this.login = function(cb) {
        this._callback(cb);
        this._open(this.mc_path + '/dialog/login/' + this.app_id + '/' + this.language_code + '/');
    };
    
    /**
     * Open the login dialog
     * @param {function} cb
     */
    this.getloginstatus = function(app_id, access_token,callback) {
        $.ajax({
            url: 'http://www.miniclip.com/ajax/loginstatus',
            type: 'POST',
            dataType: "jsonp",
            jsonpCallback:'data',
            data: {
                'app_id': app_id,
                'access_token': access_token}
        }).done(function(received_data) {
              MC.login_needed = received_data ;
        });
        
        return MC.login_needed;
    };

    /**
     * Open the logout dialog
     * @param {function} cb
     */
    this.logout = function(cb) {
        this._callback(cb);
        this._open(this.mc_path + '/dialog/logout/' + this.app_id + '/' + this.language_code + '/');
    };
	
    /**
     * Resize the dialog box
     * @param {integer} interval
     */
    this.resize = function(interval) {
		var post_interval = !isNaN(interval) && interval > 0 ? interval : 100;

		setInterval(function() {
			var height = 150;
			if (typeof $jmc === 'function') {
				height = $jmc('body').outerHeight();
			} else {
				height = Math.max(
					document.body.scrollHeight,
					document.body.offsetHeight,
					document.documentElement.offsetHeight
				);
			}

			var data = {
				miniclip: {
					action: 'resize',
					parameters: {
						height: height
					}
				}
			};

            parent.postMessage(JSON.stringify(data), '*');
        }, post_interval);
    };

    /**
     * Makes a ajax call to liveramp method
     */
    this.loglr = function() {
        $.ajax({
            'url': '/ajax/logliveramp',
            'type': 'GET'
        });
    };
};
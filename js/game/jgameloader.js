//Version: 0.0.3
function jGameLoader(flashvars, id, communication_swf, preroll_container, game_id)
{
    this.flashvars = flashvars;

	this.file				= unescape(flashvars['mc_gameUrl'] + flashvars['fn']);
	this.id					= id;
	this.unity_id			= id + "_obj";
	this.width				= flashvars['mc_width'];
	this.height				= flashvars['mc_height'];
	this.communication_swf	= communication_swf;
	this.preroll_container	= preroll_container;

	
	if(flashvars['vid'] == 1){
		this.initPreroll();
	} else {
		this.embed_comm_swf();
	}
	
	this.game_id			= game_id;
}

jGameLoader.screenGrabData = "";

// this is a workaround for when the stattracker function is not defined
// this is needed so this will work correctly on developers.miniclip.com
if(typeof(statTracker) !== "function"){
	this.statTracker = function(path){console.log('GA: ' + path);};
}

jGameLoader.prototype.initPreroll = function() {	
	// Let's see if shockwave is installed.
	var flashvars = this.flashvars;
	
	
	var playerVersion   = swfobject.getFlashPlayerVersion();
    var params          = {};
    var attributes      = {};
    
	// hide the wrapper
	jQuery("#game-outer").hide();
	
	// if flash is not installed
	if (playerVersion.major == 0) {

		// set plugin url
		attributes.codebase = "http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0";
		params.pluginurl	= "http://www.adobe.com/go/getflashplayer";
		params.pluginspage	= "http://www.adobe.com/go/getflashplayer";

		// display flash plugin required error
		showFlashError(750,520);
	} else {

		// We need expressInstall to show.
		if (playerVersion.major < 11) {
			this.showServices();
		}

		// yes, these are horrid
		if (typeof window.adMiniclip != 'undefined'){
			var adMiniclip = window.adMiniclip;
		} else {
			var adMiniclip = null;
		}

		if (typeof quantSegs != 'undefined'){
			var quantSegs = window.adMiniclip;
		} else {
			var quantSegs = null;
		}

		flashvars.adMiniclipVideo	= adMiniclip;
		flashvars.quantSegs			= quantSegs;

		swfobject.embedSWF(
				"/swf/components/MCVideoWrap.swf", 
				this.preroll_container.replace('#', ''),
				this.width,
				this.height, 
				"11",
				"/swfcontent/expressInstall.swf",
				flashvars,
				params,
				attributes
		);
	}	
				
}




jGameLoader.prototype.embed_comm_swf = function()
{
	var params = {};
	params.wmode    = "window";
    params.base     = decodeURIComponent(this.flashvars['mc_gameUrl']);
	params.allowScriptAccess = "always";
	var attributes  = {};
	attributes.id   = this.communication_swf.replace('#', '');

	jQuery(this.preroll_container).hide();
	jQuery("#game-outer").show();
	var swf = swfobject.embedSWF(decodeURIComponent(this.flashvars['mc_gameUrl']) + "services_wrapper.swf", this.communication_swf.replace('#', ''), this.width, this.height, "11.0.0", "/swfcontent/expressInstall.swf", this.flashvars, params, attributes);
}

jGameLoader.prototype.embed_unity_obj = function()
{
	var unity_game_id = this.game_id;
	statTracker( "plugin-detection/unity/"+unity_game_id+"/visited" );
					
	var options = {};
	options.backgroundcolor = "#FFFFFF";
	options.bordercolor = "00254D";
	options.textcolor = "FFFFFF";
	options.logoimage = "http://myweb.pro.vn/images/GAME_LOADING.png";
	options.progressbarimage = "https://www.khanacademy.org/images/throbber.gif";
	options.progressframeimage = "https://www.khanacademy.org/images/throbber.gif";
	options.disableContextMenu = false;

	// New unity object
	this.unity = new UnityObject2({
		width: this.width,
		height: this.height,
		params: options,
		attributes: {id : this.unity_id.replace('#', '')}
	});

	jQuery('#no-unity-notification').hide();
	jQuery('.missing').hide();

	this.unity.observeProgress(function (progress) {

		var $missingScreen = jQuery(progress.targetEl).find(".missing");

		switch(progress.pluginStatus) {
				case "unsupported":
				
					jQuery(".unity-supported").hide();
					jQuery(".unity-not-supported").show();
					jQuery('#no-unity-notification').show();
					
				break;
				case "broken":
					statTracker( "plugin-detection/unity/"+unity_game_id+"/broken" );
					//alert("You will need to restart your browser after installation.");
				break;
				case "missing":
					statTracker( "plugin-detection/unity/"+unity_game_id+"/missing" );
					//alert("Unity missing.");
					$missingScreen.find("a").click(function (e) {
						e.stopPropagation();
						e.preventDefault();
						getGameInstance().unity.installPlugin();
						statTracker( "plugin-detection/unity/"+unity_game_id+"/clicked" );
						//alert("Unity installing.");
						return false;
					});
					$missingScreen.show();
					jQuery('#no-unity-notification').show();
				break;

				case "installed":
					statTracker( "plugin-detection/unity/"+unity_game_id+"/installed" );
					//alert("Unity installed.");
					$missingScreen.remove();
					jQuery('#no-unity-notification').hide();
				break;

				case "first":
					statTracker( "plugin-detection/unity/"+unity_game_id+"/launched" );
					//alert("Unity launched.");
				break;
			}
	});
}

jGameLoader.prototype.initUnity = function()
{
	this.embed_unity_obj();

    this.unity.initPlugin(jQuery(this.id)[0], this.file);
}

jGameLoader.prototype.invokeService = function(method, params)
{
//	console.log(" *** Received call from Unity: " + method);
//	console.log("     params: " + params);

	// Specific logic for this method?
	switch (method) {

            // The following methods 
            // 1. DO take parameters
            // 2. Have NO return value
            // 3. Require that the services_wrapper IS displayed
            case 'saveHighscore':
                jQuery(this.communication_swf)[0][method](params);
		        //this.showServices();
		        break;

            // The following methods are implied (no parameters)
            // And require the services_wrapper to be displayed
            case 'showLoginBox':
            case 'showHighscores':
                jQuery(this.communication_swf)[0][method]();
                //this.showServices();
                break;

            // The following methods 
            // 1. Are implied (take NO parameters)
            // 2. Have NO return value
            // 3. Do NOT require the services_wrapper to be displayed
            case 'getUserDetails':
            case 'currencies_Init':
            case 'currencies_GetBalances':
            case 'currencies_GetAvailableCurrencies':
                jQuery(this.communication_swf)[0][method]();
                break;

            // The following methods 
            // 1. DO take parameters
            // 2. Have NO return value
            // 3. Do NOT require the services_wrapper to be displayed
            case 'currencies_GetBundles':
            case 'currencies_PurchaseBundle':
                jQuery(this.communication_swf)[0][method](params);
                break;
            
            // The following methods
            // 1. Are implied (take NO parameters)
            // 2. DO have a return value
            // 3. Do NOT require the services_wrapper to be displayed
            case 'getParameters':
            case 'getEmbedVariables':
                return jQuery(this.communication_swf)[0].getParameters();
                break;

            // The following methods are bespoke
            case 'clearScreenGrabData':
                this.screenGrabData = "";
                break;

            case 'receiveScreenGrabData':
                this.screenGrabData = this.screenGrabData + params;
                break;

            case 'renderScreenGrab':
                jQuery(this.communication_swf)[0].renderScreenGrab( this.screenGrabData, this.screenGrabData.length );
                break;

            // Catch-All
            default:
                return jQuery(this.communication_swf)[0][method](params);
                break;
	}
}

jGameLoader.prototype.sendToUnity = function(id, data)
{
    var message = id.concat("\n", data);

    //Args: Unity Object Name, Function Name (in attached script)
	this.unity.getUnity().SendMessage("MiniclipAPI", "OnJSNotification", message);
}

jGameLoader.prototype.serviceComplete = function(id, data)
{

	this.sendToUnity(id, data);
	this.hideServices();
}

jGameLoader.prototype.showServices = function()
{
	jQuery('#comm-swf').css('width', this.width);
	jQuery('#comm-swf').css('height', this.height);
	jQuery('#comm-swf-outer').css('left', 0);
	jQuery('#unityPlayer').css('left', 9960);
}

jGameLoader.prototype.hideServices = function()
{
	jQuery('#comm-swf').css('width', 0);
	jQuery('#comm-swf').css('height', 0);
	jQuery('#comm-swf-outer').css('left', 9960);
	jQuery('#unityPlayer').css('left', 0);
}


jGameLoader.prototype.showAllObjects = function()
{   
    jQuery(this.unity_id).css({left: 0});
}

jGameLoader.prototype.hideAllObjects = function()
{    
    jQuery(this.unity_id).css({left: -9999});
}


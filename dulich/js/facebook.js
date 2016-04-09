
window.fbAsyncInit = function() {
    FB.init({
        appId : "1375147869435383", // App ID
        status : true,   // check login status
        cookie : true,   // enable cookies to allow the server to access the session
        xfbml : true     // parse page for xfbml or html5 social plugins like login button below
    });
    FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs.
        if (response.status === 'connected') {
            // The response object is returned with a status field that lets the app know the current
            // login status of the person. In this case, we're handling the situation where they
            // have logged in to the app.
        } else if (response.status === 'not_authorized') {
            // In this case, the person is logged into Facebook, but not into the app, so we call
            // FB.login() to prompt them to do so.
            // In real-life usage, you wouldn't want to immediately prompt someone to login
            // like this, for two reasons:
            // (1) JavaScript created popup windows are blocked by most browsers unless they
            // result from direct interaction from people using the app (such as a mouse click)
            // (2) it is a bad experience to be continually prompted to login upon page load.
            FB.login();
        } else {
            // In this case, the person is not logged into Facebook, so we call the login()
            // function to prompt them to do so. Note that at this stage there is no indication
            // of whether they are logged into the app. If they aren't then they'll see the Login
            // dialog right after they log in to Facebook.
            // The same caveats as above apply to the FB.login() call here.
            FB.login();
        }
    });
};//END window.fbAsyncInit

//------------------------------------------------------------
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s); js.id = id;
    js.src = "http://connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//------------------------------------------------------------
function getAccessToken() {
    FB.api('/me', function(response) {
        var accessToken = FB.getAuthResponse()['accessToken'];
        return accessToken;
    });
}

//------------------------------------------------------------
function getUserAlbums(callback) {
    FB.api('/me/albums', function(response) {
        return callback(response);
    });
}

//------------------------------------------------------------
function sign_in_facebook(callback){
    var auth = FB.getAuthResponse();
    if(auth==null || auth == ''){
        FB.login(function(login_response) {
            if (login_response && !login_response.error) {
                return callback(login_response.authResponse);
            }
        }, {
            scope: 'email, user_likes, publish_actions, publish_stream, user_activities, publish_checkins, user_photos, friends_photos'
        });
    }else{
        return callback(auth);
    }
}

function facebook_login( sign_in_facebook_id, callback ) {

    $( document ).on( "click", '#'+sign_in_facebook_id, function() {
        sign_in_facebook( function( login_response ) {
                inside_site_login( function ( response ) {
                return callback( response );
            });
        });
    });

    function inside_site_login( callback ){

        FB.api("/me",
            function (profile_response) {
                if (profile_response && !profile_response.error ) {                                                            
                    //console.log(profile_response);
                    $.ajax({
                        type: 'GET',
                        url: '/user/facebook/',
                        data: {
                            facebook_id:profile_response.id,
                            email:profile_response.email,
                            name:profile_response.name,
                            username:profile_response.username,
                            gender:profile_response.gender,
                            type:"login",
                            csrf_test_name:$("#game_header_search #csrf_test_name").val()
                        },
                        success: function ( response ) {
                        //console.log(profile_response);
						if($("html").find("#is_log").length=="1"){
						$("#show").html(profile_response.name);
						$("#a_register").html('<img class="user_avatar" src="https://graph.facebook.com/'+profile_response.id+'/picture"/>');
                        $(".list_chat").show();
						}
							//$("#login_process").modal("show")
							var book_id=$("#share_id").val()
							window.open("/book/detail?id="+book_id+"&is_download=1","_parent");
                        },
                        error: function( jqXHR, settings ) {
                        }
                    }).done( function( response ) {
                        return callback( response );
                    });
                } else {
                    window.location.reload();
                }
            }
        );
    }//end function sign_in_inside_site
}//end init_sign_in_facebook

function facebook_register( sign_in_facebook_id, callback ) {

    $( document ).on( "click", '#'+sign_in_facebook_id, function() {
        sign_in_facebook( function( login_response ) {
                inside_site_login( function ( response ) {
                return callback( response );
            });
        });
    });

    function inside_site_login( callback ){

        FB.api("/me",
            function (profile_response) {
                if (profile_response && !profile_response.error ) {                                                            
                    //console.log(profile_response);
                    $.ajax({
                        type: 'GET',
                        url: '/user/facebook/',
                        data: {
                            facebook_id:profile_response.id,
                            email:profile_response.email,
                            name:profile_response.name,
                            username:profile_response.username,
                            gender:profile_response.gender,
                            type:"register",
                            csrf_test_name:$("#game_header_search #csrf_test_name").val()
                        },
                        success: function ( response ) {
                            //console.log(response);
							$("#email").val(jQuery.parseJSON(response).EMAIL);
                            $("#name").val(jQuery.parseJSON(response).NAME);
                            $("#username").val(jQuery.parseJSON(response).USERNAME);
                            $("#password").attr('placeholder','Nhập mật khẩu để đăng nhập vào myweb.pro.vn');
                            $("#register_facebook_id").val(jQuery.parseJSON(response).facebook_id);
                            if(jQuery.parseJSON(response).SEX == "male"){
                                $("#sex").val("0")
                            }
                            else{
                                $("#sex").val("1")
                            }
                        },
                        error: function( jqXHR, settings ) {
                        }
                    }).done( function( response ) {
                        return callback( response );
                    });
                } else {
                    window.location.reload();
                }
            }
        );
    }
}//end facebook register

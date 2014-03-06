var OAUTHURL    =   'https://accounts.google.com/o/oauth2/auth?';
var VALIDURL    =   'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=';
var SCOPE       =   'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email';
var CLIENTID    =   '365616338942-q8ujvsdmrpu3h6rd8do5e73vhqt2qpc0.apps.googleusercontent.com';
var REDIRECT    =   'http://localhost/Ikion/auth/login'
var TYPE        =   'token';
var _url        =   OAUTHURL + 'scope=' + SCOPE + '&client_id=' + CLIENTID + '&redirect_uri=' + REDIRECT + '&response_type=' + TYPE;
		var acToken;
        var tokenType;
        var expiresIn;
        var user;
        var loggedIn    =   false;
        
function logingm() 
{
            var win         =   window.open(_url, "windowname1", 'width=800, height=600'); 

            var pollTimer   =   window.setInterval(function() { 
                try {
                    console.log(win.document.URL);
                    if (win.document.URL.indexOf(REDIRECT) != -1) {
                        window.clearInterval(pollTimer);
                        var url =   win.document.URL;
                        acToken =   gup(url, 'access_token');
                        tokenType = gup(url, 'token_type');
                        expiresIn = gup(url, 'expires_in');
                        win.close();

                        validateToken(acToken);
                    }
                } catch(e) {
                }
            }, 100);
        }
        function validateToken(token) {
            $.ajax({
                url: VALIDURL + token,
                data: null,
                success: function(responseText){  
                    getUserInfo();
                    loggedIn = true;
                    $('#loginText').hide();
                    $('#logoutText').show();
                },  
                dataType: "jsonp"  
            });
        }

        function getUserInfo() {
            $.ajax({
                url: 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' + acToken,
                data: null,
                success: function(resp) {
                    user    =   resp;
                    console.log(user);
                    var dataString ='first_name='+user.given_name+'&last_name='+user.family_name +'&alternative_email='+user.email+'&social_id='+user.id;
					
					//profile_pic = user.picture;
				     $.post(base_url+'auth/social_login/google',dataString,function(data){
					 console.log(data);
						if(data =="SUCCESS")
						{
							location.reload();	//Redirect to the login screen  
						}
						else if(data == "FIRSTSUCCESS")
						{
							location.reload();
						}
						else
						{
						   //window.location.href='/register'; Redirect to register page
						}
					  });
                },
                dataType: "jsonp"
            });
        }

        //credits: http://www.netlobo.com/url_query_string_javascript.html
        function gup(url, name) {
            name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
            var regexS = "[\\#&]"+name+"=([^&#]*)";
            var regex = new RegExp( regexS );
            var results = regex.exec( url );
            if( results == null )
                return "";
            else
                return results[1];
        }

/**************************facebook login code***************************/
window.fbAsyncInit = function() {
        FB.init({
          appId: '428353957295798',         // appId: '499639700115508',
          cookie: true,
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
		//console.log(response);
		  //window.location.href='/users/register';
        });
        // FB.Event.subscribe('auth.logout', function(response) {
        // });
      };
      (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
	  js.src = "//connect.facebook.net/en_US/all.js#appId=428353957295798&amp;xfbml=1";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
	

function fblogin()
{
	FB.login(function(response) {
				if (response.authResponse) {
					FB.api('/me', function(response) {
					console.log(response);
					//var facebook ='facebook';
					
					//Profile Pic of User->   console.log("https://graph.facebook.com/"+response.id+"/picture?type=large");
					var dataString ='first_name='+response.first_name+'&last_name='+response.last_name +'&email='+response.email+'&social_id='+response.id+'&birthday='+response.birthday;
				     $.post(base_url+'auth/social_login/facebook',dataString,function(data){
					 console.log(data);
						if(data =="SUCCESS")
						{
							location.reload();	//Redirect to the login screen  
						}
						else if(data == "FIRSTSUCCESS")
						{
							location.reload();
						}
						else
						{
						   //window.location.href='/register'; Redirect to register page
						}
					  });	
					
					});  
			} 
	}, {perms:'publish_stream,offline_access,manage_pages,email,user_birthday'});
}
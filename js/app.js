var app = angular.module("myApp",  [
    'ngRoute',
    '720kb.socialshare'
  ]);
app.config(['socialshareConfProvider', function configApp(socialshareConfProvider) {

    socialshareConfProvider.configure([{
      'provider': 'twitter',
      'conf': {
        'url': 'http://720kb.net',
        'text': '720kb is enough',
        'via': 'npm',
        'hashtags': 'angularjs,socialshare,angular-socialshare',
        'trigger': 'click',
        'popupHeight': 800,
        'popupWidth' : 400
      }
    }]);
}]);

function onLoadFunction(){
	gapi.client.setApiKey("AIzaSyABp2yv6zeCfJw7Y9JX--spCNAH1O-h1EA");
	gapi.client.load('plus','v1',function(){});
}
window.fbAsyncInit = function() {
	FB.init({
	  appId            : '165989854264964',
	  autoLogAppEvents : true,
	  xfbml            : true,
	  version          : 'v3.0',
	  status           :true 
	});
	FB.getLoginStatus(function(response) {
		if(response.status=="connected"){
			//logged in
			console.log(':loggedin');
		}
		else if(response.status=="not_authorized"){
			//no auth
			console.log('not autherize');
		}
		else{
			//not logged in
			console.log("not logged");
		}
	    //statusChangeCallback(response);
	});
};

(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "https://connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
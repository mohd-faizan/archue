// (function(){
// 	var p = document.createElement("script");
// 	p.type = 'text/javascript';
// 	p.async = true;
// 	p.src = "https://apis.google.com/js/client.js?onload=onLoadFunction";
//     var s = document.getElementsByTagName('script')[0];
//     s.parentNode.insertBefore(p,s);	
// })();
// function onLoadFunction(){
// 	gapi.client.setApiKey('AIzaSyAdCVPfuZwkB0xqcvIXwRS6ZZbSLC3NkDo');
// 	gapi.client.load('plus','v1',function(){});
// }
// function onSignIn(googleUser) {
//   var profile = googleUser.getBasicProfile();
//   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
//   console.log('Name: ' + profile.getName());
//   console.log('Image URL: ' + profile.getImageUrl());
//   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
// }
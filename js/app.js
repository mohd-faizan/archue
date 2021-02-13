var app = angular.module("myApp", [
    'ngRoute',
    '720kb.socialshare',
    'ngMeta',
]);

function onLoadFunction() {
    // gapi.client.setApiKey("AIzaSyDSYEddyZMnGWIE7RhNOx_mjEFQ0ZIIHSQ");
    gapi.client.setApiKey("-vb5i7ui9CYhV3D0jy8x2BY-");
    gapi.client.load('plus', 'v1', function() {});
}
window.fbAsyncInit = function() {
    FB.init({
        appId: '165989854264964',
        autoLogAppEvents: true,
        xfbml: true,
        version: 'v3.0',
        status: true
    });
    FB.getLoginStatus(function(response) {
        if (response.status == "connected") {
            console.log('loggedin');
        } else if (response.status == "not_authorized") {
            console.log('not autherize');
        } else {

        }
    });
};
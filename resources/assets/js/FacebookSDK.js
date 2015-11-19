
/**
 * This can't go in its' own file, unfortunately.
 * Facebook relies on it being here.
 */

(function() {
  window.fbAsyncInit = function() {

    /***** Begin Personal Stuff **** */
    var signUpSuccess;
    signUpSuccess = function() {
      console.log('Signed up for Pictunes!');
      FB.api('/me', function(response) {
        console.log('Successful login for: ' + response.name);
        document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
      });
    };
    FB.init({
      appId: '1689534681278082',
      xfbml: true,
      version: 'v2.5'
    });
    $(document).ready(function() {
      $('button.signUpWithFacebook').click(function() {
        console.log('Connecting to Facebook...');
        FB.login((function(response) {
          var accessToken, uid;
          if (response.status === 'connected') {
            uid = response.authResponse.userID;
            accessToken = response.authResponse.accessToken;
            signUpSuccess();
          } else {

          }
          console.log(response);
        }), true);
      });
    });

    /*****  End Personal Stuff **** */
  };

}).call(this);

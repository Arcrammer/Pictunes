###*
# This can't go in its' own file, unfortunately.
# Facebook relies on it being here.
###

window.fbAsyncInit = ->

  ###**** Begin Personal Stuff ****###

  signUpSuccess = ->
    # The user has signed up through Facebook
    console.log 'Signed up for Pictunes!'
    FB.api '/me', (response) ->
      console.log 'Successful login for: ' + response.name
      document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!'
      return
    return

  FB.init
    appId: '1689534681278082'
    xfbml: true
    version: 'v2.5'
  $(document).ready ->
    $('button.signUpWithFacebook').click ->
      console.log 'Connecting to Facebook...'
      FB.login ((response) ->
        if response.status == 'connected'
          uid = response.authResponse.userID
          accessToken = response.authResponse.accessToken
          signUpSuccess()
        else
          # The user is either authenticated with Facebook, but
          # they haven't authorised Pictunes yet or the user is
          # not authenticated with Facebook so they consequently
          # can't authorise Pictunes to use their Facebook
          # information; Let them authorise Pictuens or sign in
          # FB.login();
        console.log response
        return
      ), true
      return
    return

  ###****  End Personal Stuff ****###

  return

# ---
# generated by js2coffee 2.1.0

# JWT Auth API

JSON Web Token Authentication for your OctoberCMS API integrated with RainLab.User

### Requirements

RainLab.User plugin

### Endpoints 

The plugin provides 2 endpoints: /api/login and /api/signup.

/api/login

Expects 2 parameters to receive: email and password. Makes attempt to authenticate and returns token if succeeded. Also the basic user info is included in the response.

/api/signup

Expects 3 parameters to receive: email, password and password_confirmation. Tries to create a user and returns token if succeeded. The user info is included in the response.

/api/refresh

Expects 1 parameter: token. Tries to refresh the token and return the new token.

/api/invalidate

Expects 1 parameter: token. Tries to invalidate the given token - this can be used as an extra precaution to log the user out

### How to use this in another plugin?

Simply add `->middleware('jwt.auth')` to the end of the route in the plugin's routes.php

eg: 
```
Route::post('test', function (\Request $request) {
   return response()->json(('The test was successful'));
})->middleware('jwt.auth');
```

Then when making the request set the header "Authorization" to "Bearer `{yourToken}`"
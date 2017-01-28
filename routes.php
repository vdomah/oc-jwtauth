<?php

use RainLab\User\Models\User as UserModel;

Route::group(['prefix' => 'api'], function() {

    Route::post('login', function (\Request $request) {
        $credentials = [
            'email' => Request::get('email'),
            'password' => Request::get('password'),
        ];

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $userModel = JWTAuth::authenticate($token);

        $user = [
            'id' => $userModel->id,
            'name' => $userModel->name,
            'surname' => $userModel->surname,
            'username' => $userModel->username,
            'email' => $userModel->email,
            'is_activated' => $userModel->is_activated,
        ];
        // if no errors are encountered we can return a JWT
        return response()->json(compact('token', 'user'));
    });

    Route::post('/signup', function () {
        $credentials = Input::only('email', 'password', 'password_confirmation');

        try {
            $user = UserModel::create($credentials);
        } catch (Exception $e) {
            return Response::json(['error' => $e->getMessage()], 401);
        }

        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token', 'user'));
    });
});
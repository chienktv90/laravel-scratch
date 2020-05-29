<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends ResponseController
{
    //create user
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        //Store Image
//        if($request->hasFile('image') && $request->file('image')->isValid()){
//            $user->addMediaFromRequest('image')->toMediaCollection('images');
//        }

        if($user){
            $success['token'] =  $user->createToken('token')->accessToken;

            //Store Image
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $user->addMediaFromRequest('image')->toMediaCollection('images');
            }



//            if ($request->hasFile('images')) {
//                    $user->addAllMediaFromRequest('images')->each(function ($fileImages) {
//                        $fileImages->toMediaCollection("image-user");
//
//                    });
//                }
//            $media_urls = [];
//            foreach ($user->media as $media) {
//                $media_urls[] = [
//                    'origin_url' => $media->getFullUrl(),
//                    'thumbnail_url' => $media->getFullUrl('thumb'),
//                ];
//            }
//            $user->images = count($media_urls) ? $media_urls : null;
//            $user->avatar = count($media_urls) ? $media_urls[0] : [
//                'origin_url' => asset('public/images/no-image.jpg'),
//                'thumbnail_url' => asset('public/images/no-image.jpg')
//            ];




            $success['message'] = "Registration successfull..";
            return $this->sendResponse($success);
        }
        else{
            $error = "Sorry! Registration is not successfull.";
            return $this->sendError($error, 401);
        }

    }

    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            $error = "Unauthorized";
            return $this->sendError($error, 401);
        }
        $user = $request->user();
        $success['token'] =  $user->createToken('token')->accessToken;

        //retrieving
        $media_urls = [];
        foreach ($user->media as $media) {
            $media_urls[] = [
                'origin_url' => $media->getFullUrl(),
                'thumbnail_url' => $media->getFullUrl('thumb'),
            ];
        }
        $success['avatar'] = count($media_urls) ? $media_urls[0] : [
            'origin_url' => asset('public/images/no-image.jpg'),
            'thumbnail_url' => asset('public/images/no-image.jpg')
        ];

        //$success['avatar'] =  $media_urls[0];


        return $this->sendResponse($success);
    }

    //logout
    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return $this->sendResponse($success);
        }
        else{
            $error = "Something went wrong.";
            return $this->sendResponse($error);
        }


    }

    //getuser
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        if($user){
            return $this->sendResponse($user);
        }
        else{
            $error = "user not found";
            return $this->sendResponse($error);
        }
    }
}

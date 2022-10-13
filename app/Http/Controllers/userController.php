<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{


    public function register(Request $request)
    {
        //     $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);

        // if($validator->fails()){
        //         return response()->json($validator->errors()->toJson(), 400);
        // }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(

                     [
                        'error' => 'invalid_credentials'
                        ]
                    , 400);
            }
        } catch (JWTException $e) {
            return response()->json(
                [
                    'error' => 'could_not_create_token'
                ], 500);
        }
        $user = Auth::user();

      

         $id = $user->id; 

         User::where('id',$id)->update([

            'remember_token'=>$token,           
         ]); 

  


        return response()->json(
            [           
            'success' => true,
            'user'=>$user,
            'token'=> $token, ]
        );
    }

    public function editUser(Request $request){   
       
        $user = JWTAuth::parseToken()->authenticate();
        $id = $request->id; 
        

      //  $user =
         User::where('id',$id)->update([

           'name'=> $request->name,
           'phone'=> $request->phone,
           
         ]); 
      
     

       return response()->json(
           [           
           'success' => true,
           'message'=>"Edited Successfully",
           'user' => $user
          
           ]
       );
   }



    

    public function logout(Request $request){
       

         $id = $request->id; 

         User::where('id',$id)->update([

            'remember_token'=>null,           
         ]); 

        return response()->json(
            [           
            'success' => true,
           
            ]
        );
    }

    // public function getAuthenticatedUser()
    //     {
    //             try {

    //                     if (! $user = JWTAuth::parseToken()->authenticate()) {
    //                             return response()->json(['user_not_found'], 404);
    //                     }

    //             } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

    //                     return response()->json(['token_expired'], $e->getStatusCode());

    //             } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

    //                     return response()->json(['token_invalid'], $e->getStatusCode());

    //             } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

    //                     return response()->json(['token_absent'], $e->getStatusCode());

    //              }

    //             return response()->json(compact('user'));
    //     }
}
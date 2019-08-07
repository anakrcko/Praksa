<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Post;

class FileController extends Controller
{
    public function saveFile(Request $request){
      
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        if($user)
        {
            $File = $request -> file('file'); //line 1
            $sub_path = 'files'; //line 2
            $real_name = $File -> getClientOriginalName(); //line 3
                
            $destination_path = public_path($sub_path);  //line 4
                    
            $File->move($destination_path,  $real_name);  //line 5

            $post = new Post();
            $post->type = 'img';
            $FilePath = $destination_path. '/' .$real_name;
            $post->filename = $FilePath;
            $post->userId = $user->id;
            $post->save();
            
            $bin = base64_encode($real_name);

            return response()->json([
                'postsArray' => [
                    'image' => $bin,
                    'author' => $user->name  
                ]
            ]);
        } 
    }
}
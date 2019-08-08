<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Input;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function like()
    {
        $token = JWTAuth::getToken();
		$user = JWTAuth::toUser($token);
        if($user)
        {
            $res=Like::where('userPostId', '=', Input::get('userPostId'))
                    ->where('postId', '=', Input::get('postId'))
                    ->where('userLikeId', '=', $user->id)
                    ->delete();
            if ($res==1) 
            {
                return response()->json([
                    'success' => false,
                    'token' => 'Unliked',
                ]);
            }
            else
            {
                $like = new Like();
                $like->userPostId = Input::get('userPostId');
                $like->postId = Input::get('postId');
                $like->userLikeId = $user->id;
                $like->save();
                return response()->json([
                    'success' => false,
                    'token' => 'Liked',
                ]);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

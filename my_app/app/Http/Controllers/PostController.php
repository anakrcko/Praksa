<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Like;
use App\Comment;

class PostController extends Controller
{
	public function getDashboard(){
		$posts = Post::orderBy('created_at','desc')->get();
		$token = JWTAuth::getToken();
		$user = JWTAuth::toUser($token);
        if($user)
        {
			foreach($posts as $post)
			{
				
				$file=explode('/',$post->filename);
				$lastElement = last($file);
				//$bin = base64_encode($lastElement);
				$userPost= User::where('id', '=', $post->userId)->first();
				$post->name=$userPost->name;
				$count = Like::where('postId','=',$post->id)->count();
				$res = Like::where('userLikeId', '=', $user->id)
							->where('postId', '=', $post->id)
							->count();
				$post->liked=$res;
				$comments = Comment::orderBy('created_at','desc')
						->where('postCommentId', '=', $post->id)->get();

				foreach($comments as $comment)
				{
					$userCommented= User::where('id', '=', $comment->userPostId)->first();
					$comment->userCommentName= $userCommented->name;
				}
				$post->comments=$comments;
				$post->likes=$count;
				$post->file= $lastElement;
			}
			return response()->json(['postsArray' => $posts]);
		}
	}

    public function postCreatePost(Request $request){
    	
		
    }

    public function getDeletePost($post_id){
    		$post = Post::where('id',$post_id)->first();

			$token = JWTAuth::getToken();
        	$user = JWTAuth::toUser($token);
    		if ($user != $post->userId) {
    			return response()->json([
					'success' => false,
					'token' => 'Unauthorized access',
				]);
    		}

    		$post->delete();
			return response()->json([
                'success' => true,
                //'token' => 'Successfully Deleted!',
            ]);

    }
    public function postEditPost(Request $request){

    	$this->validate($request,[
    		'body' => 'required|max:99|min:4'
    	]);

		$post = Post::find($request['postId']);
		$token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
    	if ($user != $post->userId) {
			return response()->json([
                'success' => false,
                'token' => 'Unauthorized access',
            ]);
    	}
    	$post->body = $request['body'];
    	$post->update();
    	return response()->json([
			'success' => true,
			//'token' => 'Successfully edited',
		]);
    }
}

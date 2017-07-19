<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class CommentsController extends Controller
{
    public function save(Request $request, $id)
    {
        $all = $request->all();
        $all['post_id'] = $id;
        Comments::create($all);
        return back();
    }
    public function addComment()
    {
        $this->layout = null;
        //check if its our form
        if ( Request::ajax() ) {

            $author = Input::get( 'author' );
            $content = Input::get( 'text' );
            $post_id = Input::get('post_id');
            $comment = new Comments();
            $comment->author =  $author;
            $comment->content = $content;
            $comment->post_id = $post_id;
            $comment->save();
            $response = array(
                'status' => 'success',
                'msg' => 'Setting created successfully',
            );

            return Response::json( $response );
        }
    }
}

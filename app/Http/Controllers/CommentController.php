<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Listing $listing){
        $comments = Comment::all();
        $listing = Listing::with('comments')->get();
        // $posts = Listing::with('comments')->get();

        return inertia(
            'Comment/GetComment',
            [
               
                'comments' => $comments, 
                'listing' => $listing
        ]);
    }
    public function store(Request $request){
         $comment = new Comment();
         $comment->comment = $request->comment;
         $comment->user_id = Auth::id(); 
        $comment->listing_id = $request->listing_id;
        $comment->senderEmail = $request->senderEmail;
        $comment->senderTelephone = $request->senderTelephone;
         $comment->save();
         return back();

    }

}
<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Listing $listing){
        // dd('hi');
        $listing->likes()->toggle(auth()->id());
        if($listing->likes()->where('user_id', auth()->id())->exists()){
            $listing->likes()->detach(auth()->id());
        } else 
        {
            $listing->likes()->detach(auth()->id());
        }
        $listing->likes()->attach(auth()->id());
        return redirect()->back();
    }
    public function checkLikes(Listing $listing){
        $like = Like::where('listing_id', $listing->id)
        ->where('user_id' , auth()->id())->first();
         $like->delete();
    }
}

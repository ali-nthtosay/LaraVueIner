<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Listing;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Listing $listing){
        $lists = auth()->user()->favorite;
        // dd($likeList) ;
        return inertia('Favorite/Index', [
            'listings' => $lists , 
            
        ]) ;
    }
}

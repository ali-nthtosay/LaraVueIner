<?php


namespace App\Http\Controllers;


use App\Models\Listing;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{

    public function __construct(){
         $this->authorizeResource(Listing::class, 'listing');
    }
   /**
    * Display a listing of the resource.
    */
    public function index(User $user, Request $request)
    {   
        $listing = $user->listings()->withCount([
            'likes' => function($q){
                $q->where('by_user_id', auth()->id());
            }
        ])->withCasts(['likes_count' => 'boolean']) ;

        $listing = Listing::withCount('likes')->withCasts(['likes_count' => 'boolean'])->get();

        $filters = $request->only([
            'preisAb', 'preisBis', 'zimmer', 'badezimmer', 'flaecheVon', 'flaecheBis'
        ]);
         $listing = Listing::mostRecent()
         ->withCount('likes')->with('likes')->withCasts(['likes_count' => 'boolean'])
            ->filter($filters)
            ->paginate(20)
            ->withQueryString() ;

        return inertia(
            
            'Listing/Index',
    
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                ->withCount('likes')->with('images')->withCasts(['likes_count' => 'boolean'])
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString(),

            ]
        );
    }


   /**
    * Display the specified resource.
    */
   public function show(Listing $listing)
   {
    if(auth()->user()->id !== $listing->by_user_id) {
        $listing->increment('count_view');
    }    
    $listing->load(['images', 'owner', 'comments']);
       return inertia(
           'Listing/Show',
           [
               'listing' => $listing
           ]
       );
   }

}

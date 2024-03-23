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
            'preisAb', 'preisBis', 'zimmer', 'badezimmer', 'wohnflaecheVon', 'wohnflaecheBis'
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
        // Check if the user has already viewed this listing in the current session
        $viewedListings = session()->get('viewed_listings', []);

        // If the listing has not been viewed in the current session
        if (!in_array($listing->id, $viewedListings)) {
            // Increment the count_view attribute
            $listing->increment('count_view');
    
            // Add the listing ID to the viewed listings array in the session
            $viewedListings[] = $listing->id;
            session(['viewed_listings' => $viewedListings]);
        }
    
    // if(auth()->user()->id !== $listing->by_user_id) {
    //     $listing->increment('count_view');
    // }    
    $listing->load(['images', 'owner', 'comments']);
       return inertia(
           'Listing/Show',
           [
               'listing' => $listing
           ]
       );
   }

}

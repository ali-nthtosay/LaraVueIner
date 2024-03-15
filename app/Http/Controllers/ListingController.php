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
        // dd($listing);

        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
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
    * Show the form for creating a new resource.
    */
//    public function create()
//    {
//        // $this->authorize('create', Listing::class);
//        return inertia('Listing/Create');
//    }


//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {


//        // Auth::user()   -> its current user
//        //  $request->user()


      
//        $request->user()->listings()->create
//        // Listing::create
//        (
//            $request->validate([
//                'beds' => 'required|integer|min:0|max:20',
//                'baths' => 'required|integer|min:0|max:20',
//                'area' => 'required|integer|min:15|max:1500',
//                'city' => 'required',
//                'code' => 'required',
//                'street' => 'required',
//                'price' => 'required|integer|min:1|max:20000000',
//            ])
//        );
//        return redirect()->route('listing.index')->with('success', 'Listing was created!');
//    }


   /**
    * Display the specified resource.
    */
   public function show(Listing $listing)
   {
    $listing->load(['images', 'owner']);
       return inertia(
           'Listing/Show',
           [
               'listing' => $listing
           ]
       );
   }

//    public function shareImage(Listing $imageListing){
//     $imageListing->load(['images']);
//     return inertia(
//         'Listing/Index',
//         [
//             'imageListing' => $imageListing
//         ]
//     );
//    }

   /**
    * Show the form for editing the specified resource.
    */
//    public function edit(listing $listing)
//    {
//        return inertia(
//            'Listing/Edit',
//            [
//                'listing' => Listing::find($listing)
//            ]
//            );
//    }


//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, $listing )
//    {
//        // $listing = Listing::find($id);
//        $listing->update(
//            $request->validate([
//                'beds' => 'required|integer|min:0|max:20',
//                'baths' => 'required|integer|min:0|max:20',
//                'area' => 'required|integer|min:15|max:1500',
//                'city' => 'required',
//                'code' => 'required',
//                'street' => 'required',
//                'price' => 'required|integer|min:1|max:20000000',
//            ])
//        );
//        return redirect()->route('listing.index')->with('success', 'Listing was updated!');
//    }


   /**
    * Remove the specified resource from storage.
    */
//    public function destroy(Listing $listing)
//    {
//        // $listing = Listing::find($id);
//        $listing->delete();
//        return redirect()->back()->with('success','Listing was Deleted');
//    }



}

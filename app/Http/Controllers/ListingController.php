<?php


namespace App\Http\Controllers;


use App\Models\Listing;
use App\Models\User;
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
   public function index()
   {
       return inertia(
           'Listing/Index',
           [
            //    'listings' => Listing::all()
            'listings' => Listing::orderByDesc('created_at')
            ->paginate(10)
           ]
       );
   }


   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       // $this->authorize('create', Listing::class);
       return inertia('Listing/Create');
   }


   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {


       // Auth::user()   -> its current user
       //  $request->user()


      
       $request->user()->listings()->create
       // Listing::create
       (
           $request->validate([
               'beds' => 'required|integer|min:0|max:20',
               'baths' => 'required|integer|min:0|max:20',
               'area' => 'required|integer|min:15|max:1500',
               'city' => 'required',
               'code' => 'required',
               'street' => 'required',
               'price' => 'required|integer|min:1|max:20000000',
           ])
       );
       return redirect()->route('listing.index')->with('success', 'Listing was created!');
   }


   /**
    * Display the specified resource.
    */
   public function show(Listing $listing)
   {


       // $listing = Listing::find($id);
       // if( Auth::user()->cannot('view', $listing)){
       //     abort(403);
       // }
        //  dd($listing);
        // $this->authorize('view', $listing);
        // Auth::user()->can('view',$listing);
        // $this->authorize('view', $listing);

       return inertia(
           'Listing/Show',
           [
               'listing' => $listing
           ]
       );
   }


   /**
    * Show the form for editing the specified resource.
    */
   public function edit(listing $listing)
   {
       return inertia(
           'Listing/Edit',
           [
               'listing' => Listing::find($listing)
           ]
           );
   }


   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $listing )
   {
       // $listing = Listing::find($id);
       $listing->update(
           $request->validate([
               'beds' => 'required|integer|min:0|max:20',
               'baths' => 'required|integer|min:0|max:20',
               'area' => 'required|integer|min:15|max:1500',
               'city' => 'required',
               'code' => 'required',
               'street' => 'required',
               'price' => 'required|integer|min:1|max:20000000',
           ])
       );
       return redirect()->route('listing.index')->with('success', 'Listing was updated!');
   }


   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Listing $listing)
   {
       // $listing = Listing::find($id);
       $listing->delete();
       return redirect()->back()->with('success','Listing was Deleted');
   }
}

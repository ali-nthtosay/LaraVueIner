<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing ;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\ListingImage;

class RealtorListingController extends Controller
{
    public function __construct(){
         $this->authorizeResource(Listing::class,'listing');
    }
    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])        ];

        return inertia(
            'Realtor/Index',
            /// fetching listings from current user
            [
            
            'filters' => $filters,
            'listings' => Auth::user()
            ->listings()
            // ->mostRecent()
            ->filter($filters)
            // ->get()
            ->withCount('images')
            ->paginate(15)
            ->withQueryString()
            ]
        );
    }

    public function create()
    {
        // $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
    }
    // public function store(Listing $listing, Request $request)
    // {
        
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $file) {
    //             $path = $file->store('images', 'public');

    //             $listing->images()->save(new ListingImage([
    //                 'filename' => $path
    //             ]));
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Images uploaded!');
    // }
    public function store(Request $request)
    {
        $user = Auth::user();

    
        // Create a new instance of Listing
        $listing = new Listing();
    
        // Set the properties of the listing
        $listing->beds = $request->beds;
        $listing->baths = $request->baths;
        $listing->area = $request->area;
        $listing->city = $request->city;
        $listing->code = $request->code;
        $listing->street = $request->street;
        $listing->price = $request->price;
        $listing->by_user_id = $user->id;
        // Save the listing
        $listing->save();
    
        // Associate the listing with the user
        $user->listings()->save($listing);
    
        // Redirect the user to the desired route with a success message
        return redirect()->route('realtor.listing.index')
                         ->with('success', 'Listing was created!');
    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(Request $request, Listing $listing)
    {
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

        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing was changed!');
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}




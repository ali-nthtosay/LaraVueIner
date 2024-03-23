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
        return inertia('Realtor/Create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

    
        $listing = new Listing();
    
        $listing->zimmer = $request->zimmer;
        $listing->badezimmer = $request->badezimmer;
        $listing->wohnflaeche = $request->wohnflaeche;
        $listing->stadt = $request->stadt;
        $listing->plz = $request->plz;
        $listing->strasse = $request->strasse;
        $listing->preis = $request->preis;
        $listing->by_user_id = $user->id;
        $listing->hausnummer = $request->hausnummer;
        $listing->wohnungstype = $request->wohnungstype;

        $listing->save();
    
        $user->listings()->save($listing);
    
        return redirect()->route('dashboard.listing.index')
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
                'zimmer' => 'required|integer|min:0|max:20',
                'badezimmer' => 'required|integer|min:0|max:20',
                'wohnflaeche' => 'required|integer|min:15|max:1500',
                'stadt' => 'required',
                'plz' =>'required|integer|min:5|max:5',
                'strasse' => 'required',
                'preis' => 'required|integer|min:1|max:200000000',
                'hausnummer' => 'required',
                'wohnungstype' => 'required'
            ])
        );

        return redirect()->route('dashboard.listing.index')
            ->with('success', 'Listing was changed!');
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}




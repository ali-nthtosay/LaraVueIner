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
    public function store(Listing $listing, Request $request)
    {
        dd('Works!');
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded!');
    }
}




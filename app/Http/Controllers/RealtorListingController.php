<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing ;
use Illuminate\Http\Request;
use App\Models\User ;

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
            ->mostRecent()
            ->filter($filters)
            ->get()
            ]
        );
    }


    public function destroy(Listing $listing)
    {
        // dd(   $listing->deleteOrFail());
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }

}
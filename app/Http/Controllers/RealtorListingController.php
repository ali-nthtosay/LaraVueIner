<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing ;
use Illuminate\Http\Request;

class RealtorListingController extends Controller
{
    public function __construct(){
         $this->authorizeResource(Listing::class,'listing');
    }
    public function index()
    {
        return inertia(
            'Realtor/Index',
            /// fetching listings from current user
            ['listings' => Auth::user()->listings]
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
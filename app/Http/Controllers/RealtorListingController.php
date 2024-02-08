<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RealtorListingController extends Controller
{
    public function index()
    {
        return inertia(
            'Realtor/Index',
            /// fetching listings from current user
            ['listings' => Auth::user()->listings]
        );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        // dd(Listing::all());
        return inertia('Index/Index', [
            'message' => 'welcome to my index page'
        ]) ;

    }
    public function show(){
        return 'show';
    }
}

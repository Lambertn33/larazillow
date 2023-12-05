<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
        $this->middleware('auth');
    }

    public function index()
    {
        return inertia('realtor/Index', [
            'listings' => Auth::user()->listings
        ]);
    }
}

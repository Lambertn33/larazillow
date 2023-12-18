<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ListingsController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'areaFrom', 'areaTo', 'baths', 'beds']);
        $listings = Listing::orderBy('created_at', 'asc')
            ->filter($filters)
            ->paginate(10)->withQueryString();

        return Inertia('listings/index/Index', [
            'listings' => $listings,
            'filters' => $filters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('listings/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create($request->validate([
            'beds' => 'required|integer|min:1|max: 20',
            'baths' => 'required|integer|min:1|max: 20',
            'area' => 'required|integer|min:15|max: 1500',
            'street' => 'required',
            'street_no' => 'required',
            'city' => 'required',
            'code' => 'required',
            'price' => 'required|integer|min:1|max:2000000'
        ]));
        return redirect()->route('listings.index')->with('success', 'Listing created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return Inertia('listings/Show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return Inertia('listings/Edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'beds' => 'required|integer|min:1|max: 20',
            'baths' => 'required|integer|min:1|max: 20',
            'area' => 'required|integer|min:15|max: 1500',
            'street' => 'required',
            'street_no' => 'required',
            'city' => 'required',
            'code' => 'required',
            'price' => 'required|integer|min:1|max:2000000'
        ]));
        return redirect()->route('listings.index')->with('success', 'Listing updated');
    }
}

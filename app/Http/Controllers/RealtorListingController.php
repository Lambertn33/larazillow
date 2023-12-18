<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted')
        ];

        return inertia('realtor/index/Index', [
            'listings' => Auth::user()->listings()->withTrashed()->filter($filters)->paginate(5)
        ]);
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->forceDelete();
        return redirect()->back()->with('success', 'Listing Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\List_;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load('images');
        return inertia('listings/images/Index', [
            'listing' => $listing
        ]);
    }

    public function store(Listing $listing, Request $request)
    {
        if ($request->has('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*.mimes' => 'The file should be in one of the formats: jpg, png, jpeg, webp'
            ]);
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');

                $listing->images()->create([
                    'filename' => $path
                ]);
            }
            return back()->with('success', 'Images uploaded successfully');
        }
    }

    public function destroy(Listing $listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);

        $image->delete();

        return back()->with('success', 'Image deleted successfully');
    }
}

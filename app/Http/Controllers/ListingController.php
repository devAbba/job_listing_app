<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ListingController extends Controller
{
    /**
     * function to show all listings
     */
    public function index(): View
    {
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag']))->paginate(4)
        ]);
    }

    /**
     * function to show listing
     */
    public function show(Listing $listing): View
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    /**
     * show form to create new listing
     */
    public function create(): View
    {
        return view('listings.create');
    }

    /**
     * function to save new listing
     */
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $logo_url = cloudinary()->upload($request->file('logo')->getRealPath(), [
                'folder' => 'logos'
            ])->getSecurePath();

            $form_fields['logo'] = $logo_url;
        }

        $form_fields['user_id'] = auth()->id();

        Listing::create($form_fields);

        return redirect('/')->with('success', "Job listing created successfully!");
    }

    // show edit form
    public function edit(Listing $listing): View
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing
    public function update(Request $request, Listing $listing)
    {
        if($listing->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $form_fields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $logo_url = cloudinary()->upload($request->file('logo')->getRealPath(), [
                'folder' => 'logos'
            ])->getSecurePath();

            $form_fields['logo'] = $logo_url;
        }

        $listing->update($form_fields);

        return back()->with('success', "Job listing updated successfully!");
    }

    // delete listing
    public function destroy(Listing $listing)
    {
        if($listing->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();

        return redirect('/')->with('success', "Listing deleted successfully");
    }

    // manage listing
    public function manage()
    {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }

}

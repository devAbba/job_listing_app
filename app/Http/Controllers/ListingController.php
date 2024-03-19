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
    public function index(Request $request): View
    {
        $page_size = $request->query('page_size') ?? 6;
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag']))->paginate($page_size)
        ]);
    }

    /**
     * function to show listing
     */
    public function show(Listing $listing): View
    {
        $listing->views++;
        $listing->save();

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

        $this->authorize('update', $listing);

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
        $this->authorize('destroy', $listing);

        $listing->delete();

        return back()->with('success', "Listing deleted successfully");
    }

    // manage listing
    public function manage()
    {
        return view('users.dashboard', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }

}

<?php

namespace App\Http\Controllers\backend\CMS\landingPage;

use App\Models\CMS;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{


    //helper for img storage
    protected $helper;
    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Display a listing of the resource.
     */

    //For Banner Section start
    public function banner()
    {
        $data = CMS::all();
        return view('backend.layout.cms.landingPage.banner', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bannerUpdate(Request $request, string $id)
    {
        $data = CMS::find($id); // Use $id here

        if ($data) { // Check if the data exists
            $updated = $data->update([
                'description' => $request->description,
                'title' => $request->title,
            ]);

            if ($updated) {
                return redirect()->back()->with('success', 'Data Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Data update failed!');
            }
        } else {
            return redirect()->back()->with('error', 'Data not found!');
        }
    }
    //For Banner Section end


    /* For Biography Section start */
    public function biography()
    {
        // Retrieve all data from the CMS model
        $data = CMS::all();
        return view('backend.layout.cms.landingPage.biography', compact('data'));
    }

    public function biographyUpdate(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120'
        ]);

        // Find the CMS record by ID
        $data = CMS::find($id);
        if ($data) {
            // Prepare data for update
            $updateData = [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
            ];

            /* // Handle image upload if provided
            if ($request->hasFile('image_url')) {
                $updateData['image_url'] = $request->file('image_url')->store('biography', 'public');
            } */

            // Handle image upload
            if ($request->hasFile('image_url')) {
                $image = $request->file('image_url');
                $image_url = $this->helper->uploadImage($image, 'images/cms/biography');
                $updateData['image_url'] = $image_url;
            }


            // Update the record in the database
            if ($data->update($updateData)) {
                return redirect()->back()->with('success', 'Data Updated Successfully');
            }

            return redirect()->back()->with('error', 'Data update failed!');
        }

        return redirect()->back()->with('error', 'Data not found!');
    }

    /* For Biography Section end */
}

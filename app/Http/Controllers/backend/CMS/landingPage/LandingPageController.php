<?php

namespace App\Http\Controllers\backend\CMS\landingPage;

use App\Models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $data = CMS::find($request->id);


        $updated = $data->update([
            'description' => $request->description,
            'title' => $request->title,
        ]);

        if ($updated) {
            return redirect()->back()->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Data update failed!');
        }
    }
}

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
    public function bannerUpdate(Request $request)
    {
        $data = CMS::find($request->id);


        $updated = $data->update([
            'description' => $request->description,
        ]);

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

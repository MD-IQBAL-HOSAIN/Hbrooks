<?php

namespace App\Http\Controllers\backend;

use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UpcommingAlbumImage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UpcommingAlbumController extends Controller
{

    //helper for img storage
    protected $helper;
    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }


    // index
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UpcommingAlbumImage::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('image', function ($data) {
                    return "<img width='70px' src='" . $data->image_url . "' />";
                })
                ->addColumn('location', function ($data) {
                    return $data->location;
                })
                ->addColumn('performance_date', function ($data) {
                    return Carbon::parse($data->performance_date)->format('d F Y');
                })

                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['title', 'location', 'image', 'performance_date', 'action'])
                ->make(true);
        }
        return view('backend.layout.cms.album-image.index');
    }

    public function create()
    {
        return view('backend.layout.cms.album-image.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'location' => 'nullable|string',
            'performance_date' => 'nullable|date',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        $image_url = null;

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $image_url = $this->helper->uploadImage($image, 'images/cms/upcomming-album'); //helper used for image upload
        }

        // Create the gallery image entry
        $data = UpcommingAlbumImage::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'location' => $request->location,
            'performance_date' => $request->performance_date,
            'image_url' => $image_url,
        ]);

        if ($data) {
            return redirect()->action([self::class, 'index'])->with('t-success', 'Slider image created successfully.');
        } else {
            return redirect()->action([self::class, 'create'])->with('t-error', 'Data update failed!');
        }
    }



    //destroy function
    public function destroy($id)
    {
        $album = UpcommingAlbumImage::find($id);

        if (!$album) {
            return response()->json(['success' => false, 'message' => 'Data not found.']);
        }

        try {
            $album->delete();
            return response()->json(['success' => true, 'message' => 'Album deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting.']);
        }
    }
}

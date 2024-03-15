<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        // dd($request->all());

        if ($request->keyword == null || $request->keyword == ' ') {
            $vendors = Vendor::orderBy('created_at', 'desc');
            if (isset($request->user_id)) {
                $vendors = $vendors->where('vendors.user_id', $request->user_id);
            }
            $vendors = $vendors->paginate(25);
        } else {

            $vendors = Vendor::where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('id', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('mobile', 'like', '%' . $request->keyword . '%')
                ->paginate(25)->setPath('');
            $pagination = $vendors->appends(array(
                'keyword' => $request->keyword
            ));
        }


        $data = view('admin.vendor.vendortable', compact('vendors'))->render();

        return response()->json([
            'data' => $data,
            'total' => (string) $vendors->total(),
            'pagination' => (string) $vendors->links()
        ]);
    }

    public function locked(Request $request)
    {
        // dd($request->locked_val);
        if (isset($request->locked_id)) {
            $lead = Vendor::find($request->locked_id);
            $lead->update([
                'locked' => $request->locked_val
            ]);
        }

        return 1;
    }
    public function index(Request $request)
    {


            if (!$request->keyword) {
                $vendors = Vendor::orderBy('created_at', 'desc')->paginate(25);
            } else {
                $vendors = Vendor::where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%')
                    ->orWhere('id', 'like', '%' . $request->keyword . '%')
                    ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                    ->orWhere('mobile', 'like', '%' . $request->keyword . '%')
                    ->paginate(25)->setPath('');
                $pagination = $vendors->appends(array(
                    'keyword' => $request->keyword
                ));
            }

        $users = User::all();

        return view('admin.vendor.index', compact(['vendors', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.vendor.create', compact('users'));
    }

    public function profile()
    {
        return view('admin.vendor.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Vendor::create($request->all());
        return redirect()->route('vendors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        $users = User::all();
        return view("admin.vendor.edit", compact('vendor', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {

        $vendor->update($request->all());
        return redirect()->route('vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        // $vendor->delete();
        return redirect()->back();
    }

    public function save_image(Request $request)
    {
        // $id = $request->vendorid;
        $vendor = Vendor::find(auth()->vendor()->id);
        if ($request->hasFile('dp')) {
            if (auth()->vendor()->dp != null) {
                // $image_path = 'D:/xampp/htdocs/constructionchatt/public/images/vendordp/'.auth()->vendor()->dp;
                $image_path = public_path('images/vendordp/') . auth()->vendor()->dp;
                // dd($image_path);
                unlink($image_path);
            }
            $nnn = date('YmdHis');
            $completeFileName = $request->file('dp')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $image = $request->file('dp');
            $name = str_replace(' ', '_', $fileNameOnly) . '-' . time() . $nnn . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/vendordp');
            $image->move($destinationPath, $name);
            $vendor->dp = $name;
            $vendor->save();
            return 1;
        }
    }


    public function rotate_image(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $filename = $request->image;
        $arrayimage = explode('/', $filename);
        $imagename = $arrayimage[sizeof($arrayimage) - 1];
        $filename = public_path("images/vendordp/" . $imagename);
        $degrees = $request->angle;
        if ($request->angle == 90) {
            $degrees = 270;
        }
        if ($request->angle == 270) {
            $degrees = 90;
        }
        // $img=Intervention\Image\Facades\Image::make($filename);
        // $img->rotate($degrees);
        // $img->save(public_path('images/vendordp/rotated.jpg'));
        // // Load the image(
        // $source = imagecreatefromjpeg($filename);
        // // Rotate
        // $rotate = imagerotate($source, $degrees, 0);
        // // and save it on your server...
        // imagejpeg($rotate, public_path('images/vendordp/ahkgsdhas.jpg') );
        $img_new = imagecreatefromjpeg($filename);
        $img_new = imagerotate($img_new, $degrees, 0);
        // Save rotated image
        imagejpeg($img_new, $filename, 80);
    }


    public function filter(Request $request)
    {

        $vendors = Vendor::orderBy('created_at', 'desc');

        $users = User::orderBy('created_at', 'desc');

        if (isset($request->user_id)) {
            $vendors = $vendors->where('vendors.user_id', $request->user_id);
        }
        $vendors = $vendors->paginate(25);
        $users = $users->paginate(25);

        $pagination = $vendors->appends(array(
            'user_id' => $request->user_id,

        ));

        return view('admin.vendor.index', compact(['vendors', 'users']));
    }

    public function updatepassword($id, Request $request)
    {
        $vendor = Vendor::find($id);
        if (Hash::check($request->old_password, $vendor->password)) {

            $vendor->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with(['message' => 'Action Successful']);
        } else {
            return redirect()->back()->with(['message' => 'Password Mismatch']);
        }
    }

    public function changepassword()
    {
        return view('admin.vendor.changepassword');
    }
}

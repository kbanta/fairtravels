<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:administrator']);
    }
    public function index()
    {
        $notifications = Auth::user()->notifications;
        return view('layouts.admin.dashboard', [
            'notifications' => $notifications
        ]);
    }
    public function home_page()
    {
        $notifications = Auth::user()->notifications;
        return view('layouts.admin.home.admin_home', [
            'notifications' => $notifications
        ]);
    }
    public function profile()
    {
        $id = Auth::user()->id;
        $notifications = Auth::user()->notifications;
        $user = User::select('*')
            ->where('users.id', '=', $id)
            ->get();
        $pd = PersonalDetails::select('*')
            ->where('personal_details.id', '=', $id)
            ->get();
        return view('layouts.admin.account.profile', [
            'notifications' => $notifications,
            'user' => $user,
            'pd' => $pd
        ]);
    }
    public function update_profile(Request $request)
    {
        // dd(Auth::user()->id);
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->name = $request->input('username');
            $user->email = $request->input('email');


            if (PersonalDetails::find($id) == null) {
                $details = new PersonalDetails;
                $details->id = Auth::user()->id;
                $details->fname = $request->input('fname');
                $details->lname = $request->input('lname');
                $details->address = $request->input('address');
                $details->city = $request->input('city');
                $details->country = $request->input('country');
                $details->postal_code = $request->input('postalcode');
                $details->save();
            } else {
                $details = PersonalDetails::find($id);
                $details->id = Auth::user()->id;
                $details->fname = $request->input('fname');
                $details->lname = $request->input('lname');
                $details->address = $request->input('address');
                $details->city = $request->input('city');
                $details->country = $request->input('country');
                $details->postal_code = $request->input('postalcode');
                $details->update();
            }
            $user->update();
        }
        return response()->json([
            'success' => 'account added successfully'
        ]);
        // dd($request->all());
    }
    public function update_pic(Request $request)
    {
        $user = $request->user();

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('temp'), $filename);
            $user->profile_picture_temp = $filename;
            $user->save();
        }

        return redirect()->back();
    }
    public function changeProfilePic(Request $request)
    {
        // dd(Auth::user()->id);
        $path = 'user/';
        $file = $request->file('admin-profile_pic');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';

        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'something went wrong, upload new picture failed']);
        } else {
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];
            if ($oldPicture != '') {
                if (\file_exists(public_path($path . $oldPicture))) {
                    \unlink(public_path($path . $oldPicture));
                }
            }
            User::find(Auth::user()->id)->update(['picture' => $new_name]);
            if (!$upload) {
                return response()->json(['status' => 0, 'msg' => 'something went wrong,updating picture in db failed']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'your profile picture has been updated succesfully']);
            }
        }
    }
}

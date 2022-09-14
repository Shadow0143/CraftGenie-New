<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Questions;
use App\Models\users;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Storage\AlertSessionStore;


class AdminuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminuserList()
    {
        $users = User::select('users.id', 'name', 'email', 'phone_no', 'address')
            ->leftjoin('address', 'address.user_id', '=', 'users.id')
            ->where('role', '0')
            ->orderBy('id', 'DESC')->get();

        return view('admin.adminuser.adminuserList', compact('users'));
    }

    public function addAdminuser()
    {
        $packages = Package::where('status', 'YES')->get();
        return view('admin.adminuser.addadminuser', compact('packages'));
    }

    public function submitAdminuser(Request $request)
    {
        // dd($request->all()); 
        if (!empty($request->user_id)) {
            $user = User::find($request->user_id);
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone_no = $request['phone_no'];
            $user->save();

            $address = Address::where('user_id', $request->user_id)->update(['address' => $request['address']]);

            Alert::success('Success', 'Admin user is Updates.');
        } else {
            $exit_user = User::where('email', $request['email'])->first();
            if (empty($exit_user)) {
                $user = new User();
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->phone_no = $request['phone_no'];
                $user->password = Hash::make($request['password']);
                $user->role = '0';
                $user->save();

                $address = new Address();
                $address->user_id = $user->id;
                $address->address = $request['address'];
                $address->is_default = '1';
                $address->save();

                Alert::success('Success', 'Admin user is added.');
            } else {
                Alert::error('Sorry', 'This email allready exit.');
            }
        }
        return redirect()->route('adminuserList');
    }

    public function deleteAdminuser(Request $request)
    {
        $delete = User::find($request->id);
        $delete->delete();
    }

    public function editAdminuser($id)
    {
        $user = User::select('users.id', 'name', 'email', 'phone_no', 'address')
            ->leftjoin('address', 'address.user_id', '=', 'users.id')->where('users.id', $id)->first();
        return view('admin.adminuser.addadminuser')->with('user', $user);
    }
}
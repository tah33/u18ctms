<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Toastr;
use Auth;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
public function show()
    {
         if(Auth::user()->role == 'admin'){
         $users=User::all()->except(Auth::id());
        return view('admin.users',compact('users'));
    }
    else {
    Toastr::warning('You do not Have a permission to go there','Warning!');
    return redirect('/');
}
    }
     public function view($id)
    {
        $users=User::findorfail($id);
        return view('admin.user',compact('users'));
    }
     public function edit($id)
    {
        $users=User::findorfail($id);
        return view('admin.edit',compact('users'));
    }
    public function update($id)
    { 
        $this->validate(request(), [
           'name' => 'required',
           'email' => "required|unique:users,email,$id",
           'username' => "required|unique:users,username,$id",
           'password' => 'confirmed',
        ]);
$user=User::findorfail($id);
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
         if(Input::get ('password') == '')
        {
             $user->update (Input::except ('password'));}
             else{
        $user->password = bcrypt(request('password'));
}
        $user->save();
Toastr::success('Account Has Been Updated','Success!');
        return back();
    }
    
public function destroy($id)
    {
$user=User::findorfail($id);
$user->delete();
        return back();
    }
public function profile()
    {
$user=Auth::user();

        return view('admin.profile',compact('user'));
    }

public function editprofile($id)
    {
$user=Auth::user();

        return view('admin.editprofile',compact('user'));
    }
    public function updateprofile($id)
    {
$this->validate(request(), [
            'name' => 'required',
           'email' => "required|unique:users,email,$id",
           'username' => "required|unique:users,username,$id",
            'password' => 'confirmed',
        ]);
$user=Auth::user();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
         if(Input::get ('password') == '')
        {
             $user->update (Input::except ('password'));}
             else{
        $user->password = bcrypt(request('password'));
}
        $user->save();
Toastr::success('Account Has Been Updated','Success!');
        return redirect('profile');
    }


}
 
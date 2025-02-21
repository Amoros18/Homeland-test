<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Prop\AllRequest;
use App\Models\Prop\HomeType;
use App\Models\Prop\Property;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewLogin(){

        
        return view('admins.login');
    }

    public function checkLogin(Request $request){

        // $remember_me = $request->has('remember_me') ? true : false;
        // if(auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)){
        //     $request->session()->regenerate();
        //     return redirect()->intended(route('admin.dashboard'));
        // }
        $credentials = $request->validate([
            'email' => 'required|email',   // Validation pour l'email
            'password' => 'required|min:6',
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            // dd(Auth::guard('admin'));
                $admin = Auth::guard('admin')->user();
                // dd($admin);
            $name = $admin->name;
            // dd($name);
            \Log::info('Admin connecté', ['admin' => Auth::guard('admin')->user()]);
            return redirect()->route('admin.dashboard');
        }

        
        return redirect()->back()->with(['error' => 'error logging in']);
    }
    
    public function index(){
        $adminCount = Admin::select()->count();
        $homeTypeCount = HomeType::select()->count();
        $propretiesCount = Property::select()->count();
        $requestCount = AllRequest::select()->count();

        return view('admins.index',compact('adminCount','homeTypeCount','propretiesCount','requestCount'));
    }

    public function allAdmins(){
        
        $allAdmins = Admin::select()->get();

        return view('admins.admins',compact('allAdmins'));
    }

    public function createAdmins(){
        

        return view('admins.createadmins');
    }
    public function storeAdmins(Request $request){
        Request()->validate([
            'name'=>"required|max:100",
            'email'=>"required|max:100",
            'password'=>"required|max:40",
        ]);
        $storeAdmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $allAdmins = Admin::select()->get();

        return view('admins.admins',compact('allAdmins'))->with('success','Admin Create Successfuky');
    }

    public function allHomeTypes(){
        
        $allHomeTypes = HomeType::select()->get();

        return view('admins.hometypes',compact('allHomeTypes'));
    }

    public function createHomeType(){
        

        return view('admins.createhometypes');
    }
    public function storeHomeType(Request $request){

        Request()->validate([
            'name'=>"required|max:40"
        ]);
        $allHomeTypes = HomeType::create([
            'hometypes' => $request->name,
        ]);

        $allHomeTypes = HomeType::select()->get();

        return view('admins.hometypes',compact('allHomeTypes'))->with('success','Admin Create Successfuky');
    }

    public function editHomeType($id){
        $homeType = HomeType::find($id);
        return view('admins.edithometypes',compact('homeType'));
    }

    public function updateHomeType($id, Request $request){
        $homeType = HomeType::find($id);
        
        Request()->validate([
            'name'=>"required|max:40"
        ]);
        $homeType->update([
            'hometypes' => $request->name,
        ]);
        $allHomeTypes = HomeType::select()->get();

        return view('admins.hometypes',compact('allHomeTypes'))->with('success','Admin Update Successfuky');
    }

    public function deleteHomeType($id){
        $homeType = HomeType::find($id);
        $homeType->delete();
        $allHomeTypes = HomeType::select()->get();

        return view('admins.hometypes',compact('allHomeTypes'))->with('success','Admin Delete Successfuky');
    }

    public function request(){
        
        $allRequests = AllRequest::select()->get();

        return view('admins.requests',compact('allRequests'));
    }

    public function allProps(){
        
        $allProps = Property::all();

        return view('admins.props',compact('allProps'));
    }

    
    
}

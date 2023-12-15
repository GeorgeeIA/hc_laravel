<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register()
    {
        return view('login.register');
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            ]);

            $admin = new Admin();
            $admin->username = $validateData['username'];
            $admin->password = $validateData['password'];
            $admin->save();
            $request->session()->flash('pesan','Register data berhasil');
            return redirect()->route('login.index');

    }

    public function index()
    {
        return view('login.login');
    }

    public function process(Request $request){
        $validateData = $request->validate([
        'username' => 'required',
        'password' => 'required',
        ]);
        $result = Admin::where('username', '=', $validateData['username'])->first();
        if($result){
            // dd('username ada');
            if (($request->password == $result->password))
            {
                // dd('password benar');
            session(['username' => $request->username]);
            return redirect('/pasien');
            }
            else {
                // dd('password salah');

            return back()->withInput()->with('pesan',"Login Gagal");
            }
        }
        else{
            // dd('username tidak ada');

            return back()->withInput()->with('pesan',"Login Gagal");
        }
    }

    public function logout(){
        session()->forget('username');
        return redirect('login')->with('pesan','Logout berhasil');
    }

}

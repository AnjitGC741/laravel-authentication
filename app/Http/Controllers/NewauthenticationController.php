<?php

namespace App\Http\Controllers;

use App\Models\newauthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewauthenticationController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function saveList(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:newauthentications',
            'password'=>'required',
        ]);
        $todoObj = new newauthentication();
        $todoObj->name = $req->name;
        $todoObj->email = $req->email;
        $todoObj->password = hash::make($req->password);
        $todoObj->save();
        if($todoObj){
            return redirect('/loginPage');
        }
        else{
            return back()->with('fail','Unable to Sign In');
        }
       
    }
    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password'=>'required',
        ]);
        $user = newauthentication::where('email','=',$req->email)->first();
        if($user){
            if(Hash::check($req->password,$user->password)){
                return redirect('/sign-in');
            }else{
                return back()->with('fail','Password not matched');
            }
            
        }
        else{
            return back()->with('fail','user not found');
        }
    
       
    }
}

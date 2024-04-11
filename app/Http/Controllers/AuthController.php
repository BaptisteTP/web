<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Users;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

  public function unlogin(){
        Auth::logout();
        return redirect(route('home.home'));
 }
    public function dologin(LoginRequest $request)
    {
        $credentials = $request->validated();
        $visibility = Users::getVisibilityByEmail( $credentials['email']);
        if ($visibility==0){
            return to_route('auth.login')->withErrors([
                'email' => "E-mail et Mot de passe invalide" 
   
            ])->onlyInput("email");
        }
        
         if ($visibility==1) {
     
             return to_route('auth.login')->withErrors([
                 'validation' => "Votre demande de compte est en cours de validation"

             ])->onlyInput("validation");
         }
         

        


         if (Auth::attempt($credentials)) {

             $request->session()->regenerate();
             return redirect()->route('home.home');
        }else{
             
         return to_route('auth.login')->withErrors([
            'email' => "eE-mail ou Mot de passe invalide" .$credentials['email']

        ])->onlyInput("email");
        }
         return view('home.home');
        
          //Auth::login(User::find(1));
    }


    public function index()
    {
        $auth = Users::all();
        return view('auth.index', ['auth' => $auth]);
    }

    public function create(): View
    {
        return view('auth.create');
    }



}
<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
class DemandeController extends Controller
{
    public function index(){

        return view('auth.demande',[]);

    }

    public function dodemande(Request $request): RedirectResponse{
        
        $validatedData =  $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'email' => 'required',
            'password' => 'required',
            'center' => 'required',
            'promotion' => 'required',
            'roles_id' => 'required',
        ]);
        if (Users::getVisibilityByEmail($validatedData ['email']) != 0){
            return redirect()->route('home.home')->with('success','Email déja utilisée');
        }
        $hashedPassword = bcrypt($validatedData['password']);
        //
        
        //$validationApi_URL = config('auth.email_api_chek') . $validatedData['email'];
        //$response = Http::withHeaders([])->get($validationApi_URL);
       
     

        Users::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => $hashedPassword,
            'center' => $request['center'],
            'birthdate' => $request['birthdate'],
            'promotion' => $request['promotion'],
            'roles_id' => $request['roles_id']
        ]);
        
        return redirect()->route('home.home');//->with('success','Account created successfully.')


    }
}

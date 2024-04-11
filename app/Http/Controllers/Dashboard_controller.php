<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Filesystem;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\InternshipOffer;
use App\Models\Companies;
use App\Models\Locations;
use App\Models\Sectors;
use App\Models\Evaluations;
use App\Models\Users;


class Dashboard_controller extends Controller
{

    private $chemin_CV;
    public function index(){
        if (Auth::check()) {

         $role = Auth::user()->roles_id;
         switch($role){
            case 3:
                $query = InternshipOffer::query();
                $internship_offers = $query->get();
                $query2 = Companies::query();
                $companies = $query2->get();
                $query3 = Users::query();
                $users = $query3->get();
                return view('dashboard.admin',['internship_offers' => $internship_offers,'companies' => $companies, 'users' => $users]);
            case 2:
                $query = InternshipOffer::query();
                $internship_offers = $query->get();
                $query1 = Users::query();
                $users = $query1->get();
                return view('dashboard.pilote',['users' => $users,'internship_offers' => $internship_offers]);
            
            case 1:  
                
                $path = "cv/".Auth::user()->id;
               if(Storage::exists($path.'/'.$this->getCVFilenames($path))){
                $cv = 'Fichier Actuelle : '.basename($this->getCVFilenames($path)) ;
              }else{
              $cv = 'Uploder un fichier';}
               
              
                return view('dashboard.student')->with(  ['cv' => $cv]);


            default:
                return redirect()->route('login');

        }
        }else{
            return redirect()->route('login');
        }

}


    public function setCV(Request $requete){


        $requete->validate([
            'file' => 'required|file|max:39000000'
        ]);
        $file = $requete->file('file');

        if ($file) {
            $chemin_CV = "cv/".Auth::user()->id.'/';
            $name = $file->getClientOriginalName();

            if (!Storage::exists($chemin_CV)) {
                Storage::makeDirectory($chemin_CV);
            } else {
                Storage::deleteDirectory($chemin_CV);
                Storage::makeDirectory($chemin_CV);
            }

            Storage::putFileAs($chemin_CV , $file,$name );

            return redirect()->back()->with(['message' => 'Fichier enregistré avec succès.'], 200);
        } else {
            return redirect()->back()->with(['message' => 'Erreur lors de l’envoi du fichier'], 400);
        }

    }




    public static function getCVFilenames(string $directoryName)
    {

        if (! Storage::exists($directoryName)) {
            return '';
        }

        $filePaths = Storage::disk('local')->allFiles($directoryName);

        $filenames = array_map(function ($item) {
            return basename($item);
        }, $filePaths);

        return $filenames[0];
    }
    public function downloadCV() {
        $path = "cv/".Auth::user()->id;

        return Response::download(storage_path().'/app/'.$path.'/'.$this->getCVFilenames($path), null, ['Content-Type' => 'application/pdf']);
    }

    public static function  getCVFilenameFromID(String $idCV){
        $directoryName = storage_path().'/app/cv/'.$idCV;
        return Dashboard_controller::getCVFilenames($directoryName);
    }

    public function updateVisibility(Request $request, Users $user): RedirectResponse
    {
        $request->validate([
            'visibility' => 'required',
        ]);

        $user->update([
            'visibility' => $request->input('visibility'),
        ]);

        return redirect()->back()
                                ->with('success', 'Job Offer updated successfully');
        }


        public function editUser(Users $user): View
            {
                $cities = Locations::all();
                return view('users.edit', compact('user','cities'));
            }


            public function updateUser(Request $request, Users $user): RedirectResponse
            {
                $request->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email',
                    'birthdate' => 'required',
                    'password' => 'required|min:6',
                    'center' => 'required',
                    'roles_id' => 'required',
                    'promotion' => 'required',
                    'visibility' => 'required',
                ]);

                $user->update([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'birthdate' => $request->input('birthdate'),
                    'password' => $request->input('password'),
                    'center' => $request->input('center'),
                    'roles_id' => $request->input('roles_id'),
                    'promotion' => $request->input('promotion'),
                    'visibility' => $request->input('visibility'),
                ]);

                return redirect()->route('dashboard')->with('success', 'Utilisateur mis à jour avec succès');
            }

            public function destroyUser(Users $user): RedirectResponse {

                DB::statement("SET FOREIGN_KEY_CHECKS=0");

                $user->delete();

                DB::statement("SET FOREIGN_KEY_CHECKS=1");

                return redirect()->back()
                                ->with('success', 'User deleted successfully');

            }




            public function indexCompany(Request $request): View {
                $companies = Companies::all();

                foreach ($companies as $company) {
                    $totalRatings = Evaluations::where('companies_id', $company->id)->sum('note');
                    $numberOfRatings = Evaluations::where('companies_id', $company->id)->count();
                    $averageRating = $numberOfRatings > 0 ? $totalRatings / $numberOfRatings : 0;

                    $numberOfOffers = InternshipOffer::where('companies_id',$company->id)->count();

                    $company->averageRating = $averageRating;
                    $company->numberOfRatings = $numberOfRatings;
                    $company->numberOfOffers = $numberOfOffers;
                }

                return view('company.index', [
                    'companies' => $companies,
                ]);
            }


    public function createCompany():View {
        return view('company.create');
    }

    public function storeCompany(Request $request): RedirectResponse
            {
                $request->validate([
                    'name' => 'required',
                    'visibility' => 'required',
                    'sectors_id' => 'required',
                    'body' => 'required',
                ]);

                Companies::create([
                    'name' => $request->input('name'),
                    'visibility' => $request->input('visibility'),
                    'sectors_id' => $request->input('sectors_id'),
                    'body' => $request->input('body'),
                ]);

                    return Redirect::route('dashboard')->with('success', 'Company created successfully.');
                }


    public function store(Request $request): RedirectResponse
            {

                if ($request->has('title')) {
                    $request->validate([
                        'title' => 'required',
                        'salary' => 'required',
                        'duration_numerical' => 'required',
                        'duration_unit' => 'required',
                        'companies_id' => 'required',
                        'num_place' => 'required',
                        'text' => 'required',
                        'status_id' => 'required',
                        'type_promotions_id' => 'required',
                        'location_id' => 'required',
                    ]);

                    InternshipOffer::create([
                        'title' => $request->input('title'),
                        'salary' => $request->input('salary'),
                        'duration_numerical' => $request->input('duration_numerical'),
                        'duration_unit' => $request->input('duration_unit'),
                        'companies_id' => $request->input('companies_id'),
                        'num_place' => $request->input('num_place'),
                        'date' => $request->input('date'),
                        'text' => $request->input('text'),
                        'status_id' => $request->input('status_id'),
                        'type_promotions_id' => $request->input('type_promotions_id'),
                        'location_id' => $request->input('location_id'),
                    ]);

                    return Redirect::route('internship_offers.index')->with('success', 'Job offer created successfully.');
                }

                elseif ($request->has('name')) {
                    $request->validate([
                        'name' => 'required',
                        'visibility' => 'required',
                        'sectors_id' => 'required',
                        'body' => 'required',
                    ]);

                    Companies::create([
                        'name' => $request->input('name'),
                        'visibility' => $request->input('visibility'),
                        'sectors_id' => $request->input('sectors_id'),
                        'body' => $request->input('body'),
                    ]);

                    return Redirect::route('internship_offers.create')->with('success', 'Company created successfully.');
                }

                return Redirect::route('internship_offers.create');
            }


            public function edit(Companies $company): View
            {
                return view('company.edit', compact('company'));
            }



            public function update(Request $request, Companies $company): RedirectResponse
            {
                $request->validate([
                    'name' => 'required',
                    'visibility' => 'required',
                    'sectors_id' => 'required',
                ]);

                $company->update([
                    'name' => $request->input('name'),
                    'visibility' => $request->input('visibility'),
                    'sectors_id' => $request->input('sectors_id'),
                    'body' => $request->input('body'),

                ]);

                return redirect()->route('company.index')
                                ->with('success', 'Company updated successfully');
            }




            public function destroy(Companies $company): RedirectResponse
            {
                DB::statement("SET FOREIGN_KEY_CHECKS=0");

                $company->delete();

                DB::statement("SET FOREIGN_KEY_CHECKS=1");

                return redirect()->route('company.index')
                                ->with('success', 'Company deleted successfully');
            }

            public function show(string $companies_id): View {
                $company = Companies::findOrFail($companies_id);

                $sector = $company->sector;

                $totalRatings = Evaluations::where('companies_id', $company->id)->sum('note');
                $numberOfRatings = Evaluations::where('companies_id', $company->id)->count();
                $averageRating = $numberOfRatings > 0 ? $totalRatings / $numberOfRatings : 0;

                return view('company.show', [
                    'company' => $company,
                    'sector' => $sector,
                    'averageRating' => $averageRating,
                    'numberOfRatings' => $numberOfRatings
                ]);
            }


            public function createUser():View {
                return view('users.create');
            }

            public function storeUser(Request $request): RedirectResponse{

                $validatedData =  $request->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'birthdate' => 'required',
                    'email' => 'required',
                    'password' => 'required|min:6',
                    'center' => 'required',
                    'promotion' => 'required',
                    'roles_id' => 'required',
                ]);
                if (Users::getVisibilityByEmail($validatedData['email']) != 0) {
                    $query = InternshipOffer::query();
                    $internship_offers = $query->paginate(10);
                    return view('home.home', [
                        'success' => 'Email déjà utilisé',
                        'internship_offers' => $internship_offers
                    ]);
                }

                $hashedPassword = bcrypt($validatedData['password']);
        
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

                return redirect()->route('dashboard');
            }

            public function storeNote(Request $request): RedirectResponse {
                $request->validate([
                    'note' => 'required',
                    'companies_id' => 'required',
                ]);

                $userId = Auth::id();

                $existingEvaluation = Evaluations::where('users_id', $userId)
                                                  ->where('companies_id', $request->input('companies_id'))
                                                  ->exists();

                if ($existingEvaluation) {
                    return redirect()->back()->with('error', 'Vous avez déjà noté cette entreprise.');
                }

                Evaluations::create([
                    'note' => $request->input('note'),
                    'companies_id' => $request->input('companies_id'),
                    'users_id' => $userId,
                ]);

                return redirect()->back()->with('success', 'Note créée avec succès.');
            }


}

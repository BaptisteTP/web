<?php

namespace App\Http\Controllers;

use App\Models\InternshipOffer;
use App\Models\Companies;
use App\Models\Locations;
use App\Models\Sectors;
use App\Models\Evaluations;
use App\Models\Whishlist;
use  App\Models\Application;

use App\Http\Controllers\Dashboard_controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;




class InternshipOfferController extends Controller
{
    public function postuler(Request $requete){
        if (!Auth::check()){
            return redirect()->to(route('login'));
        }
       
        $validData =  $requete->validate([
            'offer_id' => 'required',
            'user_id' => 'required',
            'cv' => 'required|max:6000000',
            'cover_letter' => 'max:1000',
            
 
        ]);
        $validData['cv'] = $validData['cv']->getPathname();
        
        Application::Create($validData);
        return back() ;
    }
    
    public function index(Request $request) {
        if (!Auth::check()){
            return redirect()->to(route('login'));
        }
        $selectedCities = $request->input('city', []);
        $selectedPromotions = $request->input('type_promotions_id', []);
        $searchTerm = $request->input('search');
    
        $query = InternshipOffer::query();
    
        if (!empty($selectedCities)) {
            $query->whereIn('location_id', function($query) use ($selectedCities) {
                $query->select('id')->from('locations')->whereIn('city', $selectedCities);
            });
        }
    
        if (!empty($selectedPromotions)) {
            $query->whereIn('type_promotions_id', function($query) use ($selectedPromotions) {
                $query->select('id')->from('type_promotions')->whereIn('type_promotion', $selectedPromotions);
            });
        }

        
        if (!empty($searchTerm)) {
            $searchWords = explode(' ', $searchTerm);
    
            $query->where(function($query) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $query->where('title', 'like', '%' . $word . '%');
                }
    
                $query->orWhereHas('location', function($query) use ($searchWords) {
                    foreach ($searchWords as $word) {
                        $query->where('city', 'like', '%' . $word . '%');
                    }
                });
            });
        }
    
        $internship_offers = $query->paginate(4);
    
        if ($internship_offers->isEmpty()) {
            return view('internship_offers.index');
        }

        $isWishlist = [];

        $wishlistIds = Whishlist::where('users_id', Auth::id())->pluck('internship_offers_id')->toArray();
        foreach ($internship_offers as $internship_offer) {
            $isWishlist[$internship_offer->id] = in_array($internship_offer->id, $wishlistIds);
        }

        return view('internship_offers.index', [
            'internship_offers' => $internship_offers,
            'selectedCities' => $selectedCities,
            'selectedPromotions' => $selectedPromotions,
            'searchTerm' => $searchTerm,
            'isWishlist' => $isWishlist,
        ]);
    }

    public function show(string $id): View {
        $internship_offer = InternshipOffer::findOrFail($id);
        $iduser = Auth::user()->id??"";
        $listeCV = Dashboard_controller::getCVFilenameFromID($iduser);
        
        
        
        if (Application::where("offer_id", $id)->where("user_id",$iduser)->first()){
            $bouton = "Déjà postulé";
        }else{
            $bouton = "Postulé à l'offre";
        }
        if ($listeCV ==''){
            $cvName = "Aucun CV envoyée";
        }else{
            $cvName =   $listeCV[0];
        }
        return view('internship_offers.show', ['cv' => $cvName,'internship_offer' => $internship_offer, 'bouton' =>$bouton]);
    }

    public function create():View {
        return view('internship_offers.create');
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


            public function edit(InternshipOffer $internship_offer): View
            {
                $companies = Companies::all();
                $companyName = Companies::where('id', $internship_offer->companies_id)->value('name');
                $cities = Locations::all();
                $cityName = Locations::where('id', $internship_offer->location_id)->value('city');

                return view('internship_offers.edit', compact('internship_offer', 'companyName','cities', 'cityName', 'companies'));
            }



            public function update(Request $request, InternshipOffer $internship_offer): RedirectResponse
            {
                $request->validate([
                    'title' => 'required',
                    'companies_id' => 'required',
                    'location_id' => 'required',
                    'num_place' => 'required',
                    'type_promotions_id' => 'required',
                    'status_id' => 'required',
                    'salary' => 'required',
                    'text' => 'required',


                ]);

                $internship_offer->update([
                    'title' => $request->input('title'),
                    'companies_id' => $request->input('companies_id'),
                    'location_id' => $request->input('location_id'),
                    'num_place' => $request->input('num_place'),
                    'type_promotions_id' => $request->input('type_promotions_id'),
                    'status_id' => $request->input('status_id'),
                    'salary' => $request->input('salary'),
                    'text' => $request->input('text'),

                ]);

                return redirect()->route('internship_offers.index')
                                ->with('success', 'Job Offer updated successfully');
            }




            public function destroy(InternshipOffer $internship_offer): RedirectResponse
            {
                DB::statement("SET FOREIGN_KEY_CHECKS=0");

                $internship_offer->delete();

                DB::statement("SET FOREIGN_KEY_CHECKS=1");

                return redirect()->route('internship_offers.index')
                                 ->with('success', 'Job Offer deleted successfully');
            }


            public function storeWishlist(Request $request): RedirectResponse {
                $request->validate([
                    'users_id' => 'required',
                    'internship_offers_id' => 'required',
                ]);

                $userId = $request->input('users_id');
                $internshipOfferId = $request->input('internship_offers_id');

                $existingWishlistEntry = Whishlist::where('users_id', $userId)
                                                  ->where('internship_offers_id', $internshipOfferId)
                                                  ->first();

                if ($existingWishlistEntry) {
                    return Redirect::route('internship_offers.index')->with('warning', 'Job offer is already in your wishlist.');
                }

                Whishlist::create([
                    'users_id' => $userId,
                    'internship_offers_id' => $internshipOfferId,
                ]);

                return Redirect::route('internship_offers.index')->with('success', 'Job offer added successfully.');
            }


            public function destroyWishlist(Request $request): RedirectResponse {
                $request->validate([
                    'users_id' => 'required',
                    'internship_offers_id' => 'required',
                ]);

                $userId = $request->input('users_id');
                $internshipOfferId = $request->input('internship_offers_id');

                Whishlist::where('users_id', $userId)
                        ->where('internship_offers_id', $internshipOfferId)
                        ->delete();

                return Redirect::route('internship_offers.index')->with('success', 'Job offer removed successfully from wishlist.');
            }



            public function indexOffer(Request $request) {
                if (!Auth::check()){
                    return redirect()->to(route('login'));
                }
                $selectedCities = $request->input('city', []);
                $selectedPromotions = $request->input('type_promotions_id', []);
                $searchTerm = $request->input('search');
            
                $query = InternshipOffer::query();
            
                if (!empty($selectedCities)) {
                    $query->whereIn('location_id', function($query) use ($selectedCities) {
                        $query->select('id')->from('locations')->whereIn('city', $selectedCities);
                    });
                }
            
                if (!empty($selectedPromotions)) {
                    $query->whereIn('type_promotions_id', function($query) use ($selectedPromotions) {
                        $query->select('id')->from('type_promotions')->whereIn('type_promotion', $selectedPromotions);
                    });
                }
                       
                if (!empty($searchTerm)) {
                    $searchWords = explode(' ', $searchTerm);
            
                    $query->where(function($query) use ($searchWords) {
                        foreach ($searchWords as $word) {
                            $query->where('title', 'like', '%' . $word . '%');
                        }
            
                        $query->orWhereHas('location', function($query) use ($searchWords) {
                            foreach ($searchWords as $word) {
                                $query->where('city', 'like', '%' . $word . '%');
                            }
                        });
                    });
                }
            
                $internship_offers = $query->paginate(4);
            
                if ($internship_offers->isEmpty()) {
                    return view('internship_offers.index');
                }
        
                $isWishlist = [];
        
                $wishlistIds = Whishlist::where('users_id', Auth::id())->pluck('internship_offers_id')->toArray();
                foreach ($internship_offers as $internship_offer) {
                    $isWishlist[$internship_offer->id] = in_array($internship_offer->id, $wishlistIds);
                }
        
                return view('internship_offers.index2', [
                    'internship_offers' => $internship_offers,
                    'selectedCities' => $selectedCities,
                    'selectedPromotions' => $selectedPromotions,
                    'searchTerm' => $searchTerm,
                    'isWishlist' => $isWishlist,
                    'wishlistIds' => $wishlistIds,
                ]);
            }

}
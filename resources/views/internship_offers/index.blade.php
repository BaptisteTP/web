@extends('layouts.base')
@section('title', 'StageQuest')

@section('content')

<body class="bg-white">
  <form id="internshipF" action="" method="GET">
      <div class="w-full bg-black h-24 flex justify-center items-center">
          <div class=" rounded-lg bg-white w-8/12 max-w-screen-lg mx-auto p-2">
              <div class="flex justify-between items-center">
                  <div class="flex-1 pr-4">
                      <p class="text-gray-600">Trouver un stage</p>
                      <input name="search" type="text" id="recherche" placeholder="Informatique..."
                          class="border-none focus:outline-none w-full">
                  </div>
                  <div class="p-2 flex items-center">
                      <button id="recherche" class="p-0 border-none bg-transparent cursor-pointer">
                          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                              class="bi bi-search text-black" viewBox="0 0 16 16">
                              <path
                                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                          </svg>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </form>

  <div class="NB">
        <nav class="flex justify-center mt-2">
            <ul class="list-none p-0">
                <li class="inline mr-4"><a href="{{ route('internship_offers.index') }}" class="decoration-black active">Stage</a></li>
                <li class="inline mr-4"><a href="{{route('internship_offers.MesOffres')}}" class="decoration-black ">Mes offres</a></li>
                @if (Auth::user()->roles_id == 2 || Auth::user()->roles_id == 3)
                    <a href="{{ route('internship_offers.create') }}"
                    class="decoration-black "><button
                    class="border border-black bg-white text-black hover:text-green-500 font-bold py-2 px-4 rounded-full">+
                    Créer une offre</button></a>
                @endif
                </ul>
        </nav>
    </div>

  <div class="flex flex-wrap justify-center mt-4">
    <div class="w-full md:w-1/4 lg:w-1/5 xl:w-1/6 px-4 mb-4">
      <form id="internshipForm" action="" method="GET">
        <div class="flex flex-col items-stretch">
            <div class="mb-0 rounded-none border-2">
                <div class="title flex justify-between items-center p-2.5 cursor-pointer">
                    <span class="font-bold text-lg">Ville</span>
                    <span class="ml-2.5 font-bold text-2xl" onclick="toggleContent('ville')">+</span>
                </div>
                <div class="p-2.5 hidden" id="villeContent">
                    <fieldset id="cityFilter">
                        <div>
                            <input type="checkbox" id="paris" name="city[]" value="Paris"
                                {{ in_array('Paris', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="paris">Paris</label>
                            @php
                                $offersCountParis = $internship_offers->where('location_id', '=', 1)->count();
                            @endphp
                            ({{ $offersCountParis }})
                        </div>

                        <div>
                            <input type="checkbox" id="lyon" name="city[]" value="Lyon"
                                {{ in_array('Lyon', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="Lyon">Lyon</label>
                            @php
                                $offersCountLyon = $internship_offers->where('location_id', '=', 2)->count();
                            @endphp
                            ({{ $offersCountLyon }})
                        </div>

                        <div>
                            <input type="checkbox" id="toulouse" name="city[]" value="Toulouse"
                                {{ in_array('Toulouse', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="toulouse">Toulouse</label>
                            @php
                                $offersCountToulouse = $internship_offers
                                    ->where('location_id', '=', 3)
                                    ->count();
                            @endphp
                            ({{ $offersCountToulouse }})
                        </div>

                        <div>
                            <input type="checkbox" id="marseille" name="city[]" value="Marseille"
                                {{ in_array('Marseille', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="marseille">Marseille</label>
                            @php
                                $offersCountMarseille = $internship_offers
                                    ->where('location_id', '=', 4)
                                    ->count();
                            @endphp
                            ({{ $offersCountMarseille }})
                        </div>

                        <div>
                            <input type="checkbox" id="nice" name="city[]" value="Nice"
                                {{ in_array('Nice', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="nice">Nice</label>
                            @php
                                $offersCountNice = $internship_offers->where('location_id', '=', 5)->count();
                            @endphp
                            ({{ $offersCountNice }})
                        </div>

                        <div>
                            <input type="checkbox" id="nantes" name="city[]" value="Nantes"
                                {{ in_array('Nantes', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="nantes">Nantes</label>
                            @php
                                $offersCountNantes = $internship_offers->where('location_id', '=', 6)->count();
                            @endphp
                            ({{ $offersCountNantes }})
                        </div>

                        <div>
                            <input type="checkbox" id="strasbourg" name="city[]" value="Strasbourg"
                                {{ in_array('Strasbourg', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="strasbourg">Strasbourg</label>
                            @php
                                $offersCountStrasbourg = $internship_offers
                                    ->where('location_id', '=', 7)
                                    ->count();
                            @endphp
                            ({{ $offersCountStrasbourg }})
                        </div>

                        <div>
                            <input type="checkbox" id="montpellier" name="city[]" value="Montpellier"
                                {{ in_array('Montpellier', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="montpellier">Montpellier</label>
                            @php
                                $offersCountMontpellier = $internship_offers
                                    ->where('location_id', '=', 8)
                                    ->count();
                            @endphp
                            ({{ $offersCountMontpellier }})
                        </div>

                        <div>
                            <input type="checkbox" id="bordeaux" name="city[]" value="Bordeaux"
                                {{ in_array('Bordeaux', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="bordeaux">Bordeaux</label>
                            @php
                                $offersCountBordeaux = $internship_offers
                                    ->where('location_id', '=', 9)
                                    ->count();
                            @endphp
                            ({{ $offersCountBordeaux }})
                        </div>

                        <div>
                            <input type="checkbox" id="lille" name="city[]" value="Lille"
                                {{ in_array('Lille', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="lille">Lille</label>
                            @php
                                $offersCountLille = $internship_offers->where('location_id', '=', 10)->count();
                            @endphp
                            ({{ $offersCountLille }})
                        </div>

                        <div>
                            <input type="checkbox" id="rennes" name="city[]" value="Rennes"
                                {{ in_array('Rennes', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="rennes">Rennes</label>
                            @php
                                $offersCountRennes = $internship_offers->where('location_id', '=', 11)->count();
                            @endphp
                            ({{ $offersCountRennes }})
                        </div>

                        <div>
                            <input type="checkbox" id="reims" name="city[]" value="Reims"
                                {{ in_array('Reims', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="reims">Reims</label>
                            @php
                                $offersCountReims = $internship_offers->where('location_id', '=', 12)->count();
                            @endphp
                            ({{ $offersCountReims }})
                        </div>

                        <div>
                            <input type="checkbox" id="le_havre" name="city[]" value="Le Havre"
                                {{ in_array('Le Havre', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="le_havre">Le Havre</label>
                            @php
                                $offersCountLeHavre = $internship_offers
                                    ->where('location_id', '=', 13)
                                    ->count();
                            @endphp
                            ({{ $offersCountLeHavre }})
                        </div>

                        <div>
                            <input type="checkbox" id="saint_etienne" name="city[]" value="Saint-Étienne"
                                {{ in_array('Saint-Étienne', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="saint_etienne">Saint-Étienne</label>
                            @php
                                $offersCountSaintEtienne = $internship_offers
                                    ->where('location_id', '=', 14)
                                    ->count();
                            @endphp
                            ({{ $offersCountSaintEtienne }})
                        </div>

                        <div>
                            <input type="checkbox" id="toulon" name="city[]" value="Toulon"
                                {{ in_array('Toulon', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="toulon">Toulon</label>
                            @php
                                $offersCountToulon = $internship_offers->where('location_id', '=', 15)->count();
                            @endphp
                            ({{ $offersCountToulon }})
                        </div>

                        <div>
                            <input type="checkbox" id="grenoble" name="city[]" value="Grenoble"
                                {{ in_array('Grenoble', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="grenoble">Grenoble</label>
                            @php
                                $offersCountGrenoble = $internship_offers
                                    ->where('location_id', '=', 16)
                                    ->count();
                            @endphp
                            ({{ $offersCountGrenoble }})
                        </div>

                        <div>
                            <input type="checkbox" id="dijon" name="city[]" value="Dijon"
                                {{ in_array('Dijon', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="dijon">Dijon</label>
                            @php
                                $offersCountDijon = $internship_offers->where('location_id', '=', 17)->count();
                            @endphp
                            ({{ $offersCountDijon }})
                        </div>

                        <div>
                            <input type="checkbox" id="angers" name="city[]" value="Angers"
                                {{ in_array('Angers', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="angers">Angers</label>
                            @php
                                $offersCountAngers = $internship_offers->where('location_id', '=', 18)->count();
                            @endphp
                            ({{ $offersCountAngers }})
                        </div>

                        <div>
                            <input type="checkbox" id="nimes" name="city[]" value="Nîmes"
                                {{ in_array('Nîmes', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="nimes">Nîmes</label>
                            @php
                                $offersCountNimes = $internship_offers->where('location_id', '=', 19)->count();
                            @endphp
                            ({{ $offersCountNimes }})
                        </div>

                        <div>
                            <input type="checkbox" id="villeurbanne" name="city[]" value="Villeurbanne"
                                {{ in_array('Villeurbanne', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="villeurbanne">Villeurbanne</label>
                            @php
                                $offersCountVilleurbanne = $internship_offers
                                    ->where('location_id', '=', 20)
                                    ->count();
                            @endphp
                            ({{ $offersCountVilleurbanne }})
                        </div>

                        <div>
                            <input type="checkbox" id="besancon" name="city[]" value="Besançon"
                                {{ in_array('Besançon', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="besancon">Besançon</label>
                            @php
                                $offersCountBesançon = $internship_offers
                                    ->where('location_id', '=', 22)
                                    ->count();
                            @endphp
                            ({{ $offersCountBesançon }})
                        </div>

                        <div>
                            <input type="checkbox" id="limoges" name="city[]" value="Limoges"
                                {{ in_array('Limoges', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="limoges">Limoges</label>
                            @php
                                $offersCountLimoges = $internship_offers
                                    ->where('location_id', '=', 23)
                                    ->count();
                            @endphp
                            ({{ $offersCountLimoges }})
                        </div>

                        <div>
                            <input type="checkbox" id="metz" name="city[]" value="Metz"
                                {{ in_array('Metz', request()->input('city', [])) ? 'checked' : '' }}>
                            <label for="metz">Metz</label>
                            @php
                                $offersCountMetz = $internship_offers->where('location_id', '=', 24)->count();
                            @endphp
                            ({{ $offersCountMetz }})
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="mb-0 rounded-none border-l-2 border-r-2 border-b-2">
                <div class="title flex justify-between items-center p-2.5 cursor-pointer">
                    <span class="font-bold text-lg">Niveau d'étude</span>
                    <span class="ml-2.5 font-bold text-2xl" onclick="toggleContent('niveau')">+</span>
                </div>
                <div class="p-2.5 hidden" id="niveauContent">
                    <fieldset id="niveau">
                        <div>
                            <input type="checkbox" id="niveau" name="type_promotions_id[]" value="CPIA1"
                                {{ in_array('CPIA1', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                            <label for="CPIA1">CPIA1</label>
                            @php
                                $offersCountCPIA1 = $internship_offers
                                    ->where('type_promotions_id', '=', 1)
                                    ->count();
                            @endphp
                            ({{ $offersCountCPIA1 }})
                        </div>

                        <div>
                            <input type="checkbox" id="niveau" name="type_promotions_id[]" value="CPIA2"
                                {{ in_array('CPIA2', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                            <label for="CPIA2">CPIA2</label>
                            @php
                                $offersCountCPIA2 = $internship_offers
                                    ->where('type_promotions_id', '=', 2)
                                    ->count();
                            @endphp
                            ({{ $offersCountCPIA2 }})
                        </div>

                        <div>
                            <input type="checkbox" id="niveau" name="type_promotions_id[]" value="CPIA3"
                                {{ in_array('CPIA3', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                            <label for="CPIA3">CPIA3</label>
                            @php
                                $offersCountCPIA3 = $internship_offers
                                    ->where('type_promotions_id', '=', 3)
                                    ->count();
                            @endphp
                            ({{ $offersCountCPIA3 }})
                        </div>

                        <div>
                            <input type="checkbox" id="niveau" name="type_promotions_id[]" value="CPIA4"
                                {{ in_array('CPIA4', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                            <label for="CPIA4">CPIA4</label>
                            @php
                                $offersCountCPIA4 = $internship_offers
                                    ->where('type_promotions_id', '=', 4)
                                    ->count();
                            @endphp
                            ({{ $offersCountCPIA4 }})
                        </div>

                        <div>
                            <input type="checkbox" id="niveau" name="type_promotions_id[]" value="CPIA5"
                                {{ in_array('CPIA5', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                            <label for="CPIA5">CPIA5</label>
                            @php
                                $offersCountCPIA5 = $internship_offers
                                    ->where('type_promotions_id', '=', 5)
                                    ->count();
                            @endphp
                            ({{ $offersCountCPIA5 }})
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="mt-4">
                <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Filtrer</button>
            </div>
        </div>
      </form>
    </div>
    <div class="w-full md:w-3/4 lg:w-4/5 xl:w-5/6 px-4 mb-4">
      <div class="flex flex-col items-center">
        @foreach ($internship_offers as $internship_offer)
          <div class="container mx-auto flex justify-center mb-6">
              <div class="bg-white rounded-lg shadow-md relative" style="width: 100%; max-width: 770px;">

                  <div class="p-4">
                      <a href="{{ route('company.show', $internship_offer->companies_id) }}" class="text-sm font-bold">{{ \App\Models\Companies::find($internship_offer->companies_id)->name }}</a>
                      <p><a href="{{ route('internship_offers.show', $internship_offer->id) }}" class="text-lg font-semibold">{{ $internship_offer->title }}</a></p>
                      <div class="flex items-center mt-2">
                        <div class="flex mr-6 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                fill="currentColor" class="bi bi-journal-text mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                            </svg>
                            <p class="text-xs">
                                {{ \App\Models\Type_promotions::find($internship_offer->type_promotions_id)->type_promotion }}
                            </p>
                        </div>
                        <div class="flex mr-6 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                fill="currentColor" class="bi bi-geo-alt mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            <p class="text-xs">{{ $internship_offer->location->city }}</p>
                        </div>
                        <p class="text-xs mr-6">{{ $internship_offer->date }}</p>
                        <p class="text-xs">{{ $internship_offer->salary }}</p>
                        <p class="text-xs">€</p>
                      </div>

                      <div class="absolute center bottom-16 right-4">
                      <div class="checkbox-wrapper-12">
                      @if ($isWishlist[$internship_offer->id])
                        <form id="wishlistForm{{ $internship_offer->id }}" action="{{ route('internship_offers.wishlist.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                    @else 
                        <form id="wishlistForm{{ $internship_offer->id }}" action="{{ route('internship_offers.wishlist.store') }}" method="POST">
                            @csrf
                    @endif
                                <input type="hidden" name="internship_offers_id" value="{{ $internship_offer->id }}">
                                <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                    @if (Auth::user()->roles_id == 1 || Auth::user()->roles_id == 3)
                                <div class="cbx">
                                    <input id="cbx-{{ $internship_offer->id }}" type="checkbox" onchange="submitForm({{ $internship_offer->id }})" {{ $isWishlist[$internship_offer->id] ? 'checked' : '' }}>
                                    <label for="cbx-{{ $internship_offer->id }}"></label>
                                    <svg width="15" height="14" viewbox="0 0 15 14" fill="none">
                                        <path d="M2 8.36364L6.23077 12L13 2"></path>
                                    </svg>
                                </div>
                            </form>
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                <defs>
                                    <filter id="goo-{{ $internship_offer->id }}">
                                        <fegaussianblur in="SourceGraphic" stddeviation="4" result="blur"></fegaussianblur>
                                        <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" result="goo-{{ $internship_offer->id }}"></fecolormatrix>
                                        <feblend in="SourceGraphic" in2="goo-{{ $internship_offer->id }}"></feblend>
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                        @endif
                    </div>
                    

                
                    </div>
                      <div class="absolute bottom-4 right-4">
                          <form action="{{ route('internship_offers.show', $internship_offer->id) }}">
                              <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Voir l'offre</button>
                          </form>
                      </div>
                  </div>
              </div>
          @endforeach
          {{ $internship_offers->links() }}

      </div>
    </div>
  </div>

  <script src="{{ asset('/js.js') }}"></script>


</body>

@endsection

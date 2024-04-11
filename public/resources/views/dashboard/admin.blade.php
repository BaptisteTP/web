@extends('layouts.base')
@section('title', 'Dashboard')
@section('content')

<body class="bg-white">
    <form id="internshipF" action="{{ route('internship_offers.index') }}" method="GET">
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
                <li class="inline mr-12"><a href="#utilisateur">Utilisateurs</a></li>
                <li class="inline mr-12"><a href="#entreprise">Entreprises</a></li>
                <li class="inline mr-12"><a href="#offre">Offres de stage</a></li>

            </ul>
        </nav>
    </div>


    <div class="flex ml-72 mt-20">

      <div class="flex flex-col">
          <div class="mb-6">
              <p class="text-lg font-bold">Nouveaux Utilisateurs</p>
              <hr class="border-black w-full mt-1">
          </div>

          @php
            $hasNewUsers = false;
        @endphp

          @foreach ($users as $user)
              @if ($user->visibility == 1)
                @php $hasNewUsers = true; @endphp
                  <div class="container mx-auto mb-6">
                      <div class="flex justify-between items-center">
                          <div class="bg-white rounded-lg overflow-hidden border shadow-md relative" style="width: 500px; height: 100px;">
                              <div class="p-4 flex items-center justify-start">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person mr-4" viewBox="0 0 16 16">
                                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                  </svg>
                                  <div>
                                      <p class="text-lg font-semibold">{{$user->first_name}} {{$user->last_name}}</p>
                                      <p class="text-sm font-bold">
                                          @if ($user->roles_id == 1)
                                              Étudiant
                                          @elseif ($user->roles_id == 2)
                                              Pilote
                                          @elseif ($user->roles_id == 3)
                                              Admin
                                          @endif
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <form action="{{ route('utilisateur.updateVisibility', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="ml-16">
                        <input type="hidden" name="visibility" value="2">
                            <button type="submit" class="btn-accepter bg-green-500 hover:bg-gray-700 hover:text-green-500 border hover:border-green-500 text-white font-bold py-2 px-4 rounded-full">
                                Accepter
                            </button>
                        </div>
                    </form>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                            @method('DELETE')
                          <div class="ml-12">
                              <button class="btn-refuser bg-red-500 hover:bg-white hover:text-red-500 border hover:border-red-500 text-white font-bold py-2 px-4 rounded-full">Refuser</button>
                          </div>
                    </form>
                      </div>
                  </div>
              @endif
          @endforeach

          @if (!$hasNewUsers)
            <p class="p-4 m-4 font-bold">Pas de nouveaux utilisateurs</p>
        @endif

          <div class="mb-6">
              <p id="utilisateur" class="text-lg font-bold">Utilisateurs</p>
              <hr class="border-black w-full mt-1">
          </div>
          <form action="{{ route('users.create')}}">
                    <div class="flex justify-end mt-2">
                        <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Nouvel utilisateur</button>
                    </div>
        </form>
          @foreach ($users as $user)
              @if ($user->visibility == 2)
                  <div class="container mx-auto mb-6">
                      <div class="flex justify-between items-center">
                          <div class="bg-white rounded-lg overflow-hidden border shadow-md relative" style="width: 500px; height: 100px;">
                              <div class="p-4 flex items-center justify-start">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person mr-4" viewBox="0 0 16 16">
                                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                  </svg>
                                  <div>
                                      <p class="text-lg font-semibold">{{$user->first_name}} {{$user->last_name}}</p>
                                      <p class="text-sm font-bold">
                                          @if ($user->roles_id == 1)
                                              Étudiant
                                          @elseif ($user->roles_id == 2)
                                              Pilote
                                          @elseif ($user->roles_id == 3)
                                              Admin
                                          @endif
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <form action="{{ route('users.edit', $user->id) }}" method="GET">
                            <div class="ml-16">
                                <button class="bg-blue-600 hover:bg-blue-900 hover:text-blue-800 border hover:border-blue-800 text-white font-bold py-2 px-4 rounded-full">Modifier</button>
                            </div>
                        </form>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          <div class="ml-12">
                              <button type="submit" class="btn-supprimer bg-red-500 hover:bg-red-900 hover:text-red-500 border hover:border-red-500 text-white font-bold py-2 px-4 rounded-full">Supprimer</button>
                          </div>
                        </form>
                      </div>
                  </div>
              @endif
          @endforeach
      </div>
  </div>





    <div class="flex ml-72 mt-10">
        <div class="flex flex-col">

            <div class="mb-6">
                <p id="entreprise" class="text-lg font-bold">Entreprise</p>
                <hr class="border-black w-full mt-1">
                <form action="{{ route('company.create')}}">
                    <div class="flex justify-end mt-2">
                        <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Nouvelle enteprise</button>
                    </div>
                </form>
            </div>

            @foreach ($companies as $company)
            <div class="flex justify-between items-center">
                <div class="bg-white rounded-lg shadow-md relative" style="width: 770px; height: 104px;">

                    <div class="p-4">
                        <a href="{{ route('company.show', $company->id) }}"
                            class="text-sm font-bold">{{ $company->name }}</a>
                        <div class="flex items-center mt-2">
                            <p class="text-xs">
                                {{ strlen($company->body) > 100 ? substr($company->body, 0, 100) . '...' : $company->body }}
                            </p>

                        </div>
                        <div class="absolute center bottom-4 right-4">
                            <form action="{{ route('company.show', $company->id) }}">
                                <button
                                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Voir
                                    l'entreprise</button>
                            </form>
                        </div>
                    </div>
                </div>
                <form action="{{ route('company.edit',$company->id) }}" method="GET">
                    <div class="ml-16">
                        <button class="bg-blue-600 hover:bg-blue-900 hover:text-blue-800 border hover:border-blue-800 text-white font-bold py-2 px-4 rounded-full">Modifier</button>
                    </div>
                </form>
                    <div class="ml-12">
                        <form action="{{ route('company.destroy',$company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit" class="btn-supprimer bg-red-500 hover:bg-red-900 hover:text-red-500 border hover:border-red-500 text-white font-bold py-2 px-4 rounded-full">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
      </div>

    <div class="flex ml-72 mt-10">
        <div class="flex flex-col">
            <div class="mb-6">
                <p id="offre" class="text-lg font-bold">Offre de stage</p>
                <hr class="border-black w-full mt-1">
                <form action="{{ route('internship_offers.create')}}">
                    <div class="flex justify-end mt-2">
                        <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Nouvelle offre stage</button>
                    </div>
                </form>
            </div>

            @foreach ($internship_offers as $internship_offer)
            <div class="container mx-auto mb-6">
                <div class="flex justify-between items-center">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md relative" style="width: 770px; height: 104px;">
                        <div class="p-4">
                            <a href="{{ route('company.show', $internship_offer->companies_id) }}"
                                class="text-sm font-bold">{{ \App\Models\Companies::find($internship_offer->companies_id)->name }}</a>
                            <p><a href="{{ route('internship_offers.show', $internship_offer->id) }}"
                                    class="text-lg font-semibold">{{ $internship_offer->title }}</a></p>
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
                                    <p class="text-xs">{{ \App\Models\Type_promotions::find($internship_offer->type_promotions_id)->type_promotion }}</p>
                                </div>
                                <div class="flex mr-6 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-geo-alt mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                        <path
                                            d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                    <p class="text-xs">{{ $internship_offer->location->city }}</p>
                                </div>
                                <p class="text-xs mr-6">{{ $internship_offer->date }}</p>
                                <p class="text-xs">{{ $internship_offer->salary }}</p><p class="text-xs">€</p>
                            </div>
                            <div class="absolute center bottom-16 right-4">
                                <div class="checkbox-wrapper-12">
                                    <div class="cbx">
                                        <input id="cbx-12" type="checkbox" />
                                        <label for="cbx-12"></label>
                                        <svg width="15" height="14" viewbox="0 0 15 14" fill="none">
                                            <path d="M2 8.36364L6.23077 12L13 2"></path>
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                        <defs>
                                            <filter id="goo-12">
                                                <fegaussianblur in="SourceGraphic" stddeviation="4" result="blur"></fegaussianblur>
                                                <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7"
                                                    result="goo-12"></fecolormatrix>
                                                <feblend in="SourceGraphic" in2="goo-12"></feblend>
                                            </filter>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute center bottom-4 right-4">
                                <form action="{{ route('internship_offers.show', $internship_offer->id) }}">
                                    <button
                                        class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Voir
                                        l'offre</button>
                                </form>
                            </div>
                        </div>
                    </div>
                        <form action="{{ route('internship_offers.edit',$internship_offer->id) }}" method="GET">
                            <div class="ml-16">
                                <button class="bg-blue-600 hover:bg-blue-900 hover:text-blue-800 border hover:border-blue-800 text-white font-bold py-2 px-4 rounded-full">Modifier</button>
                            </div>
                        </form>
                        <div class="ml-12">
                        <form action="{{ route('internship_offers.destroy',$internship_offer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                            class="btn-supprimer bg-red-500 hover:bg-red-900 hover:text-red-500 border hover:border-red-500 text-white font-bold py-2 px-4 rounded-full">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    
    <div class="flex items-center justify-center mb-8 mt-10">
        <a href={{route('unlogin')}}><button
        class="bg-red-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
        type="submit">
        Se déconnecter
        </button></a>
    </div>
</body>

</html>
@endsection

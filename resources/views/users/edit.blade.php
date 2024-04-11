@extends('layouts.base')
@section('title', 'Modification Utilisateur')

@section('content')

    <body class="h-full">

        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-2xl mt-12">
                <div class="bg-white shadow-md rounded px-20 py-20 mb-4">
                    <div class="flex justify-between items-center">
                        <p class="text-left font-medium text-lg text-gray-900 dark:text-white">Modification utilisateur</p>
                        <form action="{{ route('dashboard') }}" method="GET">
                            <button
                                class="bg-black hover:bg-gray-700 text-white font-bold py-auto px-4 rounded-full focus:outline-none focus:shadow-outline"
                                type="submit">&#10229; Retour</button>
                        </form>
                    </div>

                    <hr class="border-black border-2 mb-4">
                    <form action="{{ route('users.updateUser', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                            <label for="prenom"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom :</label>
                            <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"/>
                        </div>
                        <div class="mt-4">
                            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom
                                :</label>
                            <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"/>
                        </div>

                        <div class="mt-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse mail :</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500"
                                value="{{$user->email}}">
                        </div>
                        <div class="mt-4">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                de naissance :</label>
                            <input type="date" id="birthdate" name="birthdate" value="{{$user->birthdate}}" min="1990-01-01"
                                max="2024-04-05"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500"
                                placeholder="01/01/2000">
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot
                                de passe:</label>
                            <input type="password" id="password" name="password" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500"
                                placeholder="Motdepasse">
                        </div>
                        <div class="mt-4">
                        <label for="center" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Centre :</label>
                        <select id="center" name="center" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                        @foreach ($cities as $city)
                            <option value="{{ $city->city }}" @if ($city->city == $user->center) selected @endif>{{ $city->city }}</option>
                        @endforeach
                        </select>
                    </div>


                    <div class="mt-4">
                        <label for="pays" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut :</label>
                        <select id="role" name="roles_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                                @if (Auth::user()->roles_id == 2)
                                    <option value="1" selected>Étudiant</option>
                                @endif

                                @if (Auth::user()->roles_id == 3)
                                    @if ($user->roles_id == 1)
                                        <option value="1" selected>Étudiant</option>
                                        <option value="2">Pilote</option>
                                        <option value="3">Admin</option>
                                    @elseif ($user->roles_id == 2)
                                        <option value="1">Étudiant</option>
                                        <option value="2" selected>Pilote</option>
                                        <option value="3">Admin</option>
                                    @elseif ($user->roles_id == 3)
                                        <option value="1">Étudiant</option>
                                        <option value="2">Pilote</option>
                                        <option value="3" selected>Admin</option>
                                    @endif
                                @endif

                        </select>
                    </div>



                    <div class="mt-4">
                        <label for="pays" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Promotion :</label>
                        <select id="promotion" name="promotion"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                            <option value="TL22PX301" @if ($user->promotion === 'TL22PX301') selected @endif>TL22PX301</option>
                            <option value="TL22PX302" @if ($user->promotion === 'TL22PX302') selected @endif>TL22PX302</option>
                            <option value="TL22PX303" @if ($user->promotion === 'TL22PX303') selected @endif>TL22PX303</option>
                            <option value="TL22PX304" @if ($user->promotion === 'TL22PX304') selected @endif>TL22PX304</option>
                            <option value="TL22PX305" @if ($user->promotion === 'TL22PX305') selected @endif>TL22PX305</option>
                            <option value="TL22PX306" @if ($user->promotion === 'TL22PX306') selected @endif>TL22PX306</option>
                            <option value="TL22PX307" @if ($user->promotion === 'TL22PX307') selected @endif>TL22PX307</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="pays" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visibilité :</label>
                        <select id="role" name="visibility"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                                @if ($user->visibility == 1)
                                    <option value="1" selected>Invisible</option>
                                    <option value="2">Visible</option>
                                @elseif ($user->visibility == 2)
                                    <option value="1">Invisible</option>
                                    <option value="2" selected>Visible</option>
                                @endif

                        </select>
                    </div>



                            <div class="flex flex-col mt-4">
                                <button
                                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Modifier l'utilisateur
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>

    </body>
@endsection

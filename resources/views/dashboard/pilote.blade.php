@extends('layouts.base')
@section('title', 'Dashboard')
@section('content')

    <body class="h-full">
        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-4xl mt-12">
                <div class="bg-white shadow-md rounded px-20 py-20 mb-4">
                    <div class="flex mt-4 flex-col">
                        <div class="flex justify-between items-center">
                            <p class="text-left font-medium text-lg text-gray-900 dark:text-white">Bonjour
                                {{ Auth::user()->first_name . '  ' . Auth::user()->last_name }} !</p>
                            <a href={{ route('retour') }}><button
                                    class="bg-black hover:bg-gray-700 text-white font-bold py-auto px-4 rounded-full focus:outline-none focus:shadow-outline"
                                    type="button">&#10229; Retour</button></a>
                        </div>
                        <hr class="border-black border-2 mb-2">
                        <div class="mt-12 flex flex-col">
                            <div class="flex items-center mb-4">
                                <svg width="20" height="20" class="mr-4">
                                    <image href="/image1/mail.png" width="20" height="20" />
                                </svg>
                                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="flex items-center mb-4">
                                <svg width="20" height="20" class="mr-4">
                                    <image href="/image1/birthday.png" width="20" height="20" />
                                </svg>
                                <p class="font-medium text-gray-900 dark:text-white">né(e) le {{ Auth::user()->birthdate }}
                                </p>
                            </div>
                            <div class="flex items-center mb-4">
                                <svg width="20" height="20" class="mr-4">
                                    <image href="/image1/localisation.png" width="20" height="20" />
                                </svg>
                                <p class="font-medium text-gray-900 dark:text-white">Centre de {{ Auth::user()->center }}
                                </p>
                            </div>
                            <div class="flex flex-wrap justify-center items-center mb-4">
                                <form action="{{ route('users.create') }}" class="mb-2 sm:mb-0 sm:mr-2">
                                    <button
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Nouvel
                                        étudiant</button>
                                </form>
                                <a href="{{ route('company.create') }}" class="mb-2 sm:mb-0 sm:mr-2">
                                    <button
                                        class="border border-black bg-white text-black hover:text-green-500 font-bold py-2 px-4 rounded-full">+
                                        Créer une offre</button>
                                </a>
                                <a href={{ route('unlogin') }}>
                                    <button
                                        class="bg-red-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                        type="submit">
                                        Se déconnecter
                                    </button>
                                </a>
                            </div>
                            <div class="mb-6">
                                <p id="utilisateur" class="text-lg font-bold">Étudiant de ma promotion</p>
                                <hr class="border-black w-full mt-1">
                            </div>
                            @foreach ($users as $user)
                                @if (Auth::user()->promotion == $user->promotion)
                                    @if ($user->roles_id == 1)
                                        <div class="container mx-auto mb-6">
                                            <div class="flex justify-between items-center">
                                                <div class="bg-white rounded-lg overflow-hidden border shadow-md relative"
                                                    style="width: 500px; height: 100px;">
                                                    <div class="p-4 flex items-center justify-start">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                                                            height="60" fill="currentColor" class="bi bi-person mr-4"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                                        </svg>
                                                        <div>
                                                            <p class="text-lg font-semibold">{{ $user->first_name }}
                                                                {{ $user->last_name }}</p>
                                                            <p class="text-sm font-bold">
                                                                @if ($user->roles_id == 1)
                                                                    Étudiant
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('users.edit', $user->id) }}" method="GET">
                                                    <div class="ml-16">
                                                        <button
                                                            class="bg-blue-600 hover:bg-blue-900 hover:text-blue-800 border hover:border-blue-800 text-white font-bold py-2 px-4 rounded-full">Modifier</button>
                                                    </div>
                                                </form>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="ml-12">
                                                        <button type="submit"
                                                            class="btn-supprimer bg-red-500 hover:bg-red-900 hover:text-red-500 border hover:border-red-500 text-white font-bold py-2 px-4 rounded-full">Supprimer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                            

                        </div>

                        <script src="{{ asset('/js.js') }}"></script>

                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

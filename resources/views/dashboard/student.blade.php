@extends('layouts.base')
@section('title', 'Dashboard')
@section('content')

    <body class="h-full">
        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-2xl mt-12">
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
                            <div class="flex items-center justify-center mb-4">
                                <a href={{route('unlogin')}}><button
                                    class="bg-red-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Se déconnecter
                                </button></a>
                            </div>
                            <div class="flex items-center mt-8 mb-8">
                                <a href={{ route('downloadCV') }}
                                    class="font-medium text-blue-500 hover:text-blue-400">Telecharger votre CV en cliquant
                                    ici</a>
                                <ul>
                                    <li>
                                        <input type="checkbox" id="flowbite-option" value="" class="hidden peer">
                                        <label for="flowbite-option"
                                            class="inline-flex items-center justify-between w-auto p-1 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 checked:border-blue-500 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 ml-4">
                                            <div class="block">
                                                <div class="w-full text-sm">Changer de CV</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <form class="mt-2 flex items-center justify-center" method="POST" id="cvForm" name="cvForm"
                                action="{{ route('dashboard.upload_cv') }}" enctype="multipart/form-data">
                                @csrf
                                <label class="block">
                                    <span class="sr-only">Envoyez le CV</span>
                                    <input type="file" id="file" name="file"
                                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 w-full"
                                        accept=".PDF" />
                                </label>
                                <button type="submit" id="submitButton"
                                    class="bg-black hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-1 ml-4 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                    <span class="sr-only">Icon description</span>
                                </button>
                            </form>

                            

<script src="{{ asset('/js.js') }}"></script>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@extends('layouts.base')
@section('title', 'StageQuest')

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

                    </div>
                </div>
            </div>
        </form>



        <div class="flex flex-col items-center m-12 h-2 w-2 " style="height: 100%; width:100%;">
            @foreach ($companies as $company)
                <div class="container mx-auto flex justify-center mb-6">
                    <div class="bg-white rounded-lg  shadow-md relative" style="width: 1000px; height: 104px;">

                        <div class="p-4">
                            <a href="{{ route('company.show', $company->id) }}"
                                class="text-sm font-bold">{{ $company->name }}</a>
                            <div class="flex flex-col mt-2">
                                <p class="text-xs">
                                    {{ strlen($company->body) > 100 ? substr($company->body, 0, 100) . '...' : $company->body }}
                                </p>
                                <p class="flex items-center text-sm font-bold">
                                    Note de l'entreprise :
                                    {{ round($company->averageRating) }}/5
                                    <img src="\image1\etoile_note.png" class="w-6 h-6 ml-2">
                                    <span class="ml-1">pour {{ $company->numberOfRatings }} avis</span>
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
                </div>
            @endforeach

        </div>
        </div>


    </body>

@endsection

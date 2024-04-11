@extends('layouts.base')
@section('title', 'Visualisation offre')

@section('content')

    <body class="bg-gray-100">
        <div class="p-4">
            <div class="flex md:flex-row items-start md:ml-20 font-sans">
                <div class="mb-4">
                    <h1 class="text-3xl font-bold">{{ $internship_offer->title }}</h1>
                    <div class="flex mt-2">
                        <p>{{ \App\Models\Companies::find($internship_offer->companies_id)->name }}</p>
                        <p class="ml-2">|</p>
                        <p class="ml-2">{{ $internship_offer->location->city }}</p>
                        <p class="ml-2">|</p>
                        <p class="ml-2">Stage</p>
                    </div>
                    <a href="#postuler" type="button"
                        class="mt-2 md:mt-0 md:ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Postuler à cette offre
                    </a>
                </div>
            </div>
            <div class="md:ml-20 mt-5">
                <h2 class="text-3xl">Description du stage</h2>
            </div>
            <div class="md:ml-20 mt-2 md:mr-20">
                <p>{{ $internship_offer->text }}</p>
            </div>
            <div class="md:ml-20 mt-5">
                <h2 class="text-3xl">Profil recherché</h2>
            </div>
            <div class="md:ml-20 mt-2 md:mr-20">
                <p>Pour cette offre, nous sommes à la recherche d'un étudiant de
                    {{ \App\Models\Type_promotions::find($internship_offer->type_promotions_id)->type_promotion }}
                    qui fait la spécialité
                    {{ \App\Models\Type_promotions::find($internship_offer->type_promotions_id)->speciality }}.
                </p>
            </div>
            <div class="md:ml-20 mt-5">
                <h2 class="text-3xl">Description de l'entreprise</h2>
            </div>
            <div class="md:ml-20 mt-2 md:mr-20">
                <p>{{ \App\Models\Companies::find($internship_offer->companies_id)->body }}</p>
            </div>
        </div>
        <div class="md:ml-28 md:mr-28 bg-white shadow-md rounded px-20 py-20 mb-4">
            <h2  class="text-3xl font-sans font-bold">Postuler à cette offre</h2>
            <form enctype="multipart/form-data" action="{{route('postuler')}}" method="POST" class="mt-4"  >
                @csrf
                

                <input hidden id=user_id name='user_id' value="{{ Auth::user()->id }}">
                <input hidden id=offer_id name='offer_id' value="{{$internship_offer->id}}">


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> 
                    <div class="flex flex-col">
                        <label id='last_name' for="name">Nom</label>
                        <input value="{{ Auth::user()->last_name }}" type="text" name="name" id="name"
                            class="input-field" disabled>
                    </div>

                    <div class="flex flex-col">
                        <label id='first_name' for="first_name">Prénom</label>
                        <input value="{{ Auth::user()->first_name }}" type="text" name="first_name" id="first_name"
                            class="input-field" disabled>
                    </div>

                    <div class="flex flex-col">
                        <label  for="email">Adresse Mail</label>
                        <input id='email' value="{{ Auth::user()->email }}" type="text" name="email" id="email"
                            class="input-field" disabled>
                    </div>
                    <div class="flex flex-col">
                        <label  for="cv">CV</label>
                        <input type="file" accept="application/pdf" id='cv' name="cv" class="input-field">
                    </div>

                    <div class="flex flex-col">
                        <label for="lettre_motiv">Lettre de motivation</label>
                        <textarea value="" name="cover_letter" type="text" id="cover_letter" class="input-field " placeholder="max 1000 caracteres">
                        </textarea>
                    </textarea>
                    </div>
                </div>
                
                <button type="submit"
                    class="ml-20 mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-base px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{$bouton ?? 'Je postule'}}
                   
                </button>

            </form>
        </div>

        <style>
            .input-field {
                background-color: #edf2f7;
                border: 1px solid #cbd5e0;
                color: #2d3748;
                font-size: 0.875rem;
                padding: 0.625rem;
                border-radius: 0.375rem;
            }

            .btn {
                background-color: #1a202c;
                color: #ffffff;
                border: none;
                border-radius: 0.375rem;
                padding: 0.625rem 1.25rem;
                cursor: pointer;
            }

            .btn:hover {
                background-color: #2d3748;
            }

            .btn:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
            }

            .btn-primary {
                background-color: #4a90e2;
            }

            .btn-primary:hover {
                background-color: #357bd8;
            }

            @media (min-width: 768px) {

                .input-field,
                .btn {
                    width: calc(50% - 0.75rem);
                }
            }
        </style>
    </body>


@endsection

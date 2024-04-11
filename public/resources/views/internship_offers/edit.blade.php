@extends('layouts.base')
@section('title', 'Modification Offre')

@section('content')

    <body class="h-full">
        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-2xl mt-12">
                <div class="bg-white shadow-md rounded px-20 py-20 mb-4">
                    <div class="flex justify-between items-center">
                        <p class="text-left font-medium text-lg text-gray-900 dark:text-white">Modification offre</p>
                        <form action="{{ route('internship_offers.index') }}" method="GET">
                            <button
                                class="bg-black hover:bg-gray-700 text-white font-bold py-auto px-4 rounded-full focus:outline-none focus:shadow-outline"
                                type="submit">&#10229; Retour</button>
                        </form>
                    </div>

                    <hr class="border-black border-2 mb-4">

                    <form action="{{ route('internship_offers.update', $internship_offer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col">
                            <label for="nom_etp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom
                                de l'entreprise*</label>
                            <select id="selectField" name="companies_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                required>
                                <option value="">-- Sélectionnez votre entreprise --</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($company->id == $internship_offer->companies_id) selected @endif>
                                        {{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="flex flex-col mt-4">
                            <label for="nom_offre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Intitulé du
                                stage*</label>
                            <input value="{{ $internship_offer->title }}" type="text" name="title" id="nom_offre"
                                placeholder="Entrez le nom de l'offre de stage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" />
                        </div>

                        <div class="flex flex-col">
                            <label for="ville"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ville*</label>
                            <select id="ville" name="location_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                required>
                                <option value="">-- Sélectionnez votre ville --</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @if ($city->id == $internship_offer->location_id) selected @endif>
                                        {{ $city->city }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="flex flex-col mt-4">
                            <label for="num"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de personne à
                                recruter*</label>
                            <input value="{{ $internship_offer->num_place }}" type="number" name="num_place" id="num"
                                placeholder="Entrez le nombre de personne à recruter"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" />
                        </div>


                        <div class="flex flex-col mt-4">
                            <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Niveau
                                d'étude*</label>
                            <div class="flex items-center mt-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" id="option{{ $i }}" name="type_promotions_id"
                                        value="{{ $i }}"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                        @if ($i == $internship_offer->type_promotions_id) checked @endif>
                                    <label for="option{{ $i }}"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">A{{ $i }}</label>
                                @endfor
                            </div>
                        </div>



                        <div class="flex flex-col mt-4">
                            <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Durée du
                                stage*</label>
                            <div class="flex items-center mt-2">
                                <div class="flex items-center mt-2">
                                    <input type="radio" id="day" name="duration_unit" value="1"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                        @if ($internship_offer->duration_unit == 1) checked @endif>
                                    <label for="day"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Mois</label>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input type="radio" id="s" name="duration_unit" value="2"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                        @if ($internship_offer->duration_unit == 2) checked @endif>
                                    <label for="s"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Semaine(s)</label>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-4">
                            <input value= "{{ $internship_offer->duration_numerical }}" type="number"
                                name="duration_numerical" id="duree" placeholder="Entrez la durée du stage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                required />
                        </div>
                


                <div class="flex flex-col mt-4" id="dateContainer">
                    <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Y a t-il une date de
                        début prévue pour ce poste?*</label>
                    <div class="flex items-center mt-2">
                        <div class="flex items-center mt-2">
                            <input type="radio" id="yes" name="option" value="yes"
                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                            <label for="yes"
                                class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Oui</label>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="radio" id="no" name="option" value="no"
                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                            <label for="no"
                                class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Non</label>
                        </div>
                    </div>
                    <div class="flex flex-col mt-4">
                     
                        <input type="date" name="date" id="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                            value="{{ $internship_offer->date ?? '' }}">
                    </div>
                </div>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const radioNo = document.getElementById('no');
                        const radioYes = document.getElementById('yes');
                        const dateInput = document.getElementById('date');

                        if (dateInput.value !== '') {
                            radioYes.checked = true;
                            dateInput.style.display = 'block';
                        } else {
                            radioNo.checked = true;
                            dateInput.style.display = 'none';
                        }

                        radioNo.addEventListener('change', function() {
                            if (radioNo.checked) {
                                dateInput.style.display = 'none';
                                dateInput.value = '';
                            }
                        });

                        radioYes.addEventListener('change', function() {
                            if (radioYes.checked) {
                                dateInput.style.display = 'block';
                                dateInput.value = '';
                            }
                        });
                    });
                </script>


                <div class="flex flex-col mt-4">
                    <label for="sal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salaire
                        (par mois)</label>
                    <input value="{{ $internship_offer->salary }}" type="number" name="salary" id="sal"
                        placeholder="Entrez le salaire que vous comptez payer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" />
                </div>

                <div class="flex flex-col mt-4">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description
                        du stage*</label>
                    <textarea name="text" id="desc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500 h-48">{{ $internship_offer->text }}</textarea>
                </div>


                <div class="flex flex-col mt-4">
                    <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Visibilité*</label>
                    <div class="flex items-center mt-2">
                        <input type="radio" id="y" name="status_id" value="1"
                            class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                            @if ($internship_offer->status_id == 1) checked @endif>
                        <label for="y" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Oui</label>

                        <input type="radio" id="n" name="status_id" value="2"
                            class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                            @if ($internship_offer->status_id == 2) checked @endif>
                        <label for="n" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Non</label>
                    </div>
                </div>

            </div>
            <div class="mt-12 flex items-center justify-center mt-4">
                <button
                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                    type="submit">
                    Modifier
                </button>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
    </body>
@endsection

@extends('layouts.base')
@section('title', 'Creation Offre')

@section('content')

    <body class="h-full">
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-2xl mt-12">
                <div class="bg-white shadow-md rounded px-20 py-20 mb-4">

                    <div class="flex justify-between items-center">
                        <p class="text-left font-medium text-lg text-gray-900 dark:text-white">Création offre</p>
                        <form action="{{ route('internship_offers.index') }}" method="GET">
                            <button
                                class="bg-black hover:bg-gray-700 text-white font-bold py-auto px-4 rounded-full focus:outline-none focus:shadow-outline"
                                type="submit">&#10229; Retour</button>
                        </form>
                    </div>

                    <hr class="border-black border-2 mb-4">
                    <div class="flex mt-4 flex-col">


                        <form id="internship" action="{{ route('internship_offers.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col">

                                {{-- <div class="container w-full"> --}}
                                <label for="selectField"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Entreprise*
                                    :</label>
                                <select id="selectField" name="companies_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-300 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                                    <option value="">--Sélectionnez votre entreprise--</option>

                                    <?php
                                    $mysqli = new mysqli('localhost', 'root', 'Route784', 'stage_quest');
                                    
                                    $result = $mysqli->query('SELECT id, name FROM companies');
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . '</option>';
                                    }
                                    $mysqli->close();
                                    ?>
                                    <option value="autre">Autre</option>
                                </select>

                                {{-- </div> --}}

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const selectField = document.getElementById('selectField');
                                        const autreChamp = document.getElementById('autreChamp');

                                        selectField.addEventListener('change', function() {
                                            if (selectField.value === 'autre') {
                                                autreChamp.style.display = 'block';
                                            } else {
                                                autreChamp.style.display = 'none';
                                            }
                                        });
                                    });
                                </script>

                                <div class="flex flex-col mt-4">
                                    <div id="autreChamp" style="display: none;">
                                        <label for="autreInput"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de
                                            l'entreprise* : </label>
                                        <input name="name" type="text" id="autre1"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500">
                                        <div class="flex flex-col mt-4">
                                            <label for="autreInput"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visibilité*</label>
                                            <select id="selectField" name="visibility"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                                                <option value="1">Closed</option>
                                                <option value="2">Opened</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col mt-4">
                                            <label name="sectors_id" for="autreInput"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Secteurs
                                                de l'entreprise* : </label>
                                            <div class="flex items-center mt-2">
                                                <input type="radio" id="info" name="sectors_id" value="1"
                                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                                <label for="info"
                                                    class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Informatique</label>

                                                <input type="radio" id="s3e" name="sectors_id" value="2"
                                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                                <label for="s3e"
                                                    class="text-sm font-semibold text-gray-900 dark:text-white mr-4">S3E</label>

                                                <input type="radio" id="btp" name="sectors_id" value="3"
                                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                                <label for="btp"
                                                    class="text-sm font-semibold text-gray-900 dark:text-white mr-4">BTP</label>

                                                <input type="radio" id="gene" name="sectors_id" value="4"
                                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                                <label for="gene"
                                                    class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Généraliste</label>
                                            </div>

                                            <label for="autreInput"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description
                                                :</label>
                                            <textarea name="body" type="text" id="autre2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"></textarea>
                                        </div>


                                        <div class="flex flex-col mt-4">
                                            <button
                                                class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                                type="submit">
                                                Créer l'entreprise
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>

                        <form id="internshipForm" action="{{ route('internship_offers.store') }}" method="POST">
                            @csrf

                            <input type="hidden" id="hiddenId" name="companies_id">

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const selectField = document.getElementById('selectField');
                                    const autreChamp = document.getElementById('autreChamp');
                                    const hiddenId = document.getElementById('hiddenId');

                                    selectField.addEventListener('change', function() {
                                        if (selectField.value === 'autre') {
                                            autreChamp.style.display = 'block';
                                            hiddenId.value = '';
                                        } else {
                                            autreChamp.style.display = 'none';
                                            hiddenId.value = selectField.value;
                                        }
                                    });
                                });
                            </script>


                            <div class="flex flex-col mt-4">
                                <label for="nom_offre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Intitulé du
                                    stage*</label>
                                <input type="text" name="title" id="nom_offre"
                                    placeholder="Entrez le nom de l'offre de stage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" />
                            </div>
                            <div class="flex flex-col mt-4">
                                <label for="lieu"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ville*</label>
                                <select id="selectField" name="location_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                                    <option value="">--Sélectionnez la ville--</option>
                                    <?php
                                    $mysqli = new mysqli('localhost', 'root', 'Route784', 'stage_quest');
                                    
                                    $result = $mysqli->query('SELECT id, city FROM locations');
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['city'] . '</option>';
                                    }
                                    $mysqli->close();
                                    ?>
                                </select>
                            </div>
                            <div class="flex flex-col mt-4">
                                <label for="num"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de personne
                                    à recruter*</label>
                                <input type="number" name="num_place" id="num"
                                    placeholder="Entrez le nombre de personne à recruter"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" />
                            </div>
                            <div class="flex flex-col mt-4">
                                <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Niveau
                                    d'étude*</label>
                                <div class="flex items-center mt-2">
                                    <input type="radio" id="option1" name="type_promotions_id" value="1"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                    <label for="option1"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">A1</label>

                                    <input type="radio" id="option2" name="type_promotions_id" value="2"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                    <label for="option2"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">A2</label>

                                    <input type="radio" id="option3" name="type_promotions_id" value="3"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                    <label for="option3"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">A3</label>

                                    <input type="radio" id="option4" name="type_promotions_id" value="4"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                    <label for="option4"
                                        class="text-sm font-semibold text-gray-900 dark:text-white mr-4">A4</label>

                                    <input type="radio" id="option5" name="type_promotions_id" value="5"
                                        class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                    <label for="option5"
                                        class="text-sm font-semibold text-gray-900 dark:text-white">A5</label>
                                </div>
                            </div>

                    </div>
                    <div class="flex flex-col mt-4">
                        <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Durée du
                            stage*</label>
                        <div class="flex items-center mt-2">
                            <div class="flex items-center mt-2">
                                <input type="radio" id="day" name="duration_unit" value="1"
                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                <label for="day"
                                    class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Mois</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="radio" id="s" name="duration_unit" value="2"
                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                                <label for="s"
                                    class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Semaine(s)</label>
                            </div>
                        </div>
                        <div class="flex flex-col mt-4">
                            <input type="number" name="duration_numerical" id="duree"
                                placeholder="Entrez la durée du stage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                required />
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const radioNo = document.getElementById('no');
                            const startDateInput = document.getElementById('start');

                            radioNo.addEventListener('change', function() {
                                if (radioNo.checked) {
                                    startDateInput.style.display = 'none';
                                }
                            });

                            const radioYes = document.getElementById('yes');

                            radioYes.addEventListener('change', function() {
                                if (radioYes.checked) {
                                    startDateInput.style.display = 'block';
                                }
                            });
                        });
                    </script>
                    <div class="flex flex-col mt-4">
                        <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Y a t-il une
                            date
                            de début prévue pour ce poste?*</label>
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
                            <input type="date" name="date" id="start"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                style="display: none;" />
                        </div>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="sal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salaire
                            (par mois)</label>
                        <input type="number" name="salary" id="sal"
                            placeholder="Entrez le salaire que vous comptez payer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" />
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="desc"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description du
                            stage*</label>
                        <textarea name="text" id="desc" placeholder="Décrivez le poste"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500 h-48"></textarea>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label
                            class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Visibilité*</label>
                        <div class="flex items-center mt-2">
                            <input type="radio" id="y" name="status_id" value="1"
                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                            <label for="y"
                                class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Oui</label>

                            <input type="radio" id="n" name="status_id" value="2"
                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500">
                            <label for="n"
                                class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Non</label>
                        </div>
                    </div>

                    <div class="mt-12 flex items-center justify-center mt-4">
                        <button
                            class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                            type="submit">
                            Créer
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>
@endsection

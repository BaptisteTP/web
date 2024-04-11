@extends('layouts.base')
@section('title', 'Demande de Compte')

@section('content')

    <body class="h-full">
        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-2xl mt-12"> <!-- Ajustement de la marge top -->
                <div class="bg-white shadow-md rounded px-20 py-20 mb-4"> <!-- Ajustement du padding top et bottom -->
                    <div class="text-center mb-6 mt-0">
                        <img class="h-40 mx-auto -mt-10" src="/image1/logo1.png" alt="Logo">
                        <nav>
                            <ul
                                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 justify-center">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-3 text-black font-bold underline bg-gray-100 rounded md:bg-transparent md:text-black-700 md:p-0 md:dark:text-black-500"
                                        aria-current="page">Demande</a>
                                </li>
                                <li>
                                    <a href="/auth/login"
                                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-500 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Se
                                        connecter</a>
                                </li>
                            </ul>
                        </nav>
                    </div>



                    <form id="registerForm" action="{{ route('auth.store') }}" method="POST" class="flex mt-4 flex-col">
                        @csrf

                        <div class="flex flex-col mt-4">
                            <label for="prenom"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom :</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Prenom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                required />
                        </div>
                        <div class="flex flex-col">
                            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom
                                :</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Nom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500"
                                required />
                        </div>

                        <div class="mt-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse mail :</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500"
                                placeholder="adresse@gmail.com">
                        </div>
                        <div class="mt-4">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                de naissance :</label>
                            <input type="date" id="birthdate" name="birthdate" value="2004-01-01" min="1970-01-01"
                                max="2024-12-31"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500"
                                placeholder="01/01/2000">
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot
                                de passe:</label>
                            <input required type="password" id="password" name="password" min="1970-01-01" max="2024-12-31"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500"
                                placeholder="Motdepasse">
                        </div>
                        <div class="mt-4">
                            <label for="pays"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etablissement :</label>
                            <select id="center" name="center"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">

                                <option value="Pau">Pau</option>
                                <option value="Strasbourg">Strasbourg</option>
                                <option value="Aix">Aix</option>
                                <option value="Alger">Alger</option>
                                <option value="Bordeaux">Bordeaux</option>
                                <option value="Caen">Caen</option>
                                <option value="Dijon">Dijon</option>
                                <option value="Grenoble">Grenoble</option>
                                <option value="Le Mans">Le Mans</option>
                                <option value="La Rochelle">La Rochelle</option>
                                <option value="Lille">Lille</option>
                                <option value="Lyon">Lyon</option>
                                <option value="Montpellier">Montpellier</option>
                                <option value="Nancy">Nancy</option>
                                <option value="Nantes">Nantes</option>
                                <option value="Nice">Nice</option>
                                <option value="Orléans">Orléans</option>
                                <option value="Pau">Pau</option>
                                <option value="Reims">Reims</option>
                                <option value="Rouen">Rouen</option>
                                <option value="Saint-Nazaire">Saint-Nazaire</option>
                                <option value="Strasbourg">Strasbourg</option>
                                <option value="Toulouse">Toulouse</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="pays"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut :</label>
                            <select id="role" name="roles_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">
                                <option value=1>Etudiant</option>
                                <option value=2>Pilote</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="pays"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Promotion :</label>
                            <select id="promotion" name="promotion"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500">

                                <option value="TL22PX301">TL22PX301</option>
                                <option value="TL22PX302">TL22PX302</option>
                                <option value="TL22PX303">TL22PX303</option>
                                <option value="TL22PX304">TL22PX304</option>
                                <option value="TL22PX305">TL22PX305</option>
                                <option value="TL22PX306">TL22PX306</option>
                                <option value="TL22PX307">TL22PX307</option>
                            </select>
                        </div>

                        <div class="mt-12 flex items-center justify-center mt-4">
                            <button
                                class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                type="submit">
                                Soumettre ma demande
                            </button>
                        </div>
                    </form>
                    <div class="mt-12 text-xs text-gray-500 dark-text-white text-center">
                        <p>En cliquant sur "Soumettre ma demande" celle-ci va être transmise à l’un de nos administrateur
                            qui va la traiter dans les plus brefs délais</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/disposable-email-blocker/disposable-email-blocker.min.js"></script>
        <script>
            const defaults = {
                webmail: {
                    message: 'Votre adresse emil est invalide',
                },
            };
            new Disposable.Blocker(defaults);
        </script>

    </body>

@endsection

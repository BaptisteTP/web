@extends('layouts.base')
@section('css', '../css/app.css')
@section('title', 'Accueil')

@section('content')

    <body class="bg-black">
        <div class="flex flex-col relative">
            <div class="bg-gray-300 bg-cover bg-center min-h-screen relative"
                style="background-image: url(/image1/Parcours_pro_modif.jpg);">

                <div class="flex flex-col items-start pt-44 pr-4 md:pr-16 pb-20">
                    <div class="container mx-auto mb-32">
                        <div class="text-white font-extrabold text-6xl mb-4 ml-4 md:ml-20">Stage Quest</div>
                        <div class="text-white ml-4 md:ml-20 text-2xl mt-8">Trouvez votre stage en un simple clic :
                            regroupez toutes vos opportunités sur <b>notre site !</b></div>
                    </div>
                </div>
                <form id="internshipF" action="{{ route('internship_offers.index') }}" method="GET">
                    <div class="w-full h-24 flex justify-center items-center">
                        <div
                            class="rounded-lg bg-white w-8/12 max-w-screen-lg mx-auto p-2 flex justify-between items-center">
                            <div>
                                <p class="text-gray-600">Mot clé, domaine ou ville ?</p>
                                <input name="search" type="text" id="recherche" placeholder="Informatique, Toulouse..."
                                    class="border-none focus:outline-none w-full">
                            </div>
                            <div class="p-4">
                                <button id="recherche" class="p-0 border-none bg-transparent cursor-pointer" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        fill="currentColor" class="bi bi-search text-black" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="bg-gray-200">
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-200">
                <div id="Entreprise" class="container mx-auto px-4">
                    <p class="text-gray-800 font-bold text-4xl mt-8 mb-8">Nos entreprise <b>partenaires.</b></p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 grid-mobile">
                        <a href="https://www.airbus.com/en">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-20 h-8 flex items-center justify-center">
                                            <img src="\image1\logo-airbus.jpg" alt="Airbus" class="w-auto h-auto">
                                        </div>
                                        <h2 class="text-xl font-bold">Airbus</h2>
                                    </div>
                                    <div class="bg-purple-200 h-40 flex items-center justify-center">
                                        <div class="h-full w-full bg-cover bg-center bg-no-repeat"
                                            style="background-image: url('image1/aribus.jpg');"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.capgemini.com/fr-fr/">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-24 h-8 flex items-center justify-center">
                                            <img src="/image1/logo-capgemini.png" alt="Capgemini" class="w-auto h-auto">
                                        </div>
                                        <h2 class="text-xl font-bold">Capgemini</h2>
                                    </div>
                                    <div class="bg-blue-200 h-40 flex items-center justify-center">
                                        <div class="h-full w-full bg-cover bg-center bg-no-repeat"
                                            style="background-image: url('image1/capgemini.jpeg');"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.thalesgroup.com/fr">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-24 h-8 flex items-center justify-center">
                                            <img src="/image1/logo-thales.png" alt="Thales" class="w-auto h-auto">
                                        </div>
                                        <h2 class="text-xl font-bold">Thales</h2>
                                    </div>
                                    <div class="bg-yellow-200 h-40 flex items-center justify-center">
                                        <div class="h-full w-full bg-cover bg-center bg-no-repeat"
                                            style="background-image: url('image1/thales1.jpg');"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.cgi.com/france/fr-fr">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-16 h-8 flex items-center justify-center">
                                            <img src="/image1/logo-cgi.png" alt="CGI" class="w-auto h-auto">
                                        </div>
                                        <h2 class="text-xl font-bold">CGI</h2>
                                    </div>
                                    <div class="bg-green-200 h-40 flex items-center justify-center">
                                        <div class="h-full w-full bg-cover bg-center bg-no-repeat"
                                            style="background-image: url('image1/cgi.jpg');"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://infotel.com/">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-28 h-8 flex items-center justify-center">
                                            <img src="/image1/logo-infotel.png" alt="Infotel" class="w-auto h-auto">
                                        </div>
                                        <h2 class="text-xl font-bold">Infotel</h2>
                                    </div>
                                    <div class="bg-red-200 h-40 flex items-center justify-center">
                                        <div class="h-full w-full bg-cover bg-center bg-no-repeat"
                                            style="background-image: url('image1/infotel.png');"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.apple.com/fr/">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-8 h-8 flex items-center justify-center">
                                            <img src="/image1/logo-appel.png" alt="Apple" class="w-auto h-auto">
                                        </div>
                                        <h2 class="text-xl font-bold">APPLE</h2>
                                    </div>
                                    <div class="h-40 flex items-center justify-center">
                                        <div class="h-full w-full bg-cover bg-center bg-no-repeat"
                                            style="background-image: url('image1/apple.jpg');"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-8 text-center mb-8">
                        <a href="{{ route('company.index') }}"
                            class="inline-block px-6 py-3 bg-black text-white font-semibold rounded-full shadow-md hover:bg-gray-800">Voir
                            toutes les entreprises</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-300 min-h-screen relative">
            <div id="Nous-Contacter" class="flex flex-col items-start pt-16 pr-4 md:pr-16 pb-20">
                <div class="container">
                    <div class="font-extrabold text-4xl mb-4 ml-4 md:ml-20">À propos de Stage Quest</div>
                    <div class="ml-4 md:ml-20 text-xl mt-4">Stage Quest est une plateforme dédiée à la recherche de
                        stages. Notre mission est de connecter les étudiants motivés avec des opportunités de stage
                        enrichissantes, tout en facilitant le processus de recrutement pour les entreprises.</div>
                    <div class="ml-4 md:ml-20 text-xl mt-8 mb-4">Contactez-nous : contact@stagequest.com</div>
                    <div class="font-extrabold ml-4 md:ml-20 text-3xl mt-12">Nous contacter directement</div>
                    <div class="font-extrabold ml-4 md:ml-20 text-xl mt-2">Si vous avez la moindre question, n'hésitez
                        pas.</div>
                    <div class="flex flex-col md:flex-row ml-4 md:ml-20 mt-8">
                        <input type="text" name="nom" id="nom" placeholder="Nom*"
                            class="flex-auto h-12 md:w-1/3 md:px-6 rounded-md bg-gray-100 placeholder-opacity-50 mb-4 md:mb-0 mr-4">
                        <input type="text" name="email" id="email" placeholder="Email*"
                            class="flex-auto h-12 md:w-1/3 md:px-6 rounded-md bg-gray-100 placeholder-opacity-50 ml-0 md:ml-4">
                    </div>
                    <textarea name="commentaire" id="commentaireInput" cols="120" rows="8" placeholder="Votre message"
                        class="w-full md:w-3/4 md:px-6 md:py-6 rounded-md bg-gray-100 placeholder-opacity-50 ml-4 md:ml-20 mt-8"></textarea>
                    <div class="mt-10">
                        <a href="#"
                            class="mt-8 bg-white text-black font-semibold rounded-full px-6 py-3 shadow-md hover:bg-gray-400 ml-20 mt-8">Envoyer</a>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
            <script src="{{ asset('/sw.js') }}"></script>
            {{-- </div> --}}
    </body>
@endsection

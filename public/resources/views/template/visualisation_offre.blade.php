@extends('layouts.base')
@section('title', 'Visualisation offre')

@section('content')

    <body>
        <div class="flex ml-20 font-sans">
            <h1 class="text-3xl font-bold">Stage Développement Full Stack H/F</h1>
            <button type="button"
                class="ml-20 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-base px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Postuler à cette offre
            </button>
        </div>
        <div class="flex ml-20">
            <p>Nom de l'entreprise</p>
            <p class="ml-3">|</p>
            <p class="ml-3">Ville du stage</p>
            <p class="ml-3">|</p>
            <p class="ml-3">type de contrat (stage) </p>
        </div>
        <div class="ml-20 mt-20">
            <h1 class="text-3xl">Description du stage</h1>
        </div>
        <div class="ml-20 mt-10 mr-20">
            <p>
                La ligne de service Consulting & Solutions d'Akkodis France renforce ses équipes
                en région Toulousaine et recrute un ingénieur Développement Full Stack H/F pour
                intégrer ses équipes «Akkodis Research» afin de participer aux activités de
                développement logiciel.
                <br>
                <br>
                L'objectif de ce stage est de poursuivre le développement de la plateforme
                « Intelligent Quarry System » du projet DigiEcoQuarry (projet Européen)
                développer dans un environnement Cloud avec une architecture micro-service.
            </p>
        </div>
        <div class="ml-20 mt-20">
            <h1 class="text-3xl">Profil recherché</h1>
        </div>
        <div class="ml-20 mt-10 mr-20">
            <p>Mettre un petit texte du avec a un moment on insère le résultat du radio</p>
        </div>
        <div class="ml-20 mt-20">
            <h1 class="text-3xl">Description de l'entreprise</h1>
        </div>
        <div class="ml-20 mt-10 mr-20">
            <p>on sort la description associé a l'entreprise qui a publié l'offre</p>
        </div>

    </body>

    </html>
@endsection

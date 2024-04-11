@extends('layouts.base')
@section('title', 'Modification Entreprise')

@section('content')

    <body class="h-full">

        <div class="flex flex-col justify-center items-center h-full">
            <div class="w-full max-w-2xl mt-12">
                <div class="bg-white shadow-md rounded px-20 py-20 mb-4">
                    <div class="flex justify-between items-center">
                        <p class="text-left font-medium text-lg text-gray-900 dark:text-white">Modification entreprise</p>
                        <form action="{{ route('company.index') }}" method="GET">
                            <button
                                class="bg-black hover:bg-gray-700 text-white font-bold py-auto px-4 rounded-full focus:outline-none focus:shadow-outline"
                                type="submit">&#10229; Retour</button>
                        </form>
                    </div>

                    <hr class="border-black border-2 mb-4">

                    <form action="{{ route('company.update', $company->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col mt-4">
                                    <div id="autreChamp">
                                        <label for="autreInput"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de
                                            l'entreprise* : </label>
                                        <input name="name" type="text" id="autre1"
                                            value="{{$company->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500">
                                        <div class="flex flex-col mt-4">
                                        <label for="autreInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visibilité*</label>
                                            <div class="flex items-center mt-2">
                                                <input type="radio" id="y" name="visibility" value="1"
                                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                                    @if ($company->visibility == 1) checked @endif>
                                                <label for="y" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Fermé</label>

                                                <input type="radio" id="n" name="visibility" value="2"
                                                    class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                                    @if ($company->visibility == 2) checked @endif>
                                                <label for="n" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Ouverte</label>
                                            </div>

                                        </div>

                                        <div class="flex flex-col mt-4">
                                            <label name="sectors_id" for="autreInput"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Secteurs
                                                de l'entreprise* : </label>
                                            <div class="flex items-center mt-2">
                                            <input type="radio" id="info" name="sectors_id" value="1"
                                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                                @if ($company->sectors_id == 1) checked @endif>
                                            <label for="n" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Informatique</label>

                                            <input type="radio" id="s3e" name="sectors_id" value="2"
                                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                                @if ($company->sectors_id == 2) checked @endif>
                                            <label for="n" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">S3E</label>

                                            <input type="radio" id="btp" name="sectors_id" value="3"
                                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                                @if ($company->sectors_id == 3) checked @endif>
                                            <label for="n" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">BTP</label>

                                            <input type="radio" id="gene" name="sectors_id" value="4"
                                                class="mr-2 focus:ring-blue-500 dark:focus:ring-black-500"
                                                @if ($company->sectors_id == 4) checked @endif>
                                            <label for="n" class="text-sm font-semibold text-gray-900 dark:text-white mr-4">Généraliste</label>

                                            </div>

                                            <label for="autreInput"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description
                                                :</label>
                                            <textarea name="body" type="text" id="autre2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500">{{$company->body}}</textarea>
                                        </div>

                                        

                                        <div class="flex flex-col mt-4">
                                            <button
                                                class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                                type="submit">
                                                Modifier l'entreprise
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

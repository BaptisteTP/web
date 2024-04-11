@extends('layouts.base')
@section('title', 'Visualisation offre')
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

@section('content')
    <div class="p-4">
        <div class="flex ml-20">
            <h1 class="text-3xl font-bold">{{ $company->name }}</h1>
        </div>
        <div class="flex ml-20">
            <p>{{ \App\Models\Sectors::findOrFail($company->sectors_id)->sector }}</p>
            <p class="ml-1">|</p>
            <p class="ml-1">{{ $company->name }}</p>
        </div>
        <div class="ml-20 mt-5">
            <h2 class="text-3xl">Description de l'entreprise</h2>
        </div>
        <div class="ml-20 mt-2 mr-20">
            <p>{{ $company->body }}</p>
        </div>
        <div class="ml-20 mt-5">
            <h2 class="text-3xl">Note de l'entreprise</h2>
            <p class="flex items-center">
                <span>{{ round($averageRating) }}/5</span>
                <img src="\image1\etoile_note.png" class="w-6 h-6 ml-2">
                <span class="ml-1">pour {{ $numberOfRatings }} avis postés sur cette entreprise</span>

            </p>
        </div>
        <div class="ml-20 mt-10">
        <h2 class="text-3xl">Laissez un avis sur l'entreprise</h2>
            <div class="mt-2">
                <form action="{{ route('company.storeNote') }}" method="POST" id="evaluationForm">
                    @csrf
                    <div class="stars text-2xl">
                        <i class="lar la-star" data-value="1"></i>
                        <i class="lar la-star" data-value="2"></i>
                        <i class="lar la-star" data-value="3"></i>
                        <i class="lar la-star" data-value="4"></i>
                        <i class="lar la-star" data-value="5"></i>
                    </div>
                    <input type="hidden" name="note" id="note" value="0">
                    <input type="hidden" name="companies_id" value="{{ $company->id }}">
                    <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                    <button type="submit" class="mt-2 bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">Valider</button>
                </form>
            </div>
        </div>
    </div>
@endsection



<script src="{{ asset('/js.js') }}"></script>


<x-layout>
    <x-slot:title>
    {{ $internship_offer->title }}
    </x-slot>
    <h2>{{ $internship_offer->title }}</h2>
    <p>
        <h4> Intitulé : </h4>
        {{ $internship_offer->text }}
        <br>
        <h4> Salaire : </h4>
        {{ $internship_offer->salary }}
        <br>
        <h4> Date de début : </h4>
        {{ $internship_offer->date }}
        <h4> Ville : </h4>
        {{ \App\Models\Locations::find($internship_offer->location_id)->city }}


    </p>

    <form method="GET" action="{{ route('internship_offers.index') }}">
        <button type="submit" class="btn btn-primary">
        Revenir sur toutes les offres
        </button>
    </form>

</x-layout>
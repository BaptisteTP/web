<x-layout>
    @if ($message = Session::get('success'))
    <div class="alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <form id="internshipF" action="{{ route('internship_offers.index') }}" method="GET">
        <input type="text" name="search" placeholder="Rechercher une offre"></input>
        <button type="submit">Rechercher</button>
    </form>


    @foreach ($internship_offers as $internship_offer)
    <h2>

        <a href="{{ route('internship_offers.show', $internship_offer->id) }}">
            {{ $internship_offer->title }}
        </a>
        <a class="btn btn-primary" href="{{ route('internship_offers.edit',$internship_offer->id) }}">
            Edit
        </a>

        <form action="{{ route('internship_offers.destroy',$internship_offer->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </h2>
    <p>
        {{ $internship_offer->body }}
        {{ $internship_offer->date }}
        {{ $internship_offer->status }}
        {{ \App\Models\Locations::find($internship_offer->location_id)->city }}
    </p>
    @endforeach

    <a href="{{ route('internship_offers.create') }}" class="text-2xl font-bold"> Nouvelle offre ici </a>

    <form id="internshipForm" action="{{ route('internship_offers.index') }}" method="GET">
        <fieldset id="cityFilter">
            <legend>City:</legend>

            <div>
                <input type="checkbox" id="paris" name="city[]" value="Paris" {{ in_array('Paris', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="paris">Paris</label>
                @php
                    $offersCountParis = $internship_offers->where('location_id', '=', 1)->count();
                @endphp
                ({{ $offersCountParis }})
            </div>

            <div>
                <input type="checkbox" id="lyon" name="city[]" value="Paris" {{ in_array('Lyon', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="Lyon">Lyon</label>
                @php
                    $offersCountLyon = $internship_offers->where('location_id', '=', 3)->count();
                @endphp
                ({{ $offersCountLyon }})
            </div>

            <div>
                <input type="checkbox" id="toulouse" name="city[]" value="Toulouse" {{ in_array('Toulouse', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="toulouse">Toulouse</label>
                @php
                    $offersCountToulouse = $internship_offers->where('location_id', '=', 4)->count();
                @endphp
                ({{ $offersCountToulouse }})
            </div>

            <div>
                <input type="checkbox" id="marseille" name="city[]" value="Marseille" {{ in_array('Marseille', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="marseille">Marseille</label>
                @php
                    $offersCountMarseille = $internship_offers->where('location_id', '=', 2)->count();
                @endphp
                ({{ $offersCountMarseille }})
            </div>

            <div>
                <input type="checkbox" id="nice" name="city[]" value="Nice" {{ in_array('Nice', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="nice">Nice</label>
                @php
                    $offersCountNice = $internship_offers->where('location_id', '=', 5)->count();
                @endphp
                ({{ $offersCountNice }})
            </div>

            <div>
                <input type="checkbox" id="nantes" name="city[]" value="Nantes" {{ in_array('Nantes', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="nantes">Nantes</label>
                @php
                    $offersCountNantes = $internship_offers->where('location_id', '=', 6)->count();
                @endphp
                ({{ $offersCountNantes }})
            </div>

            <div>
                <input type="checkbox" id="strasbourg" name="city[]" value="Strasbourg" {{ in_array('Strasbourg', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="strasbourg">Strasbourg</label>
                @php
                    $offersCountStrasbourg = $internship_offers->where('location_id', '=', 7)->count();
                @endphp
                ({{ $offersCountStrasbourg }})
            </div>

            <div>
                <input type="checkbox" id="montpellier" name="city[]" value="Montpellier" {{ in_array('Montpellier', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="montpellier">Montpellier</label>
                @php
                    $offersCountMontpellier = $internship_offers->where('location_id', '=', 8)->count();
                @endphp
                ({{ $offersCountMontpellier }})
            </div>

            <div>
                <input type="checkbox" id="bordeaux" name="city[]" value="Bordeaux" {{ in_array('Bordeaux', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="bordeaux">Bordeaux</label>
                @php
                    $offersCountBordeaux = $internship_offers->where('location_id', '=', 9)->count();
                @endphp
                ({{ $offersCountBordeaux }})
            </div>

            <div>
                <input type="checkbox" id="lille" name="city[]" value="Lille" {{ in_array('Lille', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="lille">Lille</label>
                @php
                    $offersCountLille = $internship_offers->where('location_id', '=', 10)->count();
                @endphp
                ({{ $offersCountLille }})
            </div>

            <div>
                <input type="checkbox" id="rennes" name="city[]" value="Rennes" {{ in_array('Rennes', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="rennes">Rennes</label>
                @php
                    $offersCountRennes = $internship_offers->where('location_id', '=', 11)->count();
                @endphp
                ({{ $offersCountRennes }})
            </div>

            <div>
                <input type="checkbox" id="reims" name="city[]" value="Reims" {{ in_array('Reims', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="reims">Reims</label>
                @php
                    $offersCountReims = $internship_offers->where('location_id', '=', 12)->count();
                @endphp
                ({{ $offersCountReims }})
            </div>

            <div>
                <input type="checkbox" id="le_havre" name="city[]" value="Le Havre" {{ in_array('Le Havre', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="le_havre">Le Havre</label>
                @php
                    $offersCountLeHavre = $internship_offers->where('location_id', '=', 13)->count();
                @endphp
                ({{ $offersCountLeHavre }})
            </div>

            <div>
                <input type="checkbox" id="saint_etienne" name="city[]" value="Saint-Étienne" {{ in_array('Saint-Étienne', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="saint_etienne">Saint-Étienne</label>
                @php
                    $offersCountSaintEtienne = $internship_offers->where('location_id', '=', 14)->count();
                @endphp
                ({{ $offersCountSaintEtienne }})
            </div>

            <div>
                <input type="checkbox" id="toulon" name="city[]" value="Toulon" {{ in_array('Toulon', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="toulon">Toulon</label>
                @php
                    $offersCountToulon = $internship_offers->where('location_id', '=', 15)->count();
                @endphp
                ({{ $offersCountToulon }})
            </div>

            <div>
                <input type="checkbox" id="grenoble" name="city[]" value="Grenoble" {{ in_array('Grenoble', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="grenoble">Grenoble</label>
                @php
                    $offersCountGrenoble = $internship_offers->where('location_id', '=', 16)->count();
                @endphp
                ({{ $offersCountGrenoble }})
            </div>

            <div>
                <input type="checkbox" id="dijon" name="city[]" value="Dijon" {{ in_array('Dijon', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="dijon">Dijon</label>
                @php
                    $offersCountDijon = $internship_offers->where('location_id', '=', 17)->count();
                @endphp
                ({{ $offersCountDijon }})
            </div>

            <div>
                <input type="checkbox" id="angers" name="city[]" value="Angers" {{ in_array('Angers', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="angers">Angers</label>
                @php
                    $offersCountAngers = $internship_offers->where('location_id', '=', 18)->count();
                @endphp
                ({{ $offersCountAngers }})
            </div>

            <div>
                <input type="checkbox" id="nimes" name="city[]" value="Nîmes" {{ in_array('Nîmes', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="nimes">Nîmes</label>
                @php
                    $offersCountNimes = $internship_offers->where('location_id', '=', 19)->count();
                @endphp
                ({{ $offersCountNimes }})
            </div>

            <div>
                <input type="checkbox" id="villeurbanne" name="city[]" value="Villeurbanne" {{ in_array('Villeurbanne', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="villeurbanne">Villeurbanne</label>
                @php
                    $offersCountVilleurbanne = $internship_offers->where('location_id', '=', 20)->count();
                @endphp
                ({{ $offersCountVilleurbanne }})
            </div>

            <div>
                <input type="checkbox" id="besancon" name="city[]" value="Besançon" {{ in_array('Besançon', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="besancon">Besançon</label>
                @php
                    $offersCountBesançon = $internship_offers->where('location_id', '=', 22)->count();
                @endphp
                ({{ $offersCountBesançon }})
            </div>

            <div>
                <input type="checkbox" id="limoges" name="city[]" value="Limoges" {{ in_array('Limoges', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="limoges">Limoges</label>
                @php
                    $offersCountLimoges = $internship_offers->where('location_id', '=', 23)->count();
                @endphp
                ({{ $offersCountLimoges }})
            </div>

            <div>
                <input type="checkbox" id="metz" name="city[]" value="Metz" {{ in_array('Metz', request()->input('city', [])) ? 'checked' : '' }}>
                <label for="metz">Metz</label>
                @php
                    $offersCountMetz = $internship_offers->where('location_id', '=', 24)->count();
                @endphp
                ({{ $offersCountMetz }})
            </div>

        </fieldset>

        <fieldset id="PromoFilter">
            <legend>Promo:</legend>

            <div>
                <input type="checkbox" id="promo1" name="type_promotions_id[]" value="CPIA1" {{ in_array('CPIA1', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                <label for="CPIA1">CPIA1</label>
                @php
                    $offersCountCPIA1 = $internship_offers->where('type_promotions_id', '=', 1)->count();
                @endphp
                ({{ $offersCountCPIA1 }})
            </div>

            <div>
                <input type="checkbox" id="promo2" name="type_promotions_id[]" value="CPIA2" {{ in_array('CPIA2', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                <label for="CPIA2">CPIA2</label>
                @php
                    $offersCountCPIA2 = $internship_offers->where('type_promotions_id', '=', 2)->count();
                @endphp
                ({{ $offersCountCPIA2 }})
            </div>

            <div>
                <input type="checkbox" id="promo3" name="type_promotions_id[]" value="CPIA3" {{ in_array('CPIA3', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                <label for="CPIA3">CPIA3</label>
                @php
                    $offersCountCPIA3 = $internship_offers->where('type_promotions_id', '=', 3)->count();
                @endphp
                ({{ $offersCountCPIA3 }})
            </div>

            <div>
                <input type="checkbox" id="promo4" name="type_promotions_id[]" value="CPIA4" {{ in_array('CPIA4', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                <label for="CPIA4">CPIA4</label>
                @php
                    $offersCountCPIA4 = $internship_offers->where('type_promotions_id', '=', 4)->count();
                @endphp
                ({{ $offersCountCPIA4 }})
            </div>

            <div>
                <input type="checkbox" id="promo5" name="type_promotions_id[]" value="CPIA5" {{ in_array('CPIA5', request()->input('type_promotions_id', [])) ? 'checked' : '' }}>
                <label for="CPIA5">CPIA5</label>
                @php
                    $offersCountCPIA5 = $internship_offers->where('type_promotions_id', '=', 5)->count();
                @endphp
                ({{ $offersCountCPIA5 }})
            </div>
        </fieldset>


        <button type="submit">Filtrer</button>
    </form>

</x-layout>

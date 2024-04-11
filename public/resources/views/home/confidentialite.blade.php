@extends('layouts.base')
@section('title', 'Politique de confidentialité')

@section('content')
    <div class="flex flex-col justify-center items-center h-full">
        <div class="w-full max-w-4xl mt-12">
            <div class="bg-white shadow-md rounded px-20 py-20 mb-4">
                <div class="">
                    <h1 class="text-4xl font-extrabold">Politique de confidentialité</h1>
                    <p class="text-xl">Tout savoir sur vos données personnelles</p>
                </div>
                <div class="mt-20">
                    <h2 class="text-3xl font-bold">Données personnelles collectées</h2>
                    <h3 class="font-semibold mt-4">Avatar</h3>
                    <p class="mt-2">Si vous êtes un utilisateur ou une utilisatrice enregistré·e et que vous téléversez des
                        images sur le
                        site
                        web, nous vous conseillons d’éviter de téléverser des images contenant des données EXIF de
                        coordonnées GPS.
                        Les visiteurs de votre site web peuvent télécharger et extraire des données de localisation depuis
                        ces
                        images.</p>
                    <h3 class="font-semibold mt-4">Cookies</h3>
                    <p class="mt-2">Si vous avez un compte et que vous vous connectez sur le site, un cookie temporaire
                        sera créé afin de
                        persister votre état de connexion. Ce cookie sera automatiquement détruit lorsque vous vous
                        déconnecterez du
                        site.</p>
                    <h3 class="font-semibold mt-4">Contenu embarqué depuis d’autres sites</h3>
                    <p class="mt-2">Certains articles de ce site peuvent inclure des contenus intégrés (par exemple des
                        vidéos, images,
                        articles…). Le contenu intégré depuis d’autres sites se comporte de la même manière que si le
                        visiteur se
                        rendait sur cet autre site. Ces sites web pourraient collecter des données sur vous, utiliser des
                        cookies,
                        embarquer des outils de suivi tiers, suivre vos interactions avec ces contenus embarqués si vous
                        disposez
                        d’un compte connecté sur leur site web.</p>
                </div>
                <div>
                    <h2 class="text-3xl font-bold mt-8">Stockage de vos données</h2>
                    <p class="mt-4">Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés
                        indéfiniment. Cela
                        permet de
                        reconnaître et d'approuver automatiquement les commentaires suivants au lieu de les laisser dans la
                        file de
                        modération.</p>
                    <p class="mt-4">Pour les utilisateurs qui s’enregistrent sur le site, nous stockons également les
                        données
                        personnelles indiquées dans leur profil. Tous les utilisateurs peuvent voir, modifier ou supprimer
                        leurs
                        informations personnelles à tout moment. Seul le gestionnaire du site peut aussi voir et modifier
                        ces
                        informations.</p>
                </div>
                <div>
                    <h2 class="text-3xl font-bold mt-8">Droit sur vos données</h2>
                    <p class="mt-4">Si vous avez un compte, vous pouvez demander la suppression des données personnelles
                        vous concernant.
                        Cela ne
                        prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de
                        sécurité. Si vous avez un compte et que vous souhaitez supprimer vos informations vous pouvez le
                        faire
                        automatiquement depuis votre compte en cliquant sur le bouton “Supprimer mon compte”.</p>
                </div>
                <div>
                    <h2 class="text-3xl font-bold mt-8">Fuite de données</h2>
                    <p class="mt-4">Conformément à la procédure prévue par le règlement général sur la protection des
                        données en cas de
                        fuite ou
                        d’anomalie concernant les données personnelles en notre possession, nous vous avertirons de la
                        nature des
                        données ayant fuitées et la nature du risque qui peut être engendrée, si cela peut entraver vos
                        droits et
                        libertés (données sensibles) dans un délai maximal de 72 heures après constat du problème.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

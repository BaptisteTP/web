<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/checkbox.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
   
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/image1/logo_url-removebg-preview.png">
    <link rel="manifest" href="manifest.json">

    <script>
        window.addEventListener('load', () => {
            if ("serviceWorker" in navigator){
                navigator.serviceWorker.register('sw.js')
            }

        })
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-2xl">
            <form method="POST" action="{{ route('dologin') }}" class="bg-white shadow-md rounded px-20 py-20 mb-4 mt-4">
                {{csrf_field()}}
                <div class="text-center mb-6 mt-0">
                    <img src="..\image1\logo1.png" class="h-40 mx-auto -mt-10" alt="Logo">
                    <nav>
                        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 justify-center">
                            <li>
                                <a href="/demande" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-500 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Demande</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-black font-bold underline bg-gray-100 rounded md:bg-transparent md:text-black-700 md:p-0 md:dark:text-black-500" aria-current="page">Se connecter</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                     
                <div class="mt-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse mail :</label>
                    <input  type="email" name="email" :value="old('email')" required autofocus autocomplete="username"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring focus:border-blue-500" placeholder="adresse@gmail.com">
                  
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe :</label>
                    <input type="password" name="password" required autocomplete="current-password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring focus:border-blue-500" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-center">
                    <div class="mt-2 text-left flex">
                        <a href='{{route('password.request')}}' class="block text-sm text-gray-600 dark:text-white hover:underline">Mot de passe oublié ?</a>
                    </div>

                    <div class="mt-2 flex items-center justify-end">
                        <div class="form-check ml-auto">
                            <input type="checkbox" id="remember-me" name="remember" class="h-4 w-4 text-gray-900 dark:text-white focus:ring-blue-500 dark:focus:ring-blue-500 border-gray-300 dark:border-gray-600 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900 dark:text-white">Rester connecté·e</label>
                        </div>
                    </div>

                </div>
                <x-input-error :messages="$errors->get('validation')" class="mt-4 justify-center flex items-center " />

                <div class="flex items-center justify-center mt-4">
                    <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                        Je me connecte
                    </button>
                     
                </div>
           
            </form>
            </div>
        </div>
    </div>
</body>
</html>

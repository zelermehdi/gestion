<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
  
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

        <!-- Styles -->
        <style>
          @media (prefers-reduced-motion: no-preference) {
  .motion-safe\:hover\:scale-\[1\.01\]:hover {
    --tw-scale-x:1.01;
    --tw-scale-y:1.01;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }
}
@media (prefers-color-scheme: dark) {
  .dark\:bg-gray-900 {
    --tw-bg-opacity:1;
    background-color:rgb(17 24 39 / var(--tw-bg-opacity));
  }
 
}
@media (min-width: 640px) {
  .sm\:fixed {
    position: fixed;
  }
  .sm\:top-0 {
    top: 0px;
  }
  .sm\:right-0 {
    right: 0px;
  }
  .sm\:ml-0 {
    margin-left: 0px;
  }
  .sm\:flex {
    display: flex;
  }
  .sm\:items-center {
    align-items: center;
  }
  .sm\:justify-center {
    justify-content: center;
  }
  .sm\:justify-between {
    justify-content: space-between;
  }
  .sm\:text-left {
    text-align: left;
  }
  .sm\:text-right {
    text-align: right;
  }
}
@media (min-width: 768px) {
  .md\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (min-width: 1024px) {
  .lg\:gap-8 {
    gap: 2rem;
  }
  .lg\:p-8 {
    padding: 2rem;
  }
}

        </style>
    </head>

    <body class="font-sans">

        <!-- Header -->
        <header>
            <div class="container mx-auto p-6 flex justify-between items-center">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ route('user.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
        
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">S'inscrire</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </header>
    
<main>

        <section class="min-h-screen flex items-center justify-center">
            <div class="container mx-auto p-6 text-center">
                <h1 class="text-4xl font-bold mb-4 text-gray-800 dark:text-gray-200">GestionRésidence360 : Votre Portail Tout-en-Un</h1>
                <img class="min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-center" src="{{ asset('images/image.jpeg') }}" alt="Ma Image">
            </div>
        </section>
    
        <section  class="mt-8">
            <div class="container mx-auto">
                <hr class="mb-4 border-t border-gray-300 dark:border-gray-700">
    
                <p class="text-gray-600 dark:text-gray-400 ">
                    Chez [Nom du Site], nous comprenons l'importance d'une gestion de résidence efficace et transparente. Que vous soyez propriétaire, gestionnaire ou habitant, notre plateforme offre des solutions innovantes pour simplifier chaque aspect de la vie en résidence. <br><br>
                    
                    <strong class="block mb-2">Pour les Propriétaires et Gestionnaires :</strong>
                    Notre interface conviviale vous permet de gérer tous les aspects de votre résidence en un seul endroit. Suivez les paiements, gérez les services, communiquez avec les résidents et suivez la performance financière de votre propriété, le tout à portée de clic. Avec [Nom du Site], la gestion quotidienne devient un jeu d'enfant. <br><br>
                    
                    <strong class="block mb-2">Pour les Résidents :</strong>
                    Fini les tracas administratifs ! Accédez à toutes les informations importantes, des annonces communautaires aux événements à venir, via notre portail résidentiel intuitif. Signalez rapidement les problèmes d'entretien, payez vos charges en ligne et restez connecté avec vos voisins grâce à notre espace communautaire. [Nom du Site] rend la vie en résidence plus simple que jamais.
                </p>
            </div>
        </section>
</main>
        <!-- Footer -->
        <footer class="flex items-center justify-center h-16 bg-yellow-100	">
            <p class="text-center text-gray-600 dark:text-white">&copy; {{ date('Y') }} Votre Nom d'Entreprise. Tous droits réservés.</p>
        </footer>
    
    </body>
    
    </html>
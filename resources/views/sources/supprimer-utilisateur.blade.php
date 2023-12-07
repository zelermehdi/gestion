
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Félicitations</title>
    <!-- Ajoutez les liens CDN de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-96">
        <div class="text-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-16 h-16 text-green-500 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-2xl font-semibold mb-4">Utilisateur Supprimé</h1>

        <p class="text-gray-600 mb-6">L'utilisateur a été supprimé avec succès!</p>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('Utilisateurs') }}"
                class="block w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition duration-150 ease-in-out">
                Revenir
            </a>
        @endif
    </div>
</div>

</body>
</html>

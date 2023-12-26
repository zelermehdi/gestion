<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La liste des utilisateurs</title>

    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @include('partials.navbar')
        </div>
    </header>
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg mt-8">
        <h1 class="text-5xl font-bold mb-8 text-gray-900">Liste des Utilisateurs</h1>

        <table class="min-w-full bg-white border border-gray-300 rounded-md overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Prénom</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Autorisation</th>
                    <th class="py-3 px-6 text-left">Date de Création</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition duration-300">
                        <td class="py-4 px-6">{{ $user->last_name }}</td>
                        <td class="py-4 px-6">{{ $user->first_name }}</td>
                        <td class="py-4 px-6">{{ $user->email }}</td>
                        <td class="py-4 px-6">{{ $user->role }}</td>
                        <td class="py-4 px-6">{{ $user->created_at }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:underline mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21a2 2 0 01-2 2H7a2 2 0 01-2-2v-4a2 2 0 012-2h2"/>
                                </svg>
                            </a>
                
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

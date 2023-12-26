<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>

    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg mt-8">
        <h1 class="text-5xl font-bold mb-8 text-gray-900">Détails de l'Utilisateur</h1>

        <table class="min-w-full bg-white border border-gray-300 rounded-md overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-4 px-6 text-left">Nom</th>
                    <th class="py-4 px-6 text-left">Prénom</th>
                    <th class="py-4 px-6 text-left">Email</th>
                    <th class="py-4 px-6 text-left">Adresse</th>
                    <th class="py-4 px-6 text-left">Code Postal</th>
                    <th class="py-4 px-6 text-left">Date de naissance</th>
                    <th class="py-4 px-6 text-left">Lieu de naissance</th>
                    <th class="py-4 px-6 text-left">Nationalité</th>
                    <th class="py-4 px-6 text-left">Numéro de téléphone</th>
                    <th class="py-4 px-6 text-left">Numéro de la carte nationale</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50 transition duration-300">
                    <td class="py-4 px-6">{{ $user->last_name }}</td>
                    <td class="py-4 px-6">{{ $user->first_name }}</td>
                    <td class="py-4 px-6">{{ $user->email }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->address ?? '' }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->postalcode ?? '' }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->birth_date ?? '' }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->place_of_birth ?? '' }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->nationality ?? '' }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->phone_number ?? '' }}</td>
                    <td class="py-4 px-6">{{ $user->locataire->idcard_number ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>

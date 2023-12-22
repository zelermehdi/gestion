<?php
use App\Models\User;
use App\Models\Locataire;
$users = User::all();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau locataire</title>
    <!-- Intégration du CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Ajouter un nouveau locataire</h2>
    <form action="{{ route('locataires.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="form-group col-md-6">
                <label for="user_id" class="col-form-label">Utilisateur</label>
                <select id="user_id" class="form-control" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name }} </option>
                    @endforeach 
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="first_name" class="col-form-label">Prénom</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="last_name" class="col-form-label">Nom</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="address" class="col-form-label">Adresse</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="postalcode" class="col-form-label">Code postal</label>
                <input type="text" name="postalcode" id="postalcode" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="country" class="col-form-label">Pays</label>
                <input type="text" name="country" id="country" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="city" class="col-form-label">Ville</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="birth_date" class="col-form-label">Date de naissance</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="place_of_birth" class="col-form-label">Lieu de naissance</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nationality" class="col-form-label">Nationalité</label>
                <input type="text" name="nationality" id="nationality" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="phone_number" class="col-form-label">Numéro de téléphone</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="idcard_number" class="col-form-label">Numéro de carte d'identité</label>
                <input type="text" name="idcard_number" id="idcard_number" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Ajouter</button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

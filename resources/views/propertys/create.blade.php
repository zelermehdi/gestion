@extends("vendor.all-generator.layout.blanc")
<?php
use App\Models\User;
use App\Models\PropertyType;
use App\Models\Attribute;
$users = User::all();
$types=PropertyType::all();
$attributes=Attribute::all();
?>
@section("contenu")
<div class="container mt-5">
    <h1>Ajouter une propriété</h1>

    <form action="{{ route('propertys.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address2" class="form-label">Compléments d'adresse</label>
            <input type="text" name="address2" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" name="city" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="postcode" class="form-label">Code postal</label>
                <input type="text" name="postcode" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Pays</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nb_rooms" class="form-label">Nombre de chambres</label>
            <input type="number" name="nb_rooms" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Taille (m²)</label>
            <input type="number" step="0.01" name="size" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Meublée:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="furnished" value="1" required>
                <label class="form-check-label" for="furnished">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="furnished" value="0">
                <label class="form-check-label" for="furnished">Non</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="property_type_id" class="form-label">Type de logement</label>
            <select id="property_type_id" class="form-control" name="property_type_id" required>
                @foreach ($types as $typ)
                    <option value="{{ $typ->id }}">{{ $typ->type }}</option>
                @endforeach 
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select id="user_id" class="form-control" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                @endforeach 
            </select>
        </div>

        <button class="btn btn-primary">Ajouter</button>
    </form>
</div>

@endsection

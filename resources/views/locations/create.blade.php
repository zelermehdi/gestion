@extends("vendor.all-generator.layout.blanc")

<?php
use App\Models\User;
use App\Models\Locataire;
use App\Models\BailType;
use App\Models\PropertyType;
use App\Models\Property;
$users = User::all();
$locataires=Locataire::all();
$Type_bails=BailType::all();
$types=PropertyType::all();
$propertys=Property::all();


?>


@section("contenu")
<div class="container">
    <h2>Ajouter une nouvelle location</h2>
    
    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="user_id">Utilisateur </label>
            <select id="user_id" class="form-control" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} </option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label for="property_id">Propriété </label>
            <select id="user_id" class="form-control" name="property_id" required>
                @foreach ($propertys as $property)
                    <option value="{{ $property->id }}">{{ $property->city }} </option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label for="locataire_id">Locataire </label>
            <select id="user_id" class="form-control" name="locataire_id" required>
                @foreach ($locataires as $locataire)
                    <option value="{{  $locataire->id }}">{{ $user->first_name }} </option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label for="bail_type_id">Type de bail </label>
            <select id="user_id" class="form-control" name="bail_type_id" required>
                @foreach ($Type_bails as $Type_bail)
                    <option value="{{ $Type_bail->id }}">{{ $Type_bail->type }} </option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label for="loyer">Loyer </label>
            <input type="number" name="loyer" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="charges">Charges </label>
            <input type="number" name="charges" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="preavis">Préavis </label>
            <input type="number" name="preavis" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_signature_bail">Date de signature du bail </label>
            <input type="date" name="date_signature_bail" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_entree">Date d'entrée </label>
            <input type="date" name="date_entree" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    </form>
</div>
@endsection
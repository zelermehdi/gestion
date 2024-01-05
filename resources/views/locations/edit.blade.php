@extends("vendor.all-generator.layout.blanc")

<?php
use App\Models\User;
use App\Models\Locataire;
use App\Models\BailType;
use App\Models\PropertyType;
use App\Models\Property;

$users = User::all();
$locataires = Locataire::all();
$Type_bails = BailType::all();
$types = PropertyType::all();
$propertys = Property::all();
?>

@section("contenu")

<form action="{{ route('locations.update', $location->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="card">
        <div class="card-header">
            <div class="card-title">Modifier une location</div>
        </div>

        <div class="card-body">
            <div class="row">

                <!-- Utilisateur -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Utilisateur</label>
                        <select id="user_id" class="form-control" name="user_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $location->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->first_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Propriété -->
                    <div class="mb-3">
                        <label for="property_id" class="form-label">Propriété</label>
                        <select id="property_id" class="form-control" name="property_id" required>
                            @foreach ($propertys as $property)
                                <option value="{{ $property->id }}" {{ $location->property_id == $property->id ? 'selected' : '' }}>
                                    {{ $property->city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Locataire -->
                    <div class="mb-3">
                        <label for="locataire_id" class="form-label">Locataire</label>
                        <select id="locataire_id" class="form-control" name="locataire_id" required>
                            @foreach ($locataires as $locataire)
                                <option value="{{ $locataire->id }}" {{ $location->locataire_id == $locataire->id ? 'selected' : '' }}>
                                    {{ $locataire->first_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Type de bail -->
                    <div class="mb-3">
                        <label for="bail_type_id" class="form-label">Type de bail</label>
                        <select id="bail_type_id" class="form-control" name="bail_type_id" required>
                            @foreach ($Type_bails as $Type_bail)
                                <option value="{{ $Type_bail->id }}" {{ $location->bail_type_id == $Type_bail->id ? 'selected' : '' }}>
                                    {{ $Type_bail->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Loyer -->
                    <div class="mb-3">
                        <label for="loyer" class="form-label">Loyer</label>
                        <input type="number" name="loyer" class="form-control" step="0.01" value="{{ $location->loyer }}" required>
                    </div>

                    <!-- Charges -->
                    <div class="mb-3">
                        <label for="charges" class="form-label">Charges</label>
                        <input type="number" name="charges" class="form-control" step="0.01" value="{{ $location->charges }}" required>
                    </div>

                    <!-- Préavis -->
                    <div class="mb-3">
                        <label for="preavis" class="form-label">Préavis</label>
                        <input type="number" name="preavis" class="form-control" value="{{ $location->preavis }}" required>
                    </div>

                    <!-- Date de signature du bail -->
                    <div class="mb-3">
                        <label for="date_signature_bail" class="form-label">Date de signature du bail</label>
                        <input type="date" name="date_signature_bail" class="form-control" value="{{ $location->date_signature_bail }}" required>
                    </div>

                    <!-- Date d'entrée -->
                    <div class="mb-3">
                        <label for="date_entree" class="form-label">Date d'entrée</label>
                        <input type="date" name="date_entree" class="form-control" value="{{ $location->date_entree }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form>

@endsection

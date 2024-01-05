@extends("vendor.all-generator.layout.blanc")
<?php
use App\Models\User;
$users = User::all();
?>
@section("contenu")

<form action="{{ route('locataires.update', $locataire->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="card">
        <div class="card-header">
            <div class="card-title"> Locataires Liste </div>
        </div>

        <div class="card-body">
            <div class="row">

                <!-- Utilisateur -->
                <div class="form-group col-md-6">
                    <label for="user_id" class="col-form-label">Utilisateur</label>
                    <select id="user_id" class="form-control" name="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $locataire->user_id ? 'selected' : '' }}>{{ $user->first_name }}</option>
                        @endforeach 
                    </select>
                </div>

                <!-- Prénom -->
                <div class="form-group col-md-6">
                    <label for="first_name" class="col-form-label">Prénom</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $locataire->first_name }}" required>
                </div>

                <!-- Nom -->
                <div class="form-group col-md-6">
                    <label for="last_name" class="col-form-label">Nom</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $locataire->last_name }}" required>
                </div>

                <!-- Adresse -->
                <div class="form-group col-md-6">
                    <label for="address" class="col-form-label">Adresse</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $locataire->address }}" required>
                </div>

                <!-- Code postal -->
                <div class="form-group col-md-6">
                    <label for="postalcode" class="col-form-label">Code postal</label>
                    <input type="text" name="postalcode" id="postalcode" class="form-control" value="{{ $locataire->postalcode }}" required>
                </div>

                <!-- Pays -->
                <div class="form-group col-md-6">
                    <label for="country" class="col-form-label">Pays</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ $locataire->country }}" required>
                </div>

                <!-- Ville -->
                <div class="form-group col-md-6">
                    <label for="city" class="col-form-label">Ville</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ $locataire->city }}" required>
                </div>

                <!-- Email -->
                <div class="form-group col-md-6">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $locataire->email }}" required>
                </div>

                <!-- Date de naissance -->
                <div class="form-group col-md-6">
                    <label for="birth_date" class="col-form-label">Date de naissance</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $locataire->birth_date }}" required>
                </div>

                <!-- Lieu de naissance -->
                <div class="form-group col-md-6">
                    <label for="place_of_birth" class="col-form-label">Lieu de naissance</label>
                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{ $locataire->place_of_birth }}" required>
                </div>

                <!-- Nationalité -->
                <div class="form-group col-md-6">
                    <label for="nationality" class="col-form-label">Nationalité</label>
                    <input type="text" name="nationality" id="nationality" class="form-control" value="{{ $locataire->nationality }}" required>
                </div>

                <!-- Numéro de téléphone -->
                <div class="form-group col-md-6">
                    <label for="phone_number" class="col-form-label">Numéro de téléphone</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $locataire->phone_number }}" required>
                </div>

                <!-- Numéro de carte d'identité -->
                <div class="form-group col-md-6">
                    <label for="idcard_number" class="col-form-label">Numéro de carte d'identité</label>
                    <input type="text" name="idcard_number" id="idcard_number" class="form-control" value="{{ $locataire->idcard_number }}" required>
                </div>
                
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success"> Submit </button>
            <button type="reset" class="btn btn-danger"> Cancel </button>
        </div>
    </div>

</form>

@endsection

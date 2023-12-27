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

<form action="{{ route('propertys.update', $property->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="card">
        <div class="card-header">
            <div class="card-title"> Modifier une propriété </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" name="address" class="form-control" value="{{ $property->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Ville</label>
                        <input type="text" name="city" class="form-control" value="{{ $property->city }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Pays</label>
                        <input type="text" name="country" class="form-control" value="{{ $property->country }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nb_rooms" class="form-label">Nombre de chambres</label>
                        <input type="number" name="nb_rooms" class="form-control" value="{{ $property->nb_rooms }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="size" class="form-label">Taille (m²)</label>
                        <input type="number" name="size" class="form-control" value="{{ $property->size }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meublée</label>
                        <select name="furnished" class="form-control" required>
                            <option value="1" {{ $property->furnished == 1 ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ $property->furnished == 0 ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Utilisateur</label>
                        <select name="user_id" class="form-control" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $property->user_id == $user->id ? 'selected' : '' }}>{{ $user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="property_type_id" class="form-label">Property Type ID:</label>
                        <select id="property_type_id" class="form-control" name="property_type_id" required>
                            @foreach ($types as $typ)
                                <option value="{{ $typ->id }}">{{ $typ->type }} </option>
                            @endforeach 
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="postcode" class="form-label">Postcode:</label>
                        <input type="text" name="postcode" class="form-control"value="{{ $property->postcode }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success"> Submit </button>
            <button type="reset" class="btn btn-danger"> Cancel </button>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>

@endsection

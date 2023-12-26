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





<form action="{{ route('propertys.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="address2" class="form-label">Address 2:</label>
        <input type="text" name="address2" class="form-control">
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">City:</label>
        <input type="text" name="city" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="postcode" class="form-label">Postcode:</label>
        <input type="text" name="postcode" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Country:</label>
        <input type="text" name="country" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nb_rooms" class="form-label">Number of Rooms:</label>
        <input type="number" name="nb_rooms" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="size" class="form-label">Size (sqm):</label>
        <input type="number" step="0.01" name="size" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-check-label">Meublée:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="furnished" value="1" required>
            <label class="form-check-label" for="furnished">Oui</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="furnished" value="0">
            <label class="form-check-label" for="furnished">Non</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="property_type_id" class="form-label">Property Type ID:</label>
        <select id="property_type_id" class="form-control" name="property_type_id" required>
            @foreach ($types as $typ)
                <option value="{{ $typ->id }}">{{ $typ->type }} </option>
            @endforeach 
        </select>
    </div>
    <div class="form-group">
        <label for="user_id">Utilisateur :</label>
        <select id="user_id" class="form-control" name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->first_name }} </option>
            @endforeach 
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
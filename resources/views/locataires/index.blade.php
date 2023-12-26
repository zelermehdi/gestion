@extends("vendor.all-generator.layout.blanc")

@section("contenu")

<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title"> Locataires Liste </h3>
        <div class="float-end">
            <a href="{{ route("locataires.create") }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> créer un Locataire
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table border text-nowrap text-md-nowrap table-striped mb-0" id="responsive-datatable">
                <thead>
                    <tr>
                        
					
						<th> Prénom </th>
						<th> Nom </th>
						<th> Adresse </th>
						<th> Code Postal</th>
						<th> Pays </th>
						<th> Ville </th>
						<th> Email </th>
						<th> Date de naissance </th>
						<th> Lieu de naissance </th>
						<th> Nationalité </th>
						<th> Numéro de téléphone </th>
						<th> Numéro de carte d'identité </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        use App\Models\Locataire;
$locataires = Locataire::all();
$locataires = Locataire::paginate(10);
                    ?>

                    @forelse ($locataires as $locataire)
                        <tr>
                            
							<td> {{ $locataire->first_name }} </td>
							<td> {{ $locataire->last_name }} </td>
							<td> {{ $locataire->address }} </td>
							<td> {{ $locataire->postalcode }} </td>
							<td> {{ $locataire->country }} </td>
							<td> {{ $locataire->city }} </td>
							<td> {{ $locataire->email }} </td>
							<td> {{ $locataire->birth_date }} </td>
							<td> {{ $locataire->place_of_birth }} </td>
							<td> {{ $locataire->nationality }} </td>
							<td> {{ $locataire->phone_number }} </td>
							<td> {{ $locataire->idcard_number }} </td>

                            <td>
                                <a href="#" class="mx-1 text-primary"> <i class="fa fa-eye"></i> </a>
                                {{-- <a href="{{ route('locataires.edit', $locataire?->id) }}" class="mx-1 text-secondary"> <i class="fa fa-pencil"></i> </a> --}}
                                <a href="#" class="mx-1 text-danger"> <i class="fa fa-trash"></i> </a>
                            </td>

                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="13"> Pas de locataires </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer">
        <div class="clearfix d-flex justify-content-end">
            {{ $locataires->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>

@endsection

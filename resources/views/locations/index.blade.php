@extends("vendor.all-generator.layout.blanc")

@section("contenu")

<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title"> Locations Liste </h3>
        <div class="float-end">
            <a href="{{ route("locations.create") }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Create Location
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table border text-nowrap text-md-nowrap table-striped mb-0" id="responsive-datatable">
                <thead>
                    <tr>
                        
						<th> Utilisateur</th>
						<th> proprieté </th>
						<th> Le locataire</th>
						<th> Type de bail </th>
						<th> Loyer </th>
						<th> Charges </th>
						<th> Preavis </th>
						<th> Date de signature du bail </th>
						<th> Date d'entrée </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($locations as $location)
                        <tr>
                            
                            <td> {{ $location->user->first_name }} </td>
                            <td> {{ optional($location->property)->city }} </td>
                            <td> {{ $location->locataire->first_name }} </td>
                            <td> {{ $location->bail_type->type }} </td>
							<td> {{ $location->loyer }} </td>
							<td> {{ $location->charges }} </td>
							<td> {{ $location->preavis }} </td>
							<td> {{ $location->date_signature_bail }} </td>
							<td> {{ $location->date_entree }} </td>

                            <td>
                                <a href="{{ route('locations.edit', $location?->id) }}" class="mx-1 text-secondary"> <i class="fa fa-pencil"></i> </a>
                                <a href="#" class="mx-1 text-danger" onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer cette propriété ?')) { document.getElementById('delete-form-{{ $location->id }}').submit(); }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                                <form id="delete-form-{{ $location->id }}" action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')

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

                            </td>

                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="9"> No Data </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <?php
    use App\Models\Location;
$locations = Location::all();
$locations = Location::paginate(10);
?>
    <div class="card-footer">
        <div class="clearfix d-flex justify-content-end">
            {{ $locations->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>

@endsection

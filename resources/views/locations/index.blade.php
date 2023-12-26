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
                        
						<th> User_id </th>
						<th> Property_id </th>
						<th> Locataire_id </th>
						<th> Bail_type_id </th>
						<th> Loyer </th>
						<th> Charges </th>
						<th> Preavis </th>
						<th> Date_signature_bail </th>
						<th> Date_entree </th>
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
                                <a href="#" class="mx-1 text-primary"> <i class="fa fa-eye"></i> </a>
                                <a href="{{ route('locations.edit', $location?->id) }}" class="mx-1 text-secondary"> <i class="fa fa-pencil"></i> </a>
                                <a href="#" class="mx-1 text-danger"> <i class="fa fa-trash"></i> </a>
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

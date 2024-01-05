@extends("vendor.all-generator.layout.blanc")

@section("contenu")

<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title"> Liste des propriétés </h3>
        <div class="float-end">
            <a href="{{ route("propertys.create") }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> creation d'une propriété </a>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table border text-nowrap text-md-nowrap table-striped mb-0" id="responsive-datatable">
                <thead>
                    <tr>
                     
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Nombre de chambres</th>
                        <th>Code postal</th>
                        <th>Taille (m²)</th>
                        <th>Meublée</th>
                        <th>Utilisateur</th>
                        <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>

                    @forelse ($propertys as $property)
                        <tr>
                            
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->city }}</td>
                            <td>{{ $property->country }}</td>
                            <td>{{ $property->nb_rooms }}</td>
                            <td>{{ $property->postcode }}</td>
                            <td>{{ $property->size }}</td>
                            <td>{{ $property->furnished ? 'Yes' : 'No' }}</td>
                            <td> {{ optional($property->User)->last_name }} </td>

                           

                            <td>
                                <a href="{{ route('propertys.update', $property?->id) }}" class="mx-1 text-secondary"> <i class="fa fa-pencil"></i> </a>
                                <a href="#" class="mx-1 text-danger" onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer cette propriété ?')) { document.getElementById('delete-form-{{ $property->id }}').submit(); }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                                <form id="delete-form-{{ $property->id }}" action="{{ route('propertys.destroy', $property->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>


                            </td>

                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="-3"> aucune proprieté </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <?php
    use App\Models\property;
    $propertys = property::all();
    $propertys = property::paginate(10);
?>
    <div class="card-footer">
        <div class="clearfix d-flex justify-content-end">
            {{ $propertys->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>

@endsection

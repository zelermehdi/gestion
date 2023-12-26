@extends("vendor.all-generator.layout.blanc")

@section("contenu")

<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title"> BailTypes Liste </h3>
        <div class="float-end">
            <a href="{{ route("bailtypes.create") }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Create BailType
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table border text-nowrap text-md-nowrap table-striped mb-0" id="responsive-datatable">
                <thead>
                    <tr>
                        <th> type de bail</th>

                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($bailTypes as $bailtype)
                        <tr>
                            
                            <td>{{ $bailtype->type }}</td>

                            <td>
                                <a href="#" class="mx-1 text-primary"> <i class="fa fa-eye"></i> </a>
                                <a href="{{ route('bailtypes.edit', $bailtype?->id) }}" class="mx-1 text-secondary"> <i class="fa fa-pencil"></i> </a>
                                <a href="#" class="mx-1 text-danger"> <i class="fa fa-trash"></i> </a>
                            </td>

                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="-3"> No Data </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <?php
    use App\Models\BailType;
$bailtypes = BailType::all();
$bailtypes = BailType::paginate(10);
?>
    <div class="card-footer">
        <div class="clearfix d-flex justify-content-end">
            {{ $bailtypes->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>

@endsection

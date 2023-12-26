@extends("vendor.all-generator.layout.blanc")

@section("contenu")

<form action="{{ route('propertys.update', $property->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="card">
        <div class="card-header">
            <div class="card-title"> propertys Liste </div>
        </div>

        <div class="card-body">
            <div class="row">

                @include('propertys.partials.form')

            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success"> Submit </button>
            <button type="reset" class="btn btn-danger"> Cancel </button>
        </div>
    </div>

</form>

@endsection

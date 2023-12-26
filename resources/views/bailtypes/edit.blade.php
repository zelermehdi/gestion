@extends("vendor.all-generator.layout.blanc")

@section("contenu")

<form action="{{ route('bailtypes.update', $bailtype->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="card">
        <div class="card-header">
            <div class="card-title"> BailTypes Liste </div>
        </div>

        <div class="card-body">
            <div class="row">

                @include('bailtypes.partials.form')

            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success"> Submit </button>
            <button type="reset" class="btn btn-danger"> Cancel </button>
        </div>
    </div>

</form>

@endsection

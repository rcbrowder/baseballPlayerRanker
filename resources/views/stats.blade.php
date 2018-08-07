@extends ('layouts.app')

@section('content')

    <div id="statspage" class="container-fluid content">

        <stats-table :play="{{ $play->toJson() }}"></stats-table>

    </div>


@endsection

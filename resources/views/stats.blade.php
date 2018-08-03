@extends ('layouts.app')

@section('content')

<div id="statspage" class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col col-sm-2 navbar navbar-expand-sm navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#catNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-dark" id="catNav">
                <div class="navbar-nav">
                    <ul>
                        <batter-buttons></batter-buttons>
                    </ul>
                </div>
            </div>
        </nav>

        <stats-table :stats="{{ $stats->toJson() }}"></stats-table>

        <div id="display" class="col col-sm-9">
        </div>
    </div>
</div>

@endsection

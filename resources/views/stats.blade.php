@extends ('layouts.app')

@section('content')

<div id="statspage" class="container-fluid">
    <div class="row h-100">
        <nav id="sidebar" class="navbar navbar-expand-sm navbar-dark col-md-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-dark" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div id="display" class="col">
        </div>
    </div>
</div>


    <!-- <div id="categorySelector">

        <div class="btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active">
                <input type="checkbox" checked autocomplete="off">Runs
            </label>
        </div>

    </div>

    <div id="display" class="d-flex">



    </div> -->

@endsection

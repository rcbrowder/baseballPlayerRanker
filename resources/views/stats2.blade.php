@extends ('layouts.app')

@section('content')
<div id="statspage" class="container-fluid content">
    <div class="row">
        <form id="buttongroup" class="col col-sm-2 btn-group-vertical btn-group-toggle ml-2">

            <label class="btn btn-secondary" :class="{active: toggle.indexOf('PA') > -1}">
                <input type="checkbox" v-model="toggle" autocomplete="off" name="PA" value="PA">{{ $categories[0] }}
            </label>

            <label class="btn btn-secondary" :class="{active: toggle.indexOf('LOB') > -1}">
                <input type="checkbox" v-model="toggle" autocomplete="off" name="LOB" value="LOB">{{ $categories[1] }}
            </label>

            <label class="btn btn-secondary" :class="{active: toggle.indexOf('AB') > -1}">
                <input type="checkbox" v-model="toggle" autocomplete="off" name="AB" value="AB">{{ $categories[2] }}
            </label>

            <button id="submitStats" method="get" action="/stats" type="submit" class="submitStats btn btn-outline-success mt-2">Refresh</button>
        </form>




        <!-- <nav id="sidebar" class="col col-sm-2 navbar navbar-expand-sm navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#catNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-dark" id="catNav">
                <div class="navbar-nav">


                    <ul>
                        <batter-buttons :categories="{{ $categories->toJson() }}"></batter-buttons>
                    </ul>
                </div>
            </div>
        </nav> -->

        <div id="display" class="col col-sm-9 text-center">

            <stats-table :totalArray="{{ $totalArray->toJson() }}" :players="{{ $players->toJson() }}" :categories="{{ $categories->toJson() }}" :zscoreArray="{{ $zscoreArray->toJson() }}"></stats-table>

        </div>
    </div>
</div>


@endsection

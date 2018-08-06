@extends ('layouts.app')

@section('content')
<div id="statspage" class="container-fluid content">
    <div class="row">
        <div class="col col-sm-2 btn-group-vertical btn-group-toggle ml-2" data-toggle="buttons">
            <button type="button" class="btn btn-secondary">
                <label>
                    <input type="checkbox" v-model="toggle1" true-value="1" false-value="0" autocomplete="off" name="">{{ $categories[0] }}
                </label>
            </button>
            <button type="button" class="btn btn-secondary">
                <label>
                    <input type="checkbox" v-model="toggle2" true-value="1" false-value="0" autocomplete="off" name="">{{ $categories[1] }}
                </label>
            </button>
            <button type="button" class="btn btn-secondary">
                <label>
                    <input type="checkbox" v-model="toggle3" true-value="1" false-value="0" autocomplete="off" name="">{{ $categories[2] }}
                </label>
            </button>
        </div>


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

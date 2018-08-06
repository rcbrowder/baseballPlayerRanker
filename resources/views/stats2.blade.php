@extends ('layouts.app')

@section('content')
<div id="statspage" class="container-fluid content">
    <div class="row">
        <form id="buttongroup" class="col col-sm-2 btn-group-vertical btn-group-toggle ml-2">

            <label class="btn btn-secondary" :class="{active: toggle.indexOf('PA') > -1}">
                <input type="checkbox" v-model="toggle" autocomplete="off" name="PA" value="PA">AB
            </label>

            <label class="btn btn-secondary" :class="{active: toggle.indexOf('LOB') > -1}">
                <input type="checkbox" v-model="toggle" autocomplete="off" name="LOB" value="LOB">LOB
            </label>

            <label class="btn btn-secondary" :class="{active: toggle.indexOf('AB') > -1}">
                <input type="checkbox" v-model="toggle" autocomplete="off" name="AB" value="AB">PA
            </label>

            <button id="submitStats" method="get" action="/stats" type="submit" class="submitStats btn btn-outline-success mt-2">Refresh</button>
        </form>

        <div id="display" class="col col-sm-9 text-center">

            <stats-table :play="{{ $play->toJson() }}"></stats-table>

        </div>
    </div>
</div>


@endsection

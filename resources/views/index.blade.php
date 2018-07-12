@extends('layouts.app')

@section('content')
<div class="d-flex flex-wrap h-100">

    <div id="batterCol" class="flex-fill outerdiv">
        <a href="{{ url('/batters') }}"><button type="button" class="btn btn-secondary btn-lg rounded-0 boarder boarder-dark myButtons"><strong>Batters</strong></button></a>
        <div id="batterBG" class="grow"></div>

    </div>

    <div id="pitcherCol" class="flex-fill outerdiv">
        <a href="{{ url('/pitchers') }}"><button type="button" class="btn btn-secondary btn-lg rounded-0 boarder boarder-dark myButtons" href="/pitchers"><strong>Pitchers</strong></button></a>
        <div id="pitcherBG" class="grow"></div>
    </div>
</div>
@endsection

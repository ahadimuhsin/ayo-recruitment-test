@extends('layouts.app')

@section('title')
Report Pertandingan {{ $match->home_team->name }} vs {{ $match->away_team->name }}
@endsection

@push('custom-style')
<style>
    /* .center {


        position: absolute;


        left: 50%;


        top: 50%;


        transform: translate(-50%, -50%);


    } */
</style>
@endpush

@section('content')

{{-- Card --}}
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h1>Report Pertandingan {{ $match->home_team->name }} vs {{ $match->away_team->name }}</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-3">
                        <h2 class="text-center mb-1">{{ $match->home_team->name }}</h2>
                        <img src="{{ asset('storage/'. $match->home_team->logo) }}"
                        alt="Logo {{ $match->home_team->name }}" height="100" width="100" style="margin-left: 190px">
                        <h1 style="margin-left: 230px; font-size: 200%" class="mt-1">{{ $score_home->home_team_goals }}</h1>

                        <div class="mt-3 text-center">
                            @foreach ($goal_scorers as $item)
                            <p>{{ $item->home_goal_scorer }} {{ $item->home_goal_scorer != null ? 'menit' : '' }} {{ $item->goal_home_minutes }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2">
                    VS
                </div> --}}
                <div class="col-md-6">
                    <div class="mt-3">
                        <h2 class="text-center mb-1">{{ $match->away_team->name }}</h2>
                        <img src="{{ asset('storage/'. $match->away_team->logo) }}"
                        alt="Logo {{ $match->away_team->name }}" height="100" width="100" style="margin-left: 190px">
                        <h1 style="margin-left: 230px; font-size: 200%" class="mt-1">{{ $score_away->away_team_goals }}</h1>

                        <div class="mt-3 text-center">
                            @foreach ($goal_scorers as $item)
                            <p>{{ $item->away_goal_scorer }} menit {{ $item->goal_away_minutes }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end card -->
</div>
<!-- end col -->
</div>
@endsection

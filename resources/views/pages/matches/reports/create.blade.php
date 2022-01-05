@extends('layouts.app')

@section('title')
Report Pertandingan {{ $match->home_team->name }} vs {{ $match->away_team->name }}
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>Tambah Report Pertandingan {{ $match->home_team->name }} vs {{ $match->away_team->name }} tanggal {{ date("d F Y", strtotime($match->date)) }}</h2>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<div class="row">
    <div class="col-lg-12">
        @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                {{-- <span aria-hidden="true">&times;</span> --}}
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('matches.report.store', $match->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-style mb-30">
                <h6 class="mb-25">Tim Tuan Rumah</h6>
                <div class="input-style-1">
                    {{-- <label>Tanggal</label> --}}
                    <input type="text" name="match_id" value="{{ $match->id }}" hidden>
                    <input type="text" name="home_team_id" id="home_team_id" value="{{ $match->home_team->id }}" hidden>
                    <input type="text" name="away_team_id" id="away_team_id" value="{{ $match->away_team->id }}" hidden>
                </div>
                <div class="row add_field mb-5">
                    <div class="col-md-3">
                        <label class="form-label" for="home_team_scorer">Pencetak Gol Tim Tuan Rumah</label>
                        <div class="mb-3">
                            <div class="input-group">
                                <select name="home_team_scorer[]" class="form-control">
                                    <option value="">Pencetak Gol</option>
                                    @foreach ($home_players as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="home_team_goal_minutes">Menit Gol</label>
                            <input type="number" name="home_team_goal_minutes[]" id="home_team_goal_minutes" class="form-control" placeholder="1-120" min="1" max="120">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mt-4">
                        <a type="button" class="btn btn-primary btn-sm add_button"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>

                <hr>
                <h6 class="mb-25 mt-5">Tim Tamu</h6>
                <div class="row add_field_away">
                    <div class="col-md-3">
                        <label class="form-label" for="away_team_scorer">Pencetak Gol Tim Tamu</label>
                        <div class="mb-3">
                            <div class="input-group">
                                <select name="away_team_scorer[]" class="form-control">
                                    <option value="">Pencetak Gol</option>
                                    @foreach ($away_players as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="away_team_goal_minutes">Menit Gol</label>
                            <input type="number" name="away_team_goal_minutes[]" id="away_team_goal_minutes" class="form-control" placeholder="1-120" min="1" max="120">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mt-4">
                        <a type="button" class="btn btn-primary btn-sm add_button_away"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="input-style-1 mt-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- end input -->
            </div>
        </form>
    </div>
</div>
@endsection

@push('custom-script')
<script>
    $(function(){
        addFieldTuanRumah();
        addFieldAway();
    });

    function addFieldTuanRumah()
    {
        let max_fields = 100;
        let wrapper = $(".add_field");
        let add_button = $(".add_button");

        let x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append(
                    `<div class="row row-${x}" style="margin-left: 2px">
                        <div class="col-md-3">
                            <label class="form-label" for="bulan">Pencetak Gol Tim Tuan Rumah</label>
                            <div class="mb-3">
                                <div class="input-group">
                                    <select name="home_team_scorer[]" class="form-control">
                                    <option value="">Pencetak Gol</option>
                                    @foreach ($home_players as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="home_team_goal_minutes">Menit Gol</label>
                            <input type="number" name="home_team_goal_minutes[]" id="home_team_goal_minutes" class="form-control" placeholder="1-120" min="1" max="120">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-4">
                            <a type="button" class="btn btn-primary btn-sm remove_field"><i class="lni lni-minus"></i></a>
                            </div>
                        </div>
                    </div>`
                )
            }
            else{
                window.alert("Kebanyakan!!");
            }
        });

        $(wrapper).on("click", ".remove_field", function(e){
            e.preventDefault();
            // console.log(this);
            $(this).parent('div').parent('div').parent('div').remove();
            x--;
        });
    }

    function addFieldAway()
    {
        let max_fields = 100;
        let wrapper = $(".add_field_away");
        let add_button = $(".add_button_away");

        let x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append(
                    `<div class="row row-${x}" style="margin-left: 2px">
                        <div class="col-md-3">
                            <label class="form-label" for="away_team_scorer">Pencetak Gol Tim Tamu</label>
                            <div class="mb-3">
                                <div class="input-group">
                                    <select name="away_team_scorer[]" class="form-control">
                                    <option value="">Pencetak Gol</option>
                                    @foreach ($away_players as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="away_team_goal_minutes">Menit Gol</label>
                            <input type="number" name="away_team_goal_minutes[]" id="away_team_goal_minutes" class="form-control" placeholder="1-120" min="1" max="120">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-4">
                            <a type="button" class="btn btn-primary btn-sm remove_field_away"><i class="lni lni-minus"></i></a>
                            </div>
                        </div>
                    </div>`
                )
            }
            else{
                window.alert("Kebanyakan!!");
            }
        });

        $(wrapper).on("click", ".remove_field_away", function(e){
            e.preventDefault();
            // console.log(this);
            $(this).parent('div').parent('div').parent('div').remove();
            x--;
        });
    }
</script>
@endpush

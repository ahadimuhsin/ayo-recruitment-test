@extends('layouts.app')

@section('title')
Tambah Jadwal Pertandingan
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>Tambah Jadwal Pertandingan</h2>
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
        <form action="{{ route('matches.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-style mb-30">
                {{-- <h6 class="mb-25">Input Fields</h6> --}}
                <div class="input-style-1">
                    <label>Tanggal</label>
                    <input type="text" name="date" id="date" placeholder="Tanggal Pertandingan" class="form-control" value="{{ old('date') }}">
                </div>
                <div class="input-style-1">
                    <label>Waktu</label>
                    <input type="time" name="time" class="form-control" value="{{ old('time') }}">
                </div>
                <div class="input-style-1">
                    <label>Tim Tuan Rumah</label>
                    <select name="home_team_id" id="home_team_id" class="form-control">
                        <option value="">Pilih Tim Tuan Rumah</option>
                        @foreach ($teams as $item)
                        <option value="{{ $item->id }}" {{ old('home_team_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-style-1">
                    <label>Tim Tamu</label>
                    <select name="away_team_id" id="away_team_id" class="form-control">
                        <option value="">Pilih Tim Tamu</option>
                        @foreach ($teams as $item)
                        <option value="{{ $item->id }}" {{ old('away_team_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-style-1">
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
        $("#date").datepicker({
            format: "d-mm-yyyy",
            autoclose: true
        });
    });
</script>
@endpush

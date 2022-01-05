@extends('layouts.app')

@section('title')
Tambah Pemain
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>Tambah Pemain Tim {{ $team->name }}</h2>
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
        <form action="{{ route('teams.player.store', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-style mb-30">
                {{-- <h6 class="mb-25">Input Fields</h6> --}}
                <div class="input-style-1">
                    <label>Nama Pemain</label>
                    <input type="text" name="name" placeholder="Nama Pemain" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="input-style-1">
                    <label>Tinggi Badan (cm)</label>
                    <input type="number" name="height" class="form-control" placeholder="Tinggi Badan" value="{{ old('height') }}">
                </div>
                <div class="input-style-1">
                    <label>Berat (kg)</label>
                    <input type="number" name="weight" id="weight" class="form-control" placeholder="Berat badan" value="{{ old('weight') }}">
                </div>
                <div class="input-style-1">
                    <label>Position</label>
                    <select name="position" id="position" class="form-control">
                        <option value="">Pilih Posisi</option>
                        <option value="attacker">Penyerang</option>
                        <option value="midfielder">Gelandang</option>
                        <option value="defender">Bek</option>
                        <option value="goalkeeper">Kiper</option>
                    </select>
                </div>
                <div class="input-style-1">
                    <label>Nomor Punggung</label>
                    <input type="number" name="number" id="number" placeholder="Nomor Punggung" class="form-control" value="{{ old('number') }}">
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

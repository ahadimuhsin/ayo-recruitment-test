@extends('layouts.app')

@section('title')
Edit Tim {{ $team->name }}
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>Edit Tim {{ $team->name }}</h2>
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
        <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-style mb-30">
                {{-- <h6 class="mb-25">Input Fields</h6> --}}
                <div class="input-style-1">
                    <label>Nama Tim</label>
                    <input type="text" name="name" placeholder="Nama Tim" class="form-control" value="{{ $team->name }}">
                </div>
                <div class="input-style-1">
                    <label>Logo <span><small><a href="{{ asset('storage/'. $team->logo) }}" target="_blank">(logo sebelumnya)</a></small></span></label>
                    <input type="file" name="logo" class="form-control">
                </div>
                <div class="input-style-1">
                    <label>Tahun Berdiri</label>
                    <input type="text" id="year_founded" name="year_founded" min="1700" max="2022" step="1"
                        class="form-control" placeholder="Tahun Tim Berdiri" value="{{ $team->year_founded }}">
                </div>
                <div class="input-style-1">
                    <label>Alamat</label>
                    <textarea name="address" id="address" cols="10" rows="5" placeholder="Alamat Tim"
                        class="form-control">{{ $team->address }}</textarea>
                </div>
                <div class="input-style-1">
                    <label>Kota</label>
                    <input type="text" name="city" id="city" placeholder="Kota Asal Tim" class="form-control" value="{{ $team->city }}">
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
        $("#year_founded").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
        });
    });
</script>
@endpush

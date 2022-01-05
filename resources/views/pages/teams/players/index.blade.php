@extends('layouts.app')

@section('title')
    List Pemain Tim {{ $team->name }}
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          {{-- <h2 class="mr-40">List Tim</h2> --}}
          <a href="{{ route('teams.player.create', $team->id) }}" class="main-btn primary-btn btn-hover btn-sm">
            <i class="lni lni-plus mr-5"></i> Tambah Pemain</a>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
</div>
  {{-- Card --}}
  <div class="row">
    <div class="col-lg-12">
      <div class="card-style mb-30">
          <h1>Daftar Pemain {{ $team->name }}</h1>
        <div class="table-wrapper table-responsive mt-5">
          <table class="table">
            <thead>
              <tr>
                <th><h6>Nama</h6></th>
                <th><h6>Tinggi</h6></th>
                <th><h6>Berat</h6></th>
                <th><h6>Posisi</h6></th>
                <th><h6>Nomor Punggung</h6></th>
                {{-- <th><h6>Aksi</h6></th> --}}
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
                @forelse ($players as $key => $item )
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->height }} cm</td>
                    <td>{{ $item->weight }} kg</td>
                    <td>
                        @if ($item->position == 'attacker')
                        Penyerang
                        @elseif ($item->position == 'midfielder')
                        Gelandang
                        @elseif ($item->position == 'defender')
                        Bek
                        @else
                        Kiper
                        @endif
                    </td>
                    <td>
                        {{ $item->number }}
                    </td>
                    {{-- <td>Aksi</td> --}}
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="6">Data Kosong</td>
                </tr>
                @endforelse
            </tbody>
          </table>
          <!-- end table -->
        </div>
        {{-- <div class="mt-5">
            Menampilkan {{$teams->count()}} data dari {{ $teams->total() }} data
            <div class="d-flex justify-content-center ">
            {{ $teams->appends(request()->input())->links() }}
        </div> --}}
    </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
  </div>
@endsection

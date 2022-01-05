@extends('layouts.app')

@section('title')
    Jadwal Pertandingan
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          {{-- <h2 class="mr-40">List Tim</h2> --}}
          <a href="{{ route('matches.create') }}" class="main-btn primary-btn btn-hover btn-sm">
            <i class="lni lni-plus mr-5"></i> Tambah Pertandingan</a>
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
          <h1>Jadwal Pertandingan</h1>
        <div class="table-wrapper table-responsive mt-5">
          <table class="table">
            <thead>
              <tr>
                <th><h6>Tanggal</h6></th>
                <th><h6>Waktu</h6></th>
                <th><h6>Tim Tuan Rumah</h6></th>
                <th><h6>Tim Tamu</h6></th>
                <th><h6>Status</h6></th>
                <th><h6>Aksi</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
                @forelse ($matches as $key => $item )
                <tr>
                    {{-- <td>{{ $item->firstItem() + $key }}</td> --}}
                    <td>{{ date("d F Y", strtotime($item->date)) }}</td>
                    <td>{{ $item->time }}</td>
                    <td>{{ $item->home_team->name }}</td>
                    <td>{{ $item->away_team->name }}</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge bg-success">Selesai</span>
                        @else
                        <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 1)
                        <a href="{{ route('matches.report.detail', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        @else
                        <a href="{{ route('matches.report.create', $item->id) }}" class="btn btn-secondary btn-sm">Tambah Report</a>
                        @endif
                    </td>
                    {{-- <td>
                        <a href="{{ route('matches.player.index', $item->id) }}" class="btn btn-secondary btn-sm">List Pemain</a>
                        <a href="{{ route('matches.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form style="display: inline-block"
                        action="{{ route('matches.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit"
                            onclick="return confirm('Anda yakin menghapus tim {{ $item->name }}?')">
                            Hapus</button>
                        </form>
                    </td> --}}
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
        <div class="mt-5">
            Menampilkan {{$matches->count()}} data dari {{ $matches->total() }} data
            <div class="d-flex justify-content-center ">
            {{ $matches->appends(request()->input())->links() }}
        </div>
    </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
  </div>
@endsection

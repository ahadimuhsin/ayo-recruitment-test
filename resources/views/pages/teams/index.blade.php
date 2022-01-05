@extends('layouts.app')

@section('title')
    List Teams
@endsection

@section('content')
{{-- Title --}}
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          {{-- <h2 class="mr-40">List Tim</h2> --}}
          <a href="{{ route('teams.create') }}" class="main-btn primary-btn btn-hover btn-sm">
            <i class="lni lni-plus mr-5"></i> Tambah Tim</a>
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
          <h1>Daftar Tim</h1>
        <div class="table-wrapper table-responsive mt-5">
          <table class="table">
            <thead>
              <tr>
                <th><h6>Nama</h6></th>
                <th><h6>Logo</h6></th>
                <th><h6>Tahun Berdiri</h6></th>
                <th><h6>Alamat</h6></th>
                <th><h6>Kota</h6></th>
                <th><h6>Aksi</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
                @forelse ($teams as $key => $item )
                <tr>
                    {{-- <td>{{ $item->firstItem() + $key }}</td> --}}
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ asset('storage/'. $item->logo) }}" alt="Logo {{ $item->name }}" width="50" height="50"></td>
                    <td>{{ $item->year_founded }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->city }}</td>
                    <td>
                        <a href="{{ route('teams.player.index', $item->id) }}" class="btn btn-secondary btn-sm">List Pemain</a>
                        <a href="{{ route('teams.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form style="display: inline-block"
                        action="{{ route('teams.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit"
                            onclick="return confirm('Anda yakin menghapus tim {{ $item->name }}?')">
                            Hapus</button>
                        </form>
                    </td>
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
            Menampilkan {{$teams->count()}} data dari {{ $teams->total() }} data
            <div class="d-flex justify-content-center ">
            {{ $teams->appends(request()->input())->links() }}
        </div>
    </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
  </div>
@endsection

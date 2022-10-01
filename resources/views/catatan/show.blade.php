@extends('starter')

@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Data Catatan Perjalanan</h1>

                    @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif

                    <a href="{{ url('catatan/create') }}" class="btn btn-success">Tambah +</a>

                    <!-- table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Suhu Tubuh</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catatan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->waktu }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->suhu_tubuh }}</td>
                                <td>
                                    <a href="{{ url('catatan/edit',$item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('catatan/delete',$item->id) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
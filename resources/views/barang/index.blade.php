@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {!! session('success') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
        @if(auth()->user())
            <div>
                <a href="{{ route('barang.create') }}" class="btn tambah--barang">Tambah Barang</a>
            </div>
        @endif
            <table class="table table-light table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col" width="1%">#</th>
                        <th class="text-center" scope="col">Nama Barang</th>
                        <th class="text-center" scope="col" width="70">Stok</th>
                        <th class="text-center" scope="col">Supplier</th>
                        @if(auth()->user())
                            <th class="text-center" scope="col">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(count($barangs))
                        @foreach ($barangs as $barang)
                        <tr>
                            <td scope="row">{{ $barang->id}}</td>
                            <td>{{ $barang->name}}</td>
                            <td class="text-right">{{ $barang->stok}}</td>
                            <td>{{ $barang->supplier}}</td>
                            @if(auth()->user())
                                <td class="action">
                                    <form action="{{ route('barang.destroy',$barang->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('barang.edit',$barang->id) }}">Edit</a>

                                        @if(auth()->user()->role == 'admin')
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        @endif
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="{{ auth()->user() ? '5' : '4' }}">Tidak ada data.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<style>
    .tambah--barang {
        float: right;
        margin-bottom: 1.5rem;
        background-color: #fbae17 !important;
        color: white !important;
        font-weight: 600 !important;
    }

    td form {
        margin-bottom: 0;
    }

    td.action {
        width: 1px;
        white-space: nowrap;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Barang') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('barang.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">{{ __('Nama Barang') }}</label>
                                    <div>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="stok" class="col-form-label">{{ __('Stok') }}</label>
                                    <div>
                                        <input id="stok" type="number" min="1" value="1" class="form-control @error('stok') is-invalid @enderror" name="stok" required autocomplete="current-stok">

                                        @error('stok')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="supplier" class="col-form-label">{{ __('Supplier') }}</label>
                                    <div>
                                        <input id="supplier" type="text" class="form-control @error('supplier') is-invalid @enderror" name="supplier" required autocomplete="current-supplier">

                                        @error('supplier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    button {
        float: right;
        margin-top: 30px !important;
    }
</style>

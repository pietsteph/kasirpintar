@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Barang') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-0">
                                    <label for="email" class="col-form-label">{{ __('Nama Barang') }}</label>
                                    <div>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $barang->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-0">
                                    <label for="supplier" class="col-form-label">{{ __('Supplier') }}</label>
                                    <div>
                                        <input id="supplier" type="text" class="form-control @error('supplier') is-invalid @enderror" name="supplier" value="{{ $barang->supplier }}" required autocomplete="current-supplier">

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

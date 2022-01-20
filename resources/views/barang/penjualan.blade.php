@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Penjualan Barang') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('barang.penjualan.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-0">
                                    <label for="email" class="col-form-label">{{ __('Barang') }}</label>
                                    <div>
                                        <select name="barang_id" id="barang_id" class="form-control" onchange="validate()">
                                            <option value="">--- Pilih Barang ---</option>
                                            @foreach ($barangs as $barang)
                                                <option value="{{ $barang->id }}" stok="{{ $barang->stok }}">{{ $barang->name }} (stok: {{ $barang->stok }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-0">
                                    <label for="amount" class="col-form-label">{{ __('Jumlah') }}</label>
                                    <div>
                                        <input id="amount" type="number" min="1" value="1" class="form-control @error('amount') is-invalid @enderror" name="amount" required autocomplete="current-amount">

                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button id="submit" type="submit" class="btn btn-primary" disabled>Submit</button>
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

<script>
    function validate(e){
        var disableButton = false;
        var selectElement = document.getElementById("barang_id");
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var input = document.getElementById("amount");

        if(selectedOption.value){
            var stok = selectedOption.getAttribute('stok');
            input.setAttribute("max", stok);
        }
        else{
            input.removeAttribute("max");
            disableButton = true;
        }
        input.value = 1;

        var button = document.getElementById("submit");
        if(!disableButton){
            button.removeAttribute('disabled');
        }
    }
</script>

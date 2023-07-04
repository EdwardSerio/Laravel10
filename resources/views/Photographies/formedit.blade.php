@extends('layouts.app')

@section('content')
    <h3>Form Edit Penyewa</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('Photographies') }}'">
                Kembali
            </button>        
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('Photographies/'.$txtid) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="txtid" class="col-sm-2 col-form-label">ID Penyewa</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm @error('txtid') is-invalid @enderror" 
                        id="txtid" name="txtid" value="{{ $txtid }}" readonly>
                      @error('txtid')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtfullname" class="col-sm-2 col-form-label">Nama Penyewa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm @error('txtfullname') is-invalid @enderror"
                      id="txtfullname" name="txtfullname" value="{{ $txtfullname }}">
                    </div>
                      @error('txtfullname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                </div>
                <div class="row mb-3">
                    <label for="txtaddress" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="txtaddress" id="txtaddress" cols="50" rows="5">{{ $txtaddress }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtgender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                      <select class="form-select form-control-sm" name="txtgender" id="txtgender">
                        <option value="" selected>-Pilih-</option>
                        <option value="M" {{ $txtgender == 'M' ? 'selected' : '' }}>Male</option>
                        <option value="F" {{ $txtgender == 'F' ? 'selected' : '' }}>Female</option>
                      </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtphone" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-4">
                        <input type="text" name="txtphone" id="txtphone" class="form-control form-control-sm @error('txtphone') is-invalid @enderror" value="{{ $txtphone }}">
                        @error('txtphone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-sm btn-success">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

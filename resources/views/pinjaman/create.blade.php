@extends('layouts.app')

@section('title', 'Tambah Data Pinjaman')

@section('content')
<div class="form-container">
    <h2 class="mb-4">Tambah Data Pinjaman</h2>
    <form action="{{ route('pinjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_nasabah" class="form-label">Nasabah</label>
            <select name="id_nasabah" class="form-select" required>
                <option value="" disabled selected>Pilih Nasabah</option>
                @foreach($nasabah as $n)
                    <option value="{{ $n->id_nasabah }}">{{ $n->nik }} - {{ $n->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_jenis_pinjaman" class="form-label">Jenis Pinjaman</label>
            <select name="id_jenis_pinjaman" class="form-select" required>
                <option value="" disabled selected>Pilih Jenis Pinjaman</option>
                @foreach($jenisPinjaman as $jp)
                    <option value="{{ $jp->id_jenis_pinjaman }}">{{ $jp->nama_pinjaman }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="total_pinjaman" class="form-label">Total Pinjaman</label>
            <input type="number" name="total_pinjaman" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tenor" class="form-label">Tenor</label>
            <input type="number" name="tenor" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

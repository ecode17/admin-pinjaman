@extends('layouts.app')

@section('title', 'Edit Data Pinjaman')

@section('content')
<div class="form-container">
    <h2 class="mb-4">Edit Data Pinjaman</h2>
    <form action="{{ route('pinjaman.update', $pinjaman->id_pinjaman) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_nasabah" class="form-label">Nasabah</label>
            <select name="id_nasabah" class="form-select" required>
                @foreach($nasabah as $n)
                    <option value="{{ $n->id_nasabah }}" {{ $n->id_nasabah == $pinjaman->id_nasabah ? 'selected' : '' }}>
                        {{ $n->nik }} - {{ $n->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_jenis_pinjaman" class="form-label">Jenis Pinjaman</label>
            <select name="id_jenis_pinjaman" class="form-select" required>
                @foreach($jenisPinjaman as $jp)
                    <option value="{{ $jp->id_jenis_pinjaman }}" {{ $jp->id_jenis_pinjaman == $pinjaman->id_jenis_pinjaman ? 'selected' : '' }}>
                        {{ $jp->nama_pinjaman }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="total_pinjaman" class="form-label">Total Pinjaman</label>
            <input type="number" name="total_pinjaman" class="form-control" value="{{ $pinjaman->total_pinjaman }}" required>
        </div>
        <div class="mb-3">
            <label for="tenor" class="form-label">Tenor</label>
            <input type="number" name="tenor" class="form-control" value="{{ $pinjaman->tenor }}" required>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

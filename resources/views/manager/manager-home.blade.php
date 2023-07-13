@extends('layouts.dashboard')

@section('container')

@section('page-title', 'Home-Manager')

<div class="row">
    {{-- Selamat datang (nama user) --}}
    <h3 style="margin-left: 10px">Selamat datang</h3> <h3 style="color: #53bd33; margin-left: 10px">{{ $user->nama_pegawai }}</h3>
    <br>
</div>

@endsection
@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('body-class')
services-details-page
@endsection

@section('main-content')
<!-- Template Main Tabel CSS File -->
<link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

<section id="hero" class="hero">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('WelcomePage') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!--End Page Title -->
    <section class="section dashboard">
        <div class="row">

            <!--Isi Content-->
            <div class="card p-4">
                @php
                $userName = Auth::user()->name;
                $words = explode(' ', $userName);
                $wordCount = count($words);
                $firstWords = implode(' ', array_slice($words, 0, $wordCount - 1));
                $lastWord = '<strong>' . end($words) . '</strong>';
                @endphp

                <h5>Nama: {!! $firstWords !!} {!! $lastWord !!}</h5>

                <h5>NPWP Perusahaan: {{ Auth::user()->npwp_pkp }}</h5>
                <h5>Nama Perusahaan: {{ Auth::user()->pkp()->nama_pkp }}</h5>
                <h5>Alamat: Kabupaten Batang, <strong>Jawa Tengah</strong></h5>
                <h5>Login: {{ Auth::user()->nama_user }}</h5>
                <h5>Role: Administrator</h5>
                <h5>Koneksi: Web Server</h5>
            </div>
        </div>
        </div>
    </section>
    <!--End Content -->

    </div>
    @endsection

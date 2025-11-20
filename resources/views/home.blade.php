@extends('layouts.app')

@section('content')
    {{--
    Struktur baru, meng-include partials
    sesuai file index.html (V2)
    --}}

    @include('partials.hero', ['biodata' => $biodata])
    @include('partials.about', ['biodata' => $biodata])
    @include('partials.skills', ['keahlian' => $keahlian])
    @include('partials.pendidikan', ['pendidikan' => $pendidikan])
    @include('partials.projects', ['proyek' => $proyek])
    @include('partials.contact', ['biodata' => $biodata])

@endsection

@extends('layouts.app')

<script>
    function portfolioData() {
        return {
            selectedProject: null,
            allProjects: @json($proyek)
        }
    }
</script>


@section('content')
    <div
        class="flex flex-col min-h-screen"
        x-data="portfolioData()" {{-- <-- INI PERUBAHAN UTAMANYA --}}
    >

        @include('partials.navbar')

        <main
            class="flex-grow"
            @scroll.window="selectedProject = null"
        >
            @include('partials.hero', ['biodata' => $biodata])
            @include('partials.whatidoffer', ['keahlian' => $keahlian])
            @include('partials.about', ['biodata' => $biodata])
            @include('partials.pendidikan', ['pendidikan' => $pendidikan])

            @include('partials.projects', ['proyek' => $proyek])

            @include('partials.cta')
            @include('partials.contact', ['biodata' => $biodata])
        </main>

        @include('partials.footer', ['biodata' => $biodata])

        @include('partials.project-modal')

    </div>
@endsection

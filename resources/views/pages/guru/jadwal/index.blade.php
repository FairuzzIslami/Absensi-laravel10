@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">

        {{-- Judul --}}
        <h1 class="h3 mb-4 fw-bold">
            <i class="fa-solid fa-calendar-days me-2"></i> Jadwal Mengajar Saya
        </h1>

        <div class="row g-3 justify-content-center">
            @php
                $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat'];
                $slotColors = ['#E3F2FD','#E8F5E9','#FFF3E0','#FFEBEE','#F3E5F5'];
            @endphp

            @foreach ($hariList as $index => $hari)
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm h-100 border-0 rounded-3">

                        {{-- Header --}}
                        <div class="card-header text-center text-white fw-bold p-2"
                             style="background-color:#4e73df; border-top-left-radius:0.75rem; border-top-right-radius:0.75rem;">
                            {{ $hari }}
                        </div>

                        {{-- Body --}}
                        <div class="card-body p-3">
                            @php
                                $jadwalHariIni = $jadwal->where('hari', $hari);
                            @endphp

                            @if ($jadwalHariIni->isEmpty())
                                <p class="text-muted text-center my-3 small">Tidak ada jadwal</p>
                            @else
                                @foreach ($jadwalHariIni as $i => $j)
                                    <div class="jadwal-slot p-3 mb-3 rounded shadow-sm text-center position-relative"
                                         style="background-color: {{ $slotColors[$i % count($slotColors)] }};"
                                         data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="Guru: {{ $j->guru->username }} | {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}">
                                        <strong>{{ $j->kelas->kelas }} - {{ strtoupper($j->kelas->jurusan) }}</strong>
                                        <small class="d-block mt-1">
                                            <i class="fa-regular fa-clock me-1"></i>
                                            {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                                        </small>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                @if ($index == 2)
                    <div class="w-100 d-none d-md-block"></div>
                @endif
            @endforeach
        </div>

    </div>
</section>


<style>
.card-body p {
    font-size: 0.95rem;
}
.card-body .jadwal-slot {
    font-size: 0.9rem;
    transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s;
    cursor: default;
}

/* Hover effect modern flat */
.card-body .jadwal-slot:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    background-color: #d0d9ff;
}

/* Tooltip fix */
[data-bs-toggle="tooltip"] {
    cursor: pointer;
}

/* Small text styling */
.card-body small {
    font-size: 0.8rem;
}

/* Responsive tweaks */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem;
    }
}
</style>


<script>
document.addEventListener("DOMContentLoaded", function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
</script>
@endsection

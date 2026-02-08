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
                    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                    $slotColors = ['#E3F2FD', '#E8F5E9', '#FFF3E0', '#FFEBEE', '#F3E5F5'];
                @endphp

                @foreach ($hariList as $index => $hari)
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-sm h-100 border-0 rounded-3">

                            {{-- Header Hari --}}
                            <div class="card-header text-center text-white fw-bold p-2" style="background-color:#4e73df;">
                                {{ $hari }}
                            </div>

                            {{-- Body --}}
                            <div class="card-body p-3">
                                @php
                                    $jadwalHariIni = $jadwal->where('hari', $hari);
                                @endphp

                                @if ($jadwalHariIni->isEmpty())
                                    <p class="text-muted text-center my-3 small">
                                        Tidak ada jadwal mengajar
                                    </p>
                                @else
                                    @foreach ($jadwalHariIni as $i => $j)
                                        <a href="{{ route('guru.absensi.kbm', $j->id) }}"
                                            class="jadwal-slot p-3 mb-3 rounded shadow-sm text-center position-relative
                                              text-decoration-none text-dark d-block"
                                            style="background-color: {{ $slotColors[$i % count($slotColors)] }};"
                                            data-bs-toggle="tooltip" title="Klik untuk Absensi KBM">

                                            <strong>
                                                {{ $j->kelas->kelas }} - {{ strtoupper($j->kelas->jurusan) }}
                                            </strong>

                                            <small class="d-block mt-1">
                                                <i class="fa-regular fa-clock me-1"></i>
                                                {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }}
                                                -
                                                {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                                            </small>

                                            <span class="badge bg-primary mt-2">
                                                ABSEN KBM
                                            </span>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- break baris di layar md --}}
                    @if ($index == 2)
                        <div class="w-100 d-none d-md-block"></div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>

    {{-- STYLE --}}
    <style>
        .jadwal-slot {
            font-size: 0.9rem;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .jadwal-slot:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
            background-color: #d0d9ff !important;
        }

        .card-body small {
            font-size: 0.8rem;
        }
    </style>

    {{-- TOOLTIP --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tooltipTriggerList = [].slice.call(
                document.querySelectorAll('[data-bs-toggle="tooltip"]')
            );

            tooltipTriggerList.map(function(el) {
                return new bootstrap.Tooltip(el);
            });
        });
    </script>
@endsection

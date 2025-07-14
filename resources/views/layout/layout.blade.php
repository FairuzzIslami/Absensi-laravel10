<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    {{-- bostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- icon link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- link asset css --}}
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">

</head>

<body>
    {{-- include --}}

    @if (!Request::is('login'))
        {{-- tampilkan nav kalau bukan url login --}}
        @include('layout.nav') {{-- !request()is() => itu mengecek url browsernya --}}
    @endif

    {{-- content --}}
    @yield('content')


    {{-- footer --}}
    @if (!Request::is('/'))
        {{-- tampilkan nav kalau bukan url / --}}
        @include('layout.footer') {{-- !request()is() => itu mengecek url browsernya --}}
    @endif

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="{{ asset('asset/js/main.js') }}"></script>
{{-- sweat alert --}}
@include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Untuk notifikasi sukses
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    // Untuk notifikasi gagal umum
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: '{{ session('error') }}',
            confirmButtonText: 'Oke',
            iconColor: '#d33'
        });
    @endif

    // Untuk validasi error (tampilkan semua error)
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Isi semua data!!',
            customClass: {
                popup: 'text-start'
            },
            confirmButtonText: 'Oke',
            iconColor: '#DA6C6C',
        });
    @endif
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>


</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelayanan BPJS</title>
    @vite('resources/css/app.css')
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            purple: "#1F469F",
                        }
                    }
                }
            }

        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">
    <div>
        @if(session()->has('alert'))
            @php
                $value = session()->get('alert');
            @endphp
            <script>
                Swal.fire({
                    icon: "{{ $value['icon'] }}",
                    title: "{{ $value['title'] }}",
                    text: "{{ $value['text'] }}"
                })

            </script>
            @php
                session()->forget('alert');
            @endphp

        @elseif(!$errors->isEmpty())
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Terjadi Kesalahan",
                })

            </script>
        @endif
    </div>
    <div class="flex">
        @include('partials.sidebar')
        <div class="w-full">
            @include('partials.header')
            @yield('body')
        </div>
    </div>
    <script src="https://kit.fontawesome.com/e8b696d2f5.js" crossorigin="anonymous"></script>
</body>

</html>

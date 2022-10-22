<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pelayanan BPJS</title>
   @vite('resources/css/app.css')
   <script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
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
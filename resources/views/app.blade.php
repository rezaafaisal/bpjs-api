<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pelayanan BPJS</title>
   @vite('resources/css/app.css')
</head>
<body>
   <div class="flex">
      <div class="w-3/12">
         @include('partials.sidebar')
      </div>
      <div class="w-9/12">
         @include('partials.header')
         @yield('body')
         
      </div>
   </div>
</body>
</html>
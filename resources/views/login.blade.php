<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex h-screen bg-white">
        <div class="w-7/12 px-7 flex flex-col justify-between">
         <div>
            <div class="flex flex-col items-center justify-center mt-20">
               <img src="{{ asset('image/ui/logo.png') }}" alt="" class="h-8">
               <div class="mt-7 text-2xl font-bold text-purple">LOGIN ADMIN PANEL</div>
               <span class="text-sm text-gray-800 mt-1">Silahkan Masukkan Akun Anda</span>
            </div>
            <form action="{{ route('check') }}" method="POST" class="w-7/12 mx-auto mt-10">
               @csrf
               <label class="block mb-4">
                  <span class="block mb-2 text-purple font-medium">NIK</span>
                  <input name="nik" type="text" class="p-2 focus:outline-none focus:ring-2 focus:ring-purple/20 rounded border w-full" placeholder="Masukkan NIK Anda">
               </label>
               <label class="block mb-6">
                  <span class="block mb-2 text-purple font-medium">Password</span>
                  <div class="relative" x-data="{show: false}">
                     <input name="password" :type="show? 'text':'password'" class="block p-2 focus:outline-none focus:ring-2 focus:ring-purple/20 duration-150 rounded border w-full" placeholder="Masukkan Password Anda">
                     <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i @click="show = !show" :class="show?'fa-eye-slash':'fa-eye'" class="fas cursor-pointer text-lg duration-150 text-purple"></i>
                     </div>
                  </div>
               </label>
               {{-- <div class="relative" x-data="{show: false}">
                     <input :type="show? 'text':'password'" name="" id="" class="block bg-gray-100 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-100" placeholder="Password">
                     <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i @click="show = !show" :class="show?'fa-eye-slash':'fa-eye'" class="fas cursor-pointer text-lg z-10 duration-150"></i>
                     </div>
                  </div> --}}
               <button class="py-2 bg-purple text-white font-medium w-full rounded hover:bg-purple/70 duration-150">Masuk</button>
            </form>
         </div>
         <div class="mb-10 text-sm text-gray-500 text-center">
            Copyright by Informatika19 UINAM
         </div>
        </div>
        <div class="w-5/12 bg-purple flex items-center">
            <img src="{{ asset('image/ui/login.png') }}" alt="" class="w-full">
        </div>
    </div>
    <script src="https://kit.fontawesome.com/e8b696d2f5.js" crossorigin="anonymous"></script>
</body>

</html>

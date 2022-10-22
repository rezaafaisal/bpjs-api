<div class="h-screen w-80 bg-purple p-5 flex flex-col justify-between">
    <div class="">
        <div class="bg-white rounded p-1">
            <img src="{{ asset('image/ui/logo.png') }}" alt="" class="w-full" />
        </div>
        <hr class="mt-3">
        <div class="mt-4 text-white">
            <div class="font-medium text-xl">Informatika19 UINAM</div>
            <div class="text-sm">Customer Service</div>
        </div>
        <hr class="mt-3">
        <ul class="flex flex-col gap-4 mt-4" x-data="{active: '{{ $active }}'}">
            <li>
                <a href="{{ route('dashboard') }}"
                   :class="(active == 'verifikasi') ? 'bg-white text-purple' : 'text-white bg-purple'" class="block rounded  font-medium p-2 w-full  hover:bg-white hover:text-purple duration-150 border-2 border-white">
                    <i class="fa-solid fa-check-to-slot mr-2 text-lg"></i>
                    <span>Antrian</span>
                </a>
            </li>
            <li>
                <a href=""
                    :class="(active == 'dokter') ? 'bg-white text-purple' : 'text-white bg-purple'" class="block rounded p-2 w-full border-2 text-white font-medium border-white hover:bg-white hover:text-purple duration-150">
                    <i class="fa-solid fa-user-doctor text-lg mr-2"></i>
                    <span>Dokter</span>
                </a>
            </li>
            <li>
                <a href="{{ route('review') }}"
                    :class="(active == 'review') ? 'bg-white text-purple' : 'text-white bg-purple'" class="block rounded p-2 w-full border-2 text-white font-medium border-white hover:bg-white hover:text-purple duration-150">
                    <i class="fa-solid fa-star text-lg mr-2"></i>
                    <span>Ulasan</span>
                </a>
            </li>
        </ul>
      </div>
      <a href=""
          class="block rounded p-2 w-full border-2 text-white font-medium border-white hover:bg-white hover:text-purple duration-150">
          <i class="fa-solid fa-arrow-right-from-bracket text-lg mr-2"></i>
          <span>Keluar</span>
      </a>
</div>

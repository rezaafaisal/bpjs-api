<div class="h-14 shadow-md bg-white flex items-center">
   <div class="px-7 flex justify-end item-center w-full ">
      <div class="flex gap-2 items-center cursor-pointer">
         <img src="{{ asset('image/ui/ibnu_sina.png') }}" alt="" class="w-8 h-8">
         <span class="block">{{ Auth::user()->officer?->hospital->name }}</span>
      </div>
      
   </div>
</div>
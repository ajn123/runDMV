
<h2 class="transition duration-150 hover:scale-110 bg-green-300 p-2 flex flex-wrap rounded-md hover:bg-fuchsia-500 shadow-2xl drop-shadow-lg">
    @if($website)
            <x-heroicon-c-computer-desktop class="w-6 h-6"/>
            <a class="pl-2" href="https://{{$url}}" target="_blank"> Website</a>
        @else
            <x-heroicon-c-camera class="w-6 h-6"/>
            <a class="pl-2" href="https://instagram.com/{{$url}}" target="_blank"> Instagram</a>
   @endif
</h2>


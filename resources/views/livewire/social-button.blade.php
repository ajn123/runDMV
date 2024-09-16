
<h2 class="transition duration-150 hover:scale-110 {{$color}} p-2 flex flex-wrap rounded-md hover:bg-fuchsia-500 shadow-2xl drop-shadow-lg">
        @if($website)
            <div class="font-black">
                <a class="pl-2" href="{{$url}}" target="_blank">
                    <i class="fa fa-computer fa-2xl"></i>
                </a>
            </div>
        @else
        <div>
            <div class="font-black">
                <a class="p-2"  href="{{$url}}" target="_blank">
                    <i class="fa-brands fa-instagram fa-2xl">
                    </i>
                </a>
            </div>
        </div>
   @endif
</h2>

<div class="mt-1">


    <div
        wire:ignore id="map"
       class="rounded-md mt-1 drop-shadow-lg">
    </div>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgO7VRe_RflivYCZ1Hloz0bRuFs1a_wBo&loading=async&callback=initMap">

    </script>



    <script>

        /* How to initialize the map */
        let map;
        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");
            map = new Map(document.getElementById("map"), {
                zoom: 10,
                center: { lat: @js( $lat ), lng: @js( $lng ) },
                mapId: "DEMO_MAP_ID",
            });
        }


    </script>

    @script
    <script>
            (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
            key: "AIzaSyAgO7VRe_RflivYCZ1Hloz0bRuFs1a_wBo",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });

        function placeMarkers() {
            const initialMarkers = @js($clubs);

            const markers = [];
            for (let index = 0; index < initialMarkers.length; index++) {

                const markerData = initialMarkers[index];

                markers[index] = new google.maps.Marker({
                    position: { lat: markerData.location.lat, lng: markerData.location.lng },
                    map,
                    title: "Zoom in",
                });

                markers[index].addListener('click', () => {
                    console.log('yes');
                    $wire.mountAction('club', {id: markerData.id});
                })
            }
        }
        placeMarkers();

    </script>
    @endscript

    <x-filament-actions::modals />
</div>

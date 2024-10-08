<div class="mt-1">


    <div
        wire:ignore id="map"
       class="rounded-md mt-1 drop-shadow-lg">
    </div>




    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgO7VRe_RflivYCZ1Hloz0bRuFs1a_wBo">


    </script>

    @script

    <script>


        console.log('hi');
        /* How to initialize the map */
        let map;
        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");
            map = new Map(document.getElementById("map"), {
                zoom: 10,
                center: { lat: @js( $lat ), lng: @js( $lng ) },
                mapId: "DEMO_MAP_ID",
            });

            const initialMarkers = @js($clubs);

            const markers = [];
            for (let index = 0; index < initialMarkers.length; index++) {

                const markerData = initialMarkers[index];

                markers[index] = new google.maps.Marker({
                    position: {lat: markerData.location.lat, lng: markerData.location.lng},
                    map,
                    title: "Zoom in",
                });

                markers[index].addListener('click', () => {
                    console.log('yes');
                    $wire.mountAction('club', {id: markerData.id});
                })
            }
        }
        initMap();

    </script>
    @endscript



    <x-filament-actions::modals />
</div>

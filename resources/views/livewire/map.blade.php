<div>

    <div
        wire:ignore id="map"
       class="rounded-md mt-3 drop-shadow-lg">
    </div>





    <script async
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

            const initialMarkers = @js($clubs);

            const markers = [];
            for (let index = 0; index < initialMarkers.length; index++) {

                const markerData = initialMarkers[index];

                markers[index] = new google.maps.Marker({
                    position: { lat: markerData.location.lat, lng: markerData.location.lng },
                    map,
                    title: "Re-Click to Delete",
                });

                markers[index].addListener('click', () => {
                    alert(markerData.name);
                    console.log(markerData.name);
                })
            }


        }



        /* Initialize map when Livewire has loaded */
        document.addEventListener('livewire:load', function () {
            initMap();
        });

    </script>
</div>

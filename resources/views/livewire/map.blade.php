<div class="mt-1">




    <div id="map"></div>

        <x-filament-actions::modals id="clubDetails" />
</div>


@livewireScripts



    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAs8b8RHzMx0tgDw_Cm9Cuxiow9jb_u7pg" 
        defer>
    </script>


    <script>
        // Define the app object

        // Initialize the map
        let map = null;

        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");
            map = new Map(document.getElementById("map"), {
                zoom: 10,
                center: { lat: @js($lat), lng: @js($lng) },
                mapId: "MAP_ID",
            });

            const initialMarkers = @js($clubs);
            const markers = [];
            for (let index = 0; index < initialMarkers.length; index++) {
                const markerData = initialMarkers[index];
                markers[index] = new google.maps.Marker({
                    position: { lat: markerData.location.lat, lng: markerData.location.lng },
                    map: map,
                    title: "Zoom in",
                });

                markers[index].addListener('click', () => {
                  //  console.log(Livewire.all());
                    //Livewire.emit('mountAction', 'club', { id: markerData.id });
                    //Livewire.dispatchTo('map', 'club', { id: markerData.id });
                    
                   //$wire.mountAction('club', { id: markerData.id });

                   alert(markerData.name);

                   //$wire.mountAction('club', { id: markerData.id });
                   //Livewire.emit('mountAction', 'club', { id: markerData.id });
                //window.location.reload();
                //$wire.emit('openModal', 'clubDetails', { id: markerData.id });
                //Livewire.dispatch('club', { id: markerData.id });
                });
            }
        }

        // Ensure the map is initialized after the script loads
        //window.onload = initMap;

        // window.on('livewire:load', () => {
        //     initMap();
        // });

        Livewire.hook('component.init', ({ component, cleanup }) => {
            initMap();
        });
    </script>

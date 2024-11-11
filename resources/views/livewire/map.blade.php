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

                    const modal = document.createElement(`div`);
                   modal.style.position = 'fixed';
                   modal.style.top = '50%';
                   modal.style.left = '50%';
                   modal.style.transform = 'translate(-50%, -50%)';
                   modal.style.backgroundColor = 'white';
                   modal.style.padding = '20px';
                   modal.style.borderRadius = '5px';
                   modal.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
                   modal.style.zIndex = '1000';
                   modal.style.display = 'none';

                   const modalContent = document.createElement('div');
                   modalContent.innerHTML = `<h2 style="text-align: center; font-size: 24px; font-weight: bold;">${markerData.name}</h2>`;

                   modalContent.innerHTML += `<br>`;
                   if (markerData.instagram !== null) {
                       modalContent.innerHTML += `<p>Instagram: <a style="color: blue;" href="https://www.instagram.com/${markerData.instagram}" target="_blank">@${markerData.instagram}</a></p>`;
                   }

                   if (markerData.website !== null) {
                       modalContent.innerHTML += `<br>`;
                       if (!markerData.website.startsWith('https://')) {
                           modalContent.innerHTML += `<p>Website: <a style="color: blue;" href="https://${markerData.website}" target="_blank">${markerData.website}</a></p>`;
                       } else {
                           modalContent.innerHTML += `<p>Website: <a style="color: blue;" href="${markerData.website}" target="_blank">${markerData.website}</a></p>`;
                       }
                   }
                   
                   modal.appendChild(modalContent);

                   const modalCloseButton = document.createElement('button');
                   modalCloseButton.textContent = 'Close';
                   modalCloseButton.style.position = 'absolute';
                   modalCloseButton.style.top = '10px';
                   modalCloseButton.style.right = '10px';
                   modalCloseButton.style.cursor = 'pointer';
                   modalCloseButton.addEventListener('click', () => {
                       modal.style.display = 'none';
                   });
                   modal.appendChild(modalCloseButton);

                   document.body.appendChild(modal);

                markers[index].addListener('click', () => {
                  //  console.log(Livewire.all());
                    //Livewire.emit('mountAction', 'club', { id: markerData.id });
                    //Livewire.dispatchTo('map', 'club', { id: markerData.id });
                    
                   //$wire.mountAction('club', { id: markerData.id });

            

                       modal.style.display = 'block';
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

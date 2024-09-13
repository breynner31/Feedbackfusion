var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 7.89391, lng: -72.50782},
                zoom: 8
            });

      
            map.addListener('click', function(event) {
                
                document.getElementById('coordenadas').value = event.latLng.lat() + ',' + event.latLng.lng();
            });
        }
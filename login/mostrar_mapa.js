function initMap() {
    var restauranteLatLng = { lat: latitud, lng: longitud };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: restauranteLatLng
    });
    var marker = new google.maps.Marker({
        position: restauranteLatLng,
        map: map,
        title: 'Restaurante'
    });
}
initMap();
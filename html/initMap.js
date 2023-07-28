"use strict";

function initMap() {
    const myLatLng = {
        lat: 52.47898864746094,
        lng: -1.7514755725860596
    };
    const map = new google.maps.Map(document.getElementById("gmp-map"), {
        key: AIzaSyDp_G9IHMvZPa34DVhY1kzvWOfojEMF4zo,
        zoom: 14,
        center: myLatLng,
        fullscreenControl: false,
        zoomControl: true,
        streetViewControl: false
    });
    new google.maps.Marker({
        position: myLatLng,
        map,
        title: "My location"
    });
}
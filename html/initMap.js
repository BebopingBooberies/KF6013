"use strict";

function initMap() {
    const myLatLng = {
        lat: 52.47898864746094,
        lng: -1.7514755725860596
    };
    const map = new google.maps.Map(document.getElementById("gmp-map"), {
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
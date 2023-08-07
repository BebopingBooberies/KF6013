let map;

async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: { lat: 52.482914, lng: -1.744123 },
        zoom: 20,
    });
}

initMap();

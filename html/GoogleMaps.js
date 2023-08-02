
function initMap() {
    const latlng = {lat: 52.4854415, lng: -1.7472627};
    const map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 14,
            center: latlng,
        }
    );

    new google.maps.Marker({
        position: latlng,
        map
    })
};
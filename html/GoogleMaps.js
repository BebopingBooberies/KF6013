
async function initMap() {
    let latlng = {lat: 52.4854415, lng: -1.7472627};
    let map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 14,
            center: latlng
        }
    );

    let marker = new google.maps.Marker({position: latlng, map: map});

    /*let mapOptions = {
        key: AIzaSyDp_G9IHMvZPa34DVhY1kzvWOfojEMF4zo,
        center:new google.maps.LatLng(52.482914, -1.744123),
        zoom: 14,
        mapTypeID: google.maps.MapTypeId.SATELLITE,
        streetViewControl: false,
        overviewMapControl: false,
        rotateControl: false,
        scaleControl: false,
        panControl: false,
    };

    map = new google.maps.Map(document.getElementById("map"), mapOptions) ;*/
}
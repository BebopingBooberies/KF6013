let map;
async function initMap() {
    const latlng = {lat: 52.482914, lng: -1.744123};
    const { Map } = await google.maps.importLibrary("maps");

   map = new Map(document.getElementById("map"), {
       center: latlng,
       zoom: 17,
   });

   new google.maps.Marker({
       position: latlng,
       map,
   })
}

initMap();
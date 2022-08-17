var x_antenne = 4.948832;
var y_antenne = -52.30964;

var map = L.map('map').setView([x_antenne, y_antenne], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

var marker = L.marker([x_antenne, y_antenne]).addTo(map);

// var circle = L.circle([x_antenne, y_antenne], {
//     color: 'red',
//     radius: 500000
// }).addTo(map);

var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
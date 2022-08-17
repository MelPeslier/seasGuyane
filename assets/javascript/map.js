// *****variables*****
var x_antenne = 4.948832;
var y_antenne = -52.30964;
var xy_antenne = [x_antenne, y_antenne];
// *****fin variables*****


// *****création map*****
var map = L.map('map').setView(xy_antenne, 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

map.wrapLatLng;
// *****fin création map*****



// *****rayon du satellite*****
var circle = L.circle(xy_antenne, {
    color: 'red',
    fill: false,
    radius: 2500000
}).addTo(map);
// *****fin rayon du satellite*****

// *****position on map click*****
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}
map.on('click', onMapClick);
// *****fin position on map click*****



// *****antenne****
var antenneIcon = L.icon({
    iconUrl: 'images/map/antenne.png',
    iconSize:     [40, 47], // size of the icon
    iconAnchor:   [20, 23.5], // point of the icon which will correspond to marker's location
});

L.marker(xy_antenne, {icon: antenneIcon}).addTo(map);
// *****fin antenne****
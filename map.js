

var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'});

var map = L.map('map').setView([32.09053, 34.80232], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    layers: [osmHOT],
    attribution: '&copy; All Right Reserved - After You'
}).addTo(map);


var startPoint = null;
var endPoint = null;

function onLocationFound(e) {
    const myLocation = { latitude: e.latitude, longitude: e.longitude };
    console.log(myLocation);
    var radius = e.accuracy;
    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
}

function onMapClick(e) {
    if (startPoint === null) {
        startPoint = e.latlng;
        L.marker(startPoint).addTo(map).bindPopup("Start Point");
    } else if (endPoint === null) {
        endPoint = e.latlng;
        L.marker(endPoint).addTo(map).bindPopup("End Point");

        // Create the route using L.Routing.control
        L.Routing.control({
            waypoints: [
                startPoint,
                endPoint
            ]
        }).addTo(map);

        // Reset the start and end points for the next route
        startPoint = null;
        endPoint = null;
    }
}

map.on('locationfound', onLocationFound);
map.on('click', onMapClick);
map.locate({ setView: true, maxZoom: 16 });

var baseMaps = {
    "OpenStreetMap.HOT": osmHOT
};

var layerControl = L.control.layers(baseMaps).addTo(map);

var openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)'
});

layerControl.addBaseLayer(openTopoMap, "OpenTopoMap");


var openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)'
});

var taxiIcon = L.icon({
    iconUrl: 'img/taxi.png',
    iconSize: [70, 70]
})



document.addEventListener("DOMContentLoaded", function () {
    const wrapper = document.querySelector(".wrapperDet");
    const button = wrapper.querySelector("button");

    setTimeout(() => {
        wrapper.classList.add("show");
    }, 10000);

    button.addEventListener("click", () => {
        wrapper.classList.remove("show");
    });
});

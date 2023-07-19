

var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'});

var map = L.map('map').setView([51.505, -0.09], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    layers: [osmHOT],
    attribution: '&copy; All Right Reserved - After You'
}).addTo(map);



function onLocationFound(e) {
    const myLocation = { latitude: e.latitude, longitude: e.longitude };
    var radius = e.accuracy;
    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
    map.on('click', function (e) {
        console.log(e)
        var newMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        L.Routing.control({
            waypoints: [
                L.latLng(myLocation.latitude, myLocation.longitude),
                L.latLng(e.latlng.lat, e.latlng.lng)
            ]
        }).on('routesfound', function (e) {
            var routes = e.routes;
            console.log(routes);

            e.routes[0].coordinates.forEach(function (coord, index) {
                setTimeout(function () {
                    newMarker.setLatLng([coord.lat, coord.lng]);
                }, 100 * index)
            })

        }).addTo(map);
    });
}
map.on('locationfound', onLocationFound);
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

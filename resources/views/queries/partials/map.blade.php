<h3>Available Products on Map</h3>
<div id="map" style="height: 600px; width: 100%;"></div>

@push('scripts')
<script>
    let products = @json($products);
    const radius = @json($radius);
    let locations = [];

    products.map(product => {
        product.pharmacies.forEach(pharmacy => {
            if (locations.some(loc => loc.id === pharmacy.id)) {
                return;
            }
            const [lat, lng] = [pharmacy.latitude, pharmacy.longitude];
            locations.push({
                id: pharmacy.id,
                name: pharmacy.name,
                latitude: lat,
                longitude: lng
            });
        })
    });

    const NAIROBI = {
        latitude: -1.28638,
        longitude: 36.81722
    };

    let map = null;

    function initMap(lat = NAIROBI.latitude, lng = NAIROBI.longitude) {
        const map = L.map('map').setView([lat, lng], 15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var circle = L.circle([lat, lng], {
            color: 'blue',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: radius
        }).addTo(map);

        locations.forEach(location => {
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup(`<strong>${location.name}</strong>`);
        });
        
        const bounds = L.latLngBounds(locations.map(loc => [loc.latitude, loc.longitude]));
        map.fitBounds(bounds.extend(circle.getBounds()), { });
        // map.setZoom(Math.max(map.getZoom() - 3, 0));
        return map;
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;
            map = initMap(userLat, userLng);
        }, function() {
            map = initMap();
        });
    } else {
        map = initMap();
    }
</script>
@endpush
// // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: -1.300, lng: 36.84434 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

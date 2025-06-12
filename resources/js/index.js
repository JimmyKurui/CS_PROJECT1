// Initialize and add the map
function initMap() {
  const nairobi = { lat: -1.300, lng: 36.84434 };
  const map = new google.maps.Map(document.getElementById("map1"), {
    zoom: 12,
    center: nairobi,
  });
  const marker = new google.maps.Marker({
    position: nairobi,
    map: map,
  });
}

$(document).ready(function () {
  $('#but_fetchall').click(function () {
    fetchRecords(0);
  });

  $('#but_search').click(function () {
    var userid = Number($('#search').val().trim());

    if (userid > 0) {
      fetchRecords(userid);
    }
  });
  // alert('I"m alive')
  $(window).on('load', function () {
    setTimeout(() => {
      $('section.about .slide-fade-in.slide-left').addClass('visible');
    }, 5000);
    setTimeout(() => {
      $('section.about .slide-fade-in.slide-right').addClass('visible');
    }, 8000);
  });
});

function fetchRecords($search = 'Panadol') {
  $.ajax({
    url: 'query/' + $search,
    type: 'get',
    dataType: 'json',
    success: function (response) {
      var len = 0;
      $('#results-table tbody').empty(); // Empty <tbody>
      if (response['data'] != null) {
        len = response['data'].length;
      }

      if (len > 0) {
        for (var i = 0; i < len; i++) {
          var id = response['data'][i].id;
          var name = response['data'][i].name;
          var telephone = response['data'][i].telephone;
          var location = response['data'][i].location;

          var tr_str = "<tr>" +
            "<td>" + (i + 1) + "</td>" +
            "<td>" + name + "</td>" +
            "<td>" + telephone + "</td>" +
            "<td>" + location + "</td>" +
            "</tr>";

          $("#results-table tbody").append(tr_str);
        }
      } else {
        var tr_str = "<tr>" +
            "<td colspan='4'>No record found.</td>" +
          "</tr>";
        $("#results-table tbody").append(tr_str);
      }
    }
  });
}
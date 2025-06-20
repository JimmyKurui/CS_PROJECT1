import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

// Fix icon paths (for Laravel Mix)
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
    iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
    iconUrl: require('leaflet/dist/images/marker-icon.png'),
    shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

window.L = L;

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
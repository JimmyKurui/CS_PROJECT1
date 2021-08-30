
$resultPharmacy = JSON.parse($resultPharmacy);
for (const key in $resultPharmacy) {
    if (Object.hasOwnProperty.call($resultPharmacy, key)) {
        const element = $resultPharmacy[key];
        console.log(element.location);
        
    }
}

alert($resultPharmacy);



// // Initialize and add the map
function initMap() {
  // The location of Uluru
  const nairobi = { lat: -1.300, lng: 36.84434 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map1"), {
    zoom: 10,
    center: nairobi,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: nairobi,
    map: map,
  });
}



/* var xhr = new XMLHttpRequest();
xhr.open('POST', '/query');
xhr.onload = function() {
  var $userData = this.response;
  $userData = JSON.parse($userData);
  alert($userData);
};
xhr.send(); */


//   // Fetch all records
//   $('#but_fetchall').click(function(){
// fetchRecords(0);
//   });

//   // Search by userid
//   $('#but_search').click(function(){;
//      var userid = Number($('#search').val().trim());
   
     
// if(userid > 0){
//  fetchRecords(userid);
// }

//   });

// });

function fetchRecords($search='Panadol'){
  $.ajax({
    url: 'query/'+$search,
    type: 'get',
    dataType: 'json',
    success: function(response){

      var len = 0;
      $('#results-table tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }

      if(len > 0){
         for(var i=0; i<len; i++){
            var id = response['data'][i].id;
            var name = response['data'][i].name;
            var telephone = response['data'][i].telephone;
            var location = response['data'][i].location;

            var tr_str = "<tr>" +
              "<td>" + (i+1) + "</td>" +
              "<td>" + name + "</td>" +
              "<td>" + telephone + "</td>" +
              "<td>" + location + "</td>" +
            "</tr>";

            $("#results-table tbody").append(tr_str);
         }
      }else{
         var tr_str = "<tr>" +
             "<td colspan='4'>No record found.</td>" +
         "</tr>";

         $("#results-table tbody").append(tr_str);
      }

    }
  });
}
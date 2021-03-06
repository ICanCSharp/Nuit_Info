  // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 48.84185650000001, lng: 2.2683736999999837},
          zoom: 12
        });
        var trafficLayer = new google.maps.TrafficLayer();
        
        var infoWindow = new google.maps.InfoWindow({map: map});
        var laPosition;
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            laPosition = pos;

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        trafficLayer.setMap(map);
        console.log(laPosition)
        return laPosition;
      }
 
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              "Error: The Geolocation service failed.":
                              'Error: Your browser doesn\'t support geolocation.');
      }


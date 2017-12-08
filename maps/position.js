import "xhr.js"
function envoiCoord(){

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
              var xhr = null;
	
          
          }, function() {
            console.log("toto")
          });
        } else {
          // Browser doesn't support Geolocation
          console.log("tata")
        }
  var xhr = getRequest()
  xhr.open("POST", "nomfonction.php", true)
  xhr.send("variable1=pos.lat&variable2=pos.lng")
}
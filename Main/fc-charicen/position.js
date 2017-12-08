    function envoiCoord() {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
						
            function(position) {
            	var pos = {
             		lat: position.coords.latitude,
              	lng: position.coords.longitude
          		};

            	
          		var xhr = null;
							var v = pos.lat;
							var v2 = pos.lng;
							//v.append(pos.lat, pos.lng)
							xhr = getRequest()
 							xhr.open("GET", "test.php?variable=" + v + "&variable2=" + v2, true)
  						xhr.send(null)
          
          	}, function() {
            console.log("toto")
          });
        } else {
          // Browser doesn't support Geolocation
          console.log("tata")
        }
 
    }
envoiCoord()
 function getRequest(){ 
   if (window.XMLHttpRequest || window.ActiveXObject) {
	            if (window.ActiveXObject) {
	            	try {
	            		xhr = new ActiveXObject("Msxml2.XMLHTTP");
	            	} catch(e) {
	          		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	            	}
	            } else {
	          	xhr = new XMLHttpRequest(); 
        	    }
            } else {
            	alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
            	return;
              }
            
              return xhr
       }

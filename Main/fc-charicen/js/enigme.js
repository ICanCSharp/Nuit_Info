  
            function viewImage(id) {
                var contenuImage=!afficher ? "<img src='images/roue.png'>" : ""; //en fonction de afficher on met l'image ou non
                afficher=!afficher;
                var contenuBouton=afficher ? "Cacher l'image" : "Afficher l'image" ; //On met un texte correspondant
                 
                document.getElementById(id).innerHTML=contenuImage;
                document.getElementById("bouton").innerHTML=contenuBouton;
            }



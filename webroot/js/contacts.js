

function initialisation()
{
	// Création de la map centrée sur Paris
	map = new google.maps.Map(document.getElementById('EmplacementDeMaCarte'),
	{
		zoom: 11,
		center: {lat: 48.856614, lng: 2.3522219000000177},
		clickable: true
	 });


    new AutocompleteDirectionsHandler(map);

    // Ajout de la bibliothèque permettant la liaison entre la map et la page web
    map.prototype = new google.maps.MVCObject();
    // Initialisation d'un calque par type d'établissement de santé
    var kine= new google.maps.Data();
    var osteo = new google.maps.Data();
    var ped = new google.maps.Data();

    // Récupération des données de chaque calque
    kine.loadGeoJson('/geojson/kinesitherapeuthe.geojson');
    osteo.loadGeoJson('/geojson/osteopathe.geojson');
    ped.loadGeoJson('/geojson/pediatre.geojson');



    // Tous les calques sont invisibles sur la map
    kine.setStyle(
    {
        visible: false
        
    });
    osteo.setStyle(
    {
        visible: false
    });
    ped.setStyle(
    {
    	visible: false
    });

	// Ajout des calques à la map
    kine.setMap(map);
    osteo.setMap(map);
    ped.setMap(map);

	// Test à chaque click de souris
    document.addEventListener('click', function ()
    {

        //Si le click a activé une case à cocher
        var check1 = document.getElementById('check1').checked;
        // Si la case à cocher est cochée, on active le calque correspondant
        if(check1==true)
        {
            console.log("kine CHECK");
        
            kine.setStyle(
            {
                visible: true,
                icon: '/pin/pinrouge.png'

        	});
	        // On rend possible l'affichage des informations de chaque point de la carte
	        kine.addListener('click', function(event)
	        {
	            console.log("test selection d'un kine");
	            var raison_sociale = event.feature.getProperty('Professionnels');
	            var adresse = event.feature.getProperty('adresse_complete');
	            var code_postal = event.feature.getProperty('cp_ville');
	            var num_tel = event.feature.getProperty('num_tel');
	            var categorie = event.feature.getProperty('categorie_de_l_etablissement');
	            document.getElementById('nom').textContent = "Nom : " + raison_sociale ;
	            document.getElementById('adresse').textContent = "Adresse : " + adresse + " " + code_postal ;
	            document.getElementById('telephone').textContent = "Téléphone : 0" + num_tel;
	            document.getElementById('categorie').textContent = "Catégorie : " + categorie ;
	            document.getElementById('destination-input').value = adresse + " " + code_postal;


	        });


        }else
        {
            // Si la case est décochée, on rend invisible le calque
            kine.setStyle(
            {
                visible: false
                });
        }

        var check2 = document.getElementById('check2').checked;
        if(check2==true)
        {
            console.log("osteo CHECK");
            osteo.setStyle(
            {
                visible: true,
                icon: '/pin/pinbleu2.png'
            });

            osteo.addListener('click', function(event)
            {
                console.log("test selection d'un osteo");
                var raison_sociale = event.feature.getProperty('Professionnels');
                var adresse = event.feature.getProperty('adresse_complete');
                var code_postal = event.feature.getProperty('cp_ville');
                var num_tel = event.feature.getProperty('num_tel');
                var categorie = event.feature.getProperty('categorie_de_l_etablissement');
                document.getElementById('nom').textContent = "Nom : " + raison_sociale ;
                document.getElementById('adresse').textContent = "Adresse : " + adresse + " " + code_postal ;
                document.getElementById('telephone').textContent = "Téléphone : 0" + num_tel ;
                document.getElementById('categorie').textContent = "Catégorie : " + categorie ;
                document.getElementById('destination-input').value = adresse + " " + code_postal;

            });
        }
        else
        {
            osteo.setStyle(
            {
                visible: false
             });
        }

        var check3 = document.getElementById('check3').checked;
        if(check3==true)
        {
            console.log("ped CHECK");
            ped.setStyle(
            {
                visible: true,
                icon: 'pin/pinvert3.png'
            });

            ped.addListener('click', function(event)
            {
                console.log("test selection d'un pediatre");
                var raison_sociale = event.feature.getProperty('Professionnels');
                var adresse = event.feature.getProperty('adresse_complete');
                var code_postal = event.feature.getProperty('cp_ville');
                var num_tel = event.feature.getProperty('num_tel');               
                var categorie = event.feature.getProperty('categorie_de_l_etablissement');    
                document.getElementById('nom').textContent = "Nom : " + raison_sociale ;
                document.getElementById('adresse').textContent = "Adresse : " + adresse + " " + code_postal ;
                document.getElementById('telephone').textContent = "Téléphone : 0" + num_tel ;
                document.getElementById('categorie').textContent = "Catégorie : " + categorie ;
                document.getElementById('destination-input').value = adresse + " " + code_postal;
            });
        }
        else
        {
            ped.setStyle(
            {
                visible: false
            });
         }



    });
}


/**
* @ Donner un trajet
*/

function AutocompleteDirectionsHandler(map) 
{
	this.map = map;
	this.originPlaceId = null;
	this.destinationPlaceId = null;
	this.travelMode = 'WALKING';
	var originInput = document.getElementById('origin-input');
	var destinationInput = document.getElementById('destination-input');
	var modeSelector = document.getElementById('mode-selector');

	//Permet de sélectionner l'adresse avec un clic sur bouton 'entrée'
	var pac_input = document.getElementById('origin-input');
	var pac_output = document.getElementById('destination-input');

	(function pacSelectFirst(input) {
        // store the original event binding function
        var _addEventListener = (input.addEventListener) ? input.addEventListener : input.attachEvent;

        function addEventListenerWrapper(type, listener) {
            // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
            // and then trigger the original listener.
            if (type == "keydown") {
                var orig_listener = listener;
                listener = function(event) {
                    var suggestion_selected = $(".pac-item-selected").length > 0;
                    if (event.which == 13 && !suggestion_selected) {
                    	var simulated_downarrow = $.Event("keydown", {
                    		keyCode: 40,
                    		which: 40
                    	});
                    	orig_listener.apply(input, [simulated_downarrow]);
                	}

	                orig_listener.apply(input, [event]);
	            };
            }

            _addEventListener.apply(input, [type, listener]);
        }

        input.addEventListener = addEventListenerWrapper;
        input.attachEvent = addEventListenerWrapper;

        var autocomplete = new google.maps.places.Autocomplete(input);

    })(pac_input);

    (function pacSelectFirst(input) 
    {
        // store the original event binding function
            var _addEventListener = (input.addEventListener) ? input.addEventListener : input.attachEvent;

            function addEventListenerWrapper(type, listener) {
                // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
                // and then trigger the original listener.
                if (type == "keydown") {
                    var orig_listener = listener;
                    listener = function(event) {
                    	var suggestion_selected = $(".pac-item-selected").length > 0;
                    	if (event.which == 13 && !suggestion_selected) {
                    		var simulated_downarrow = $.Event("keydown", {
                    			keyCode: 40,
                    			which: 40
                    		});
                    		orig_listener.apply(input, [simulated_downarrow]);
                    	}

                    	orig_listener.apply(input, [event]);
                    };
                }

                _addEventListener.apply(input, [type, listener]);
            }

            input.addEventListener = addEventListenerWrapper;
            input.attachEvent = addEventListenerWrapper;

            var autocomplete = new google.maps.places.Autocomplete(input);

    })(pac_output);


        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(originInput, { types: ["geocode"]});
        var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, {placeIdOnly: true});


        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
    var radioButton = document.getElementById(id);
    var me = this;
    radioButton.addEventListener('click', function() {
        me.travelMode = mode;
        me.route();
    });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
    var me = this;
    autocomplete.bindTo('bounds', this.map);
    var marker;
    marker = new google.maps.Marker({
        position: null,
        map: map,
        icon: 'pin/pinhome.png'
    });
    var infowindow = new google.maps.InfoWindow();


    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.place_id) {
            window.alert("Appuyer sur l'adresse puis valider avec la touche 'Entrée'");
            return;
        }
        if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
            console.log(me);
            console.log(me.originPlaceId);
            map.fitBounds(place.geometry.viewport);
            map.setCenter(place.geometry.location);
            map.setZoom(15);
            moveMarker(place.name, place.geometry.location);
        } else {
            me.destinationPlaceId = place.place_id;
        }
        me.route();
    });

    function moveMarker(placeName, latlng){
        marker.setPosition(latlng);
        infowindow.setContent(placeName);
        infowindow.open(map, marker);
    }
};

AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;

        this.directionsService.route({
            origin: {'placeId': this.originPlaceId},
            destination: {'placeId': this.destinationPlaceId},
            travelMode: this.travelMode
        }, function(response, status) {
	        if (status === 'OK') {
	            me.directionsDisplay.setDirections(response);
	            computeTotalDistance(response);
	        } else {
	            window.alert('Directions request failed due to ' + status);
	        }
        });

};

//Calcul de la distance et du temps du trajet
function computeTotalDistance(result) {
    var total = 0;
    var time_route = 0;
    var minutes = 0;
    var heures = 0;
    var myroute = result.routes[0];
    var origine = document.getElementById('origin-input').value;
    var dest = document.getElementById('destination-input').value;

    for (i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
        time_route += myroute.legs[i].duration.value;
    }
    total = Math.round(total / 1000);
    document.getElementById('distance').textContent = "Distance : " + total + " km " ;

    if (time_route > 3600){
        heures = time_route / 3600;
        minutes = (heures - Math.round(heures))*60;
        heures = Math.round(heures);
        minutes = Math.abs(Math.round(minutes));
        if (minutes==0){
            document.getElementById('duree').textContent = "Durée : " + heures + " H";
        }else{
            document.getElementById('duree').textContent = "Durée : " + heures + " H et " + minutes + " min";
        }
    }else{
        time_route = Math.round(time_route / 60);
        document.getElementById('duree').textContent = "Durée : " + time_route + " min";
    }

    document.getElementById('mode-transport').textContent = "Bonne route !";

}

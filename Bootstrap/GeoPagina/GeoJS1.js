var origFromPlace = 0, destFromPlace = 0;
var locationOrigFromPlace;
var locationDestFromPlace;
var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker = null;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var autocomplete, autocompleteDest;
var input, inputDest;
var defaultLatLng = new google.maps.LatLng(trans.DefaultLat, trans.DefaultLng);
var myDefaultOptions = {
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
var mapLoaded = 0;

    function initialize() {
    map = new google.maps.Map(document.getElementById("map_canvas"), myDefaultOptions);
    
    input = document.getElementById('address');
    inputDest = document.getElementById('addressDest');
    var options = {
    };
    autocomplete = new google.maps.places.Autocomplete(input, options);  
    autocompleteDest = new google.maps.places.Autocomplete(inputDest, options);  
    directionsDisplay = new google.maps.DirectionsRenderer();

    autocompleteChange();

    geocoder = new google.maps.Geocoder();
    
    setTimeout(checkMap,trans.CheckMapDelay);
    
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	marker = new google.maps.Marker({
            map: map,
            position: pos
        });
        
        map.setCenter(pos);
	google.maps.event.addListener(map, 'click', codeLatLngfromclick);
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("directionsPanel"));
	google.maps.event.addListener(map, 'click', codeLatLngfromclick);
        mapLoaded = 1;

	geocoder.geocode({'latLng': pos}, function(results, status) {
	    if (status == google.maps.GeocoderStatus.OK)
	    {
		if (results[0])
		{
		    if (marker != null) marker.setMap(null);
		    marker = new google.maps.Marker({
			position: pos,
			map: map
		    });
		    var infoText = '<strong>' + trans.Geolocation + '</strong> <span id="geocodedAddress">' + results[0].formatted_address + '</span>';
		    infowindow.setContent(infowindowContentWithButtons(infoText, position.coords.latitude, position.coords.longitude));
		    bookUp(results[0].formatted_address, position.coords.latitude, position.coords.longitude);
		    infowindow.open(map, marker);
		}
	    }
	    else
	    {
		if (marker != null) marker.setMap(null);
		marker = new google.maps.Marker({
		    position: pos,
		    map: map
		});
		var infoText = '<strong>' + trans.NoResolvedAddress + '</strong>';
		infowindow.setContent(infowindowContentWithoutButtons(infoText, position.coords.latitude, position.coords.longitude));
		bookUp(trans.NoResolvedAddress, position.coords.latitude, position.coords.longitude);
		infowindow.open(map, marker);
	    }
	});
	  
	}, function() {
	    defaultMap();
        });
    }
    else
    {
	defaultMap();
    }
}

function codeLatLng(origin)
{
    var lat = parseFloat(document.getElementById("latitude").value) || 0;
    var lng = parseFloat(document.getElementById("longitude").value) || 0;
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK)
	{
	    if (results[0])
	    {
		if (marker != null) marker.setMap(null);
		marker = new google.maps.Marker({
		    position: latlng,
		    map: map
		});
		var infoText = '<strong>' + trans.Address + '</strong> <span id="geocodedAddress">' + results[0].formatted_address + '</span>';
		infowindow.setContent(infowindowContentWithButtons(infoText, lat, lng));
		infowindow.open(map, marker);
		bookUp(document.getElementById("address").value, lat, lng);
	    }
	}
	else
	{
	    if (marker != null) marker.setMap(null);
	    marker = new google.maps.Marker({
		position: latlng,
		map: map
	    });
	    var infoText = '<strong>' + trans.NoResolvedAddress + '</strong>';
	    infowindow.setContent(infowindowContentWithoutButtons(infoText, lat, lng));
	    infowindow.open(map, marker);
	    bookUp(document.getElementById("address").value, lat, lng);
	}
    });
    map.setCenter(latlng);
}
  
function codeLatLngfromclick(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    var latlng = event.latLng;
    geocoder.geocode({'latLng': latlng}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK)
	{
	    if (results[0])
	    {
		if (marker != null) marker.setMap(null);
		marker = new google.maps.Marker({
		    position: latlng,
		    map: map
		});
		map.panTo(latlng);
		var infoText = '<strong>' + trans.Address + '</strong> <span id="geocodedAddress">' + results[0].formatted_address + '</span>';
		infowindow.setContent(infowindowContentWithButtons(infoText, lat, lng));
		infowindow.open(map, marker);
		bookUp(results[0].formatted_address, lat, lng);

		// document.getElementById("latitude").value=lat;
		// document.getElementById("longitude").value=lng;
	    }

		
	}
	else
	{
	    if (marker != null) marker.setMap(null);
	    marker = new google.maps.Marker({
		position: latlng,
		map: map
	    });
	    map.panTo(latlng);
	    var infoText = '<strong>' + trans.NoResolvedAddress + '</strong>';
	    infowindow.setContent(infowindowContentWithoutButtons(infoText, lat, lng));
	    infowindow.open(map, marker);
	    bookUp(trans.NoResolvedAddress, lat, lng);
	    ddversdms();
	    alert(trans.GeocodingError + status);
	}
    });
}

function setOrigin()
{
    document.getElementById("address").value=document.getElementById("geocodedAddress").innerHTML;
    document.getElementById("buttonSet").innerHTML="<strong>This location is your new starting point.</strong>";
    $('#starturl').fadeOut(500, function() {
	$('#starturl').html(encodeURI($('#address').val()).replace(/%20/g, "+")).fadeIn(500);
	$('#copy-button').attr('data-clipboard-text', $("#link").text());
    });
    origFromPlace = 0;
}

function setDest()
{
    document.getElementById("addressDest").value=document.getElementById("geocodedAddress").innerHTML;
    document.getElementById("buttonSet").innerHTML="<strong>This location is your new destination.</strong>";
    $('#endurl').fadeOut(500, function() {
	$('#endurl').html(encodeURI($('#addressDest').val()).replace(/%20/g, "+")).fadeIn(500);
	$('#copy-button').attr('data-clipboard-text', $("#link").text());
    });
    destFromPlace = 0;
}
  
function directions()
{
    document.getElementById('directionsPanel').innerHTML = '';
    
    var travelMode = document.getElementById("travelMode").value
    var unit = document.getElementById("unit").value
    var highways = document.getElementById("highways").value
    var tolls = document.getElementById("tolls").value    
    var origin = document.getElementById("address").value;
    var destination = document.getElementById("addressDest").value;
    
    if (origFromPlace == 1) origin = locationOrigFromPlace;
    if (destFromPlace == 1) destination = locationDestFromPlace;
    
    if (marker != null) marker.setMap(null);
  
    if (travelMode==trans.Bicycling) travelMode=google.maps.TravelMode.BICYCLING;
    else if (travelMode==trans.Transit) travelMode=google.maps.TravelMode.TRANSIT;
    else if (travelMode==trans.Walking) travelMode=google.maps.TravelMode.WALKING;
    else travelMode=google.maps.TravelMode.DRIVING;
    
    if (unit==trans.Mile) unit=google.maps.UnitSystem.IMPERIAL;
    else unit=google.maps.UnitSystem.METRIC;
    
    if (highways==trans.Avoid) highways=true;
    else highways = false;
    
    if (tolls==trans.Avoid) tolls=true;
    else tolls = false;
    
    var request = {
	origin:origin,
	destination:destination,
	travelMode: travelMode,
	unitSystem: unit,
	avoidHighways: highways,
	avoidTolls: tolls
    };
    directionsService.route(request, function(result, status) {
	
	if (status == google.maps.DirectionsStatus.OK)
	{
	    directionsDisplay.setDirections(result);
		document.getElementById("longitude").value= locationDestFromPlace;
	}
	else
	{
	    document.getElementById('directionsPanel').innerHTML = '<p>Calculating error or invalid route.</p>';
	}
    });
}
  
function autocompleteChange()
{
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        $('#starturl').fadeOut(500, function() {
            $('#starturl').html(encodeURI($('#address').val()).replace(/%20/g, "+")).fadeIn(500);
            $('#copy-button').attr('data-clipboard-text', $("#link").text());
        });

	var place = autocomplete.getPlace();
	if (!place.geometry) {
	    origFromPlace = 0;
	    return;
	}

	origFromPlace = 1;
	locationOrigFromPlace = place.geometry.location;	
    });
    
    google.maps.event.addListener(autocompleteDest, 'place_changed', function() {
        $('#endurl').fadeOut(500, function() {
            $('#endurl').html(encodeURI($('#addressDest').val()).replace(/%20/g, "+")).fadeIn(500);
            $('#copy-button').attr('data-clipboard-text', $("#link").text());
        });

	var place = autocompleteDest.getPlace();
	if (!place.geometry) {
	    destFromPlace = 0;
	    return;
	}

	destFromPlace = 1;
	locationDestFromPlace = place.geometry.location;	
    });
}

function infowindowContentWithButtons(text, latres, lngres)
{
	document.getElementById("latitude").value=Math.round(latres*1000000)/1000000;
	document.getElementById("longitude").value=Math.round(lngres*1000000)/1000000;
    return '<div id="info_window">' + text + '<br/><strong>' + trans.Latitude + '</strong> ' + Math.round(latres*1000000)/1000000 + ' | <strong>' + trans.Longitude + '</strong> ' + Math.round(lngres*1000000)/1000000 + '<br/><br/><span id="buttonSet"><button type="button" class="btn btn-primary" onclick="setDest()">' + trans.SetDestination + '</button></span>' + bookmark() + '</div>';

}

function infowindowContentWithoutButtons(text, latres, lngres)
{
    return '<div id="info_window">' + text + '<br/><strong>' + trans.Latitude + '</strong> ' + Math.round(latres*1000000)/1000000 + ' | <strong>' + trans.Longitude + '</strong> ' + Math.round(lngres*1000000)/1000000 + bookmark() + '</div>';
}

function defaultMap() {
    map.setCenter(defaultLatLng);
    mapLoaded = 1;
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));
    bookUp(trans.DefaultAddress, trans.DefaultLat, trans.DefaultLng);
    google.maps.event.addListener(map, 'click', codeLatLngfromclick);
    marker = new google.maps.Marker({
	map: map,
	position: defaultLatLng
    });
    var infoText = '<strong>' + trans.Address + '</strong> <span id="geocodedAddress">' + trans.DefaultAddress + '</span>';
    infowindow.setContent(infowindowContentWithButtons(infoText, defaultLatLng.lat(), defaultLatLng.lng()));
    infowindow.open(map, marker);
}

function checkMap() {
    if (mapLoaded==0) {
        defaultMap();
    }
}
function bookmark() {
            return "";
      }
  
  function bookUp(address, latitude, longitude) {
        return false;
  }
  
  function simulateClick(latitude, longitude) {
    var mev = {
        stop: null,
        latLng: new google.maps.LatLng(latitude, longitude)
    }
    google.maps.event.trigger(map, 'click', mev);
  }
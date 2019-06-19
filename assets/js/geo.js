navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
      
        var mymap = L.map('mapid').setView(latlng, 13)
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
          attribution: '&copy; <a target="blank" href="http://www.big.go.id/">Badan Informasi Geospasial</a> </a>',
          maxZoom: 18,
          id: 'mapbox.outdoors',
          accessToken: 'pk.eyJ1IjoiYmJyb29rMTU0IiwiYSI6ImNpcXN3dnJrdDAwMGNmd250bjhvZXpnbWsifQ.Nf9Zkfchos577IanoKMoYQ'
        }).addTo(mymap);
        var marker = L.marker(latlng)
        marker.bindPopup('Lokasi anda saat ini');
        marker.addTo(mymap);
        marker.openPopup();
        var popup = marker._popup;
        
       
      });

L.ClickableTooltip = L.Tooltip.extend({

    onAdd: function (map) {
        L.Tooltip.prototype.onAdd.call(this, map);

        var el = this.getElement(),
            self = this;

        el.addEventListener('click', function() {
            self.fire("click");
        });
        el.style.pointerEvents = 'auto';
    }
});


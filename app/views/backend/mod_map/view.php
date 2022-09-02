<style type="text/css">
    #mapid { height: 500px; z-index: 9;}
</style>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            <h6 class="card-subtitle">Rute Net Monitoring</h6>
            <div id="mapid"></div>
        </div>
    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var awalLat    = "<?=$row['lat_blok']?>";
        var awalLong   = "<?=$row['long_blok']?>";
        var akhirLat   = "<?=$row['lat_client']?>";
        var akhirLong  = "<?=$row['long_client']?>";
        var sts = "<?=$row['status_client']?>";
        var mymap = L.map('mapid').setView([-6.200000, 106.816666], 9);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoia2hhaXJ1em1hbiIsImEiOiJjbDY5cHh3YW8wOWhsM2lxZnE0MTA0OWF6In0.QtNx1x6ovpOCq5R_JlhQgg'
        }).addTo(mymap);


        var greenIcon = new L.Icon({
                          iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/images/marker-shadow.png',
                          iconSize: [25, 41],
                          iconAnchor: [12, 41],
                          popupAnchor: [1, -34],
                          shadowSize: [41, 41]
                        });
            defaultIcon = new L.Icon({
                          iconUrl: '<?=base_url()?>assets/images/marker-icon.png',
                          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/images/marker-shadow.png',
                          iconSize: [25, 41],
                          iconAnchor: [12, 41],
                          popupAnchor: [1, -34],
                          shadowSize: [41, 41]
                        });

        if(sts=='1'){
            var control = L.Routing.control({
            waypoints: [
            L.latLng(awalLat, awalLong),
            L.latLng(akhirLat, akhirLong),
            ],
            lineOptions: {
              styles: [{color: 'green', opacity: 1, weight: 2}]
            },
            createMarker: function(i, waypoints, n) {
               var marker_icon;
                if (i === 0) {
                 marker_icon = greenIcon
                }
                else if (i == n - 1) {
                 marker_icon = defaultIcon
                }
                var marker = L.marker(waypoints.latLng, {
                 draggable: true,
                 icon: marker_icon
                });
                return marker;
            }
            
            // routeWhileDragging: true
            }).addTo(mymap);
            control.hide();
        }else{
            var control = L.Routing.control({
            waypoints: [
            L.latLng(awalLat, awalLong),
            L.latLng(akhirLat, akhirLong),
            ],
            // routeWhileDragging: true
            }).addTo(mymap);
            control.hide();
        }
        
    });
</script>

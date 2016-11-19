<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBglmCLJWoje3Mmcr0I-uMZNZcVjyJIiko&callback=initMap" type="text/javascript"></script>
    <script>
        var marker;   

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: -0.4944506, lng: 117.1471207},
                zoom: 13,
                streetViewControl: false,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infoWindow = new google.maps.InfoWindow;   

            function bindInfoWindow(marker, map, infoWindow, html) {
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
            }

            function addMarker(lat, lng, info) {
                var pt = new google.maps.LatLng(lat, lng);
                var marker = new google.maps.Marker({
                    map: map,
                    position: pt
                });         
                bindInfoWindow(marker, map, infoWindow, info);
            }

        <?php
        function slugify($url)
        {
            $url = trim($url);
            $url = str_replace(" ","-",$url);
            $url = str_replace("/","-slash-",$url);
            $url = rawurlencode($url);
            return $url;
        }
        $query = mysqli_query($koneksi, "select nama_host,harga_host,lat,lng,tipe_host,username from tbl_host inner join tbl_pengguna on tbl_host.id_pengguna = tbl_pengguna.id_pengguna INNER join tbl_akun on tbl_pengguna.id_pengguna = tbl_akun.id_pengguna");
        while ($data = mysqli_fetch_array($query)) {
            $nama_host = $data['nama_host'];
            $harga_host = $data['harga_host'];
            $lat = $data['lat'];
            $lon = $data['lng'];
            $tipe_host = $data['tipe_host'];
            $username_host = $data['username'];
            echo ("addMarker($lat, $lon, '<b><a href=". $username_host . "/" . slugify($nama_host) .">$nama_host</a></b><br>IDR $harga_host<br><i>$tipe_host</i>');\n");                      
        }
        ?>

        }         
    </script>
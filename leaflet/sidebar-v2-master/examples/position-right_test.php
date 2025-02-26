<!DOCTYPE html>
<html lang="en">
<head>
    <title>sidebar-v2 example</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css" /><![endif]-->

    <link rel="stylesheet" href="../css/leaflet-sidebar.css" />

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html, body, #map {
            height: 100%;
            font: 10pt "Helvetica Neue", Arial, Helvetica, sans-serif;
        }

        .lorem {
            font-style: italic;
            color: #AAA;
        }
    </style>
</head>
<body>
   
       
        <div id="map" class="sidebar-map"></div>
        <div id="sidebar"></div>

   

    <a href="https://github.com/Turbo87/sidebar-v2/"><img style="position: fixed; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

    <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
    <script src="../js/leaflet-sidebar.js"></script>

    <script>
        var map = L.map('map');
        map.setView([51.2, 7], 9);

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([51.2, 7]).addTo(map);

        var sidebar = L.control.sidebar('sidebar', {position: 'right'}).addTo(map);

        var home = document.getElementById("home");
        var profile = document.getElementById("profile");

        marker.on('click', function() {
/*
            $('sidebar').load("txtsimple.php", function(response, status, xhr) {
              if (status == "error") {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
              }
              else {
                alert("ok");
              }
        */

        
        });


    </script>
</body>
</html>

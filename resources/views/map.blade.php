<!DOCTYPE html>
<html>

<head>
    <title>Bing Maps</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://bing.com/maps/default.aspx?cp=47.677797~-122.122013"></script>
</head>

<body>
<div id="map"></div>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key={{ $apiKey }}'></script>
<script type='text/javascript'>
    function GetMap() {
        var map = new Microsoft.Maps.Map('#map', {
            credentials: '{{ $apiKey }}'
        });

        Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
            var searchManager = new Microsoft.Maps.Search.SearchManager(map);

            var requestOptions = {
                bounds: map.getBounds(),
                where: 'Yerevan', // Replace with the address you want to search for
                callback: function (answer, userData) {
                    map.setView({ bounds: answer.results[0].bestView });
                    var pushpin = new Microsoft.Maps.Pushpin(answer.results[0].location);
                    map.entities.push(pushpin);
                }
            };

            searchManager.geocode(requestOptions);
        });
    }

    GetMap();
</script>
</body>

</html>

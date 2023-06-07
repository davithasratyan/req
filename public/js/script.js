$( document ).ready(function() {

// Add an event listener to the map click event
    map.on('click', function(event) {
        // Get the latitude and longitude of the clicked location
        var latitude = event.latlng.lat;
        var longitude = event.latlng.lng;

        // Create a marker and add it to the map
        var marker = L.marker([latitude, longitude]).addTo(map);

        // Make an AJAX request to retrieve the address
        var url = '/get-address?latitude=' + latitude + '&longitude=' + longitude;
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                if (response.hasOwnProperty('address')) {
                    // Display the retrieved address
                    var address = response.address;
                    alert('Address: ' + address);
                } else if (response.hasOwnProperty('error')) {
                    // Handle the error case
                    var error = response.error;
                    alert('Error: ' + error);
                }
            },
            error: function(xhr, status, error) {
                // Handle the AJAX request error
                alert('AJAX request failed.');
            }
        });
    });

});

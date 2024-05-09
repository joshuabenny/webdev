<div id="servercent">
        <h1>Find Closest Server</h1>
        <button id="getLocationBtn">Use My Location</button>
        <div id="result"></div>
        <div id="error"></div>
    </div>

    <script>
        const getLocationBtn = document.getElementById("getLocationBtn");
        const resultDiv = document.getElementById("result");
        const errorDiv = document.getElementById("error");

        getLocationBtn.addEventListener("click", function() {
            resultDiv.innerText = "Locating...";
            errorDiv.innerText = "";

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            let city = data.address.city || data.address.town || data.address.village || data.address.hamlet || "Unknown";
                            
                            resultDiv.innerText = `Closest Server: ${city}`;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            errorDiv.innerText = "Error finding closest Server.";
                        });
                });
            } else {
                errorDiv.innerText = "Geolocation is not supported by this browser.";
            }
        });
    </script>
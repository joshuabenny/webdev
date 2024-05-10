<div id="map-carousel" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#map-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#map-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#map-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active i-item">
      <img src="https://cdn.oneesports.gg/cdn-data/2023/09/Valorant_Sunset_Map_OverheadView.jpg" class="d-block w-100 i-img" alt="...">
      <div class="carousel-caption top-0 mt-4 d-none d-md-block">
        <h1 class=" display-1 fw-bolder text-capitalise mt-5 text-uppercase">Sun Set</h1>
        <p class="display-1 text-capitalise">Home To Agent GEKO</p>
        <button class="btn btn-primary px-4 py-2 fs-5" onclick="window.open('https://valorant.fandom.com/wiki/Sunset', '_blank')">Learn More</button>
      </div>
    </div>
    <div class="carousel-item i-item">
      <img src="https://www.dexerto.com/cdn-cgi/image/width=3840,quality=75,format=auto/https://editors.dexerto.com/wp-content/uploads/2021/12/17/Breeze-Valorant-map.jpg" class="d-block w-100 i-img" alt="...">
        <div class="carousel-caption top-0 mt-4 d-none d-md-block">
        <h1 class=" display-1 fw-bolder text-capitalise mt-5 text-uppercase">Breeze</h1>
        <p class="display-1 text-capitalise">land Ahoy!</p>
        <button class="btn btn-primary px-4 py-2 fs-5" onclick="window.open('https://valorant.fandom.com/wiki/Breeze', '_blank')">Learn More</button>
      </div>
    </div>
    <div class="carousel-item i-item">
      <img src="https://imageio.forbes.com/specials-images/imageserve/63b845e67098373db7429d7b/Valorant-map-Split/960x0.jpg?format=jpg&width=960" class="d-block w-100 i-img" alt="...">
      <div class="carousel-caption top-0 mt-4 d-none d-md-block">
        <h1 class=" display-1 fw-bolder text-capitalise mt-5 text-uppercase">Split</h1>
        <p class="display-1 text-capitalise">Society Collides</p>
        <button class="btn btn-primary px-4 py-2 fs-5" onclick="window.open('https://valorant.fandom.com/wiki/Split', '_blank')">Learn More</button>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#map-carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#map-carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div id="servercent">
    <h1 id="title-server">Find Closest Server</h1>
    <button id="getLocationBtn" type="button" class="btn btn-primary btn-lg">Use My Location</button>
    <div id="result" class="result-container">
        <div id="resultText"></div>
    </div>
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
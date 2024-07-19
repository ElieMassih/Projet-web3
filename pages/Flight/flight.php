<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      body {
        display: flex;
        flex-direction: column;
      }

      form {
        max-width: 400px;
        height: 400px;
        margin: 0 auto;
        margin-top: 0px;
        margin-bottom: 0;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 0px;
      }

      .flights-section {
        padding: 50px 0;
        text-align: center;
      }

      .flights-section .container {
        max-width: 600px;
        margin: 0 auto;
      }

      .flights-section .title {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .flights-section .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      .flights-section .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        cursor: pointer;
      }

      .flights-section .btn:hover {
        background-color: #0056b3;
      }

      .featured-destinations-section {
        background-color: #f9f9f9;
        padding: 50px 0;
        text-align: center;
      }

      .featured-destinations-section h2 {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .featured-destinations-section p {
        font-size: 52px;
        margin-bottom: 40px;
      }
    </style>
  </head>
  <body>
    <section class="bleu-section">
    <?php include '../Header/header.php'; ?>
      <section class="flights-section">
        <div class="container">
          <form>
            <div class="title mb-8"><h2>Flights!</h2></div>
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                id="departure"
                placeholder="Departure city or airport"
                required
              />
            </div>
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                id="destination"
                placeholder="Destination city or airport"
                required
              />
            </div>
            <div class="mb-3">
              <label
                for="departure-date"
                class="form-label"
                style="text-align: left"
                >Departure Date:</label
              >
              <input
                type="date"
                class="form-control"
                id="departure-date"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary">
              Search Flights
            </button>
          </form>
        </div>
      </section>
      <section style="text-align: center">
        <h2>Explore Our Featured Destinations</h2>
        <p>Discover amazing travel destinations around the world</p>
      </section>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script>
      const cities = [
        "Abu Dhabi",
        "Amsterdam",
        "Bangkok",
        "Barcelona",
        "Berlin",
        "Cairo",
        "Cape Town",
        "Dubai",
        "Florence",
        "Hong Kong",
        "Istanbul",
        "Kyoto",
        "Las Vegas",
        "London",
        "Los Angeles",
        "Madrid",
        "Miami",
        "Moscow",
        "New York City",
        "Paris",
        "Rio de Janeiro",
        "Rome",
        "San Francisco",
        "Seoul",
        "Shanghai",
        "Singapore",
        "Sydney",
        "Tokyo",
        "Toronto",
        "Venice",
        "Vienna",
        "Zurich",
      ];

      // Get input elements
      const departureInput = document.getElementById("departure");
      const destinationInput = document.getElementById("destination");

      // Event listener for input change
      departureInput.addEventListener("input", function () {
        filterCities(departureInput, "departure");
      });

      destinationInput.addEventListener("input", function () {
        filterCities(destinationInput, "destination");
      });

      // Function to filter cities based on user input
      function filterCities(input, type) {
        const inputValue = input.value.toLowerCase();
        const filteredCities = cities.filter((city) =>
          city.toLowerCase().startsWith(inputValue)
        );

        const selectElement = document.createElement("select");
        selectElement.setAttribute("class", "form-select");
        selectElement.setAttribute("id", type);

        const defaultOption = document.createElement("option");
        defaultOption.textContent = `Select ${
          type === "departure" ? "departure" : "destination"
        }`;
        selectElement.appendChild(defaultOption);

        filteredCities.forEach((city) => {
          const option = document.createElement("option");
          option.value = city;
          option.textContent = city;
          selectElement.appendChild(option);
        });

        const existingSelect = document.getElementById(type);
        if (existingSelect) {
          existingSelect.replaceWith(selectElement);
        } else {
          input.parentNode.replaceChild(selectElement, input);
        }
      }
    </script>
  </body>
</html>

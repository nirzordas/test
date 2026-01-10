document.addEventListener("DOMContentLoaded", fetchCrops);

function fetchCrops() {
  fetch("./marketplace.php")
    .then(res => res.text())
    .then(text => {
      console.log("SERVER RESPONSE:", text); // DEBUG
      return JSON.parse(text);
    })
    .then(data => {
      const container = document.getElementById("crops-container");
      container.innerHTML = "";

      if (data.success && data.crops.length > 0) {
        data.crops.forEach(crop => {
          const card = document.createElement("div");
          card.className = "card";
          card.innerHTML = `
            <h3>${crop.cropsName}</h3>
            <p>Price: ${crop.price}</p>
            <p>Quantity: ${crop.quantity_in_kg} kg</p>
            <p>Farmer ID: ${crop.farmers_id}</p>
          `;
          container.appendChild(card);
        });
      } else {
        container.innerHTML = "<p>No crops available.</p>";
      }
    })
    .catch(err => {
      console.error(err);
      document.getElementById("crops-container").innerHTML =
        "<p>Failed to load crops.</p>";
    });
}

function goBack() {
  window.history.back();
}

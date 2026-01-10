function loadOrders() {
  const farmerId = document.getElementById("farmerId").value;
  const container = document.getElementById("orders-container");

  if (farmerId === "") {
    container.innerHTML = "<p>Please enter Farmer ID.</p>";
    return;
  }

  fetch("view_orders.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "farmers_id=" + farmerId
  })
    .then(res => res.text())
    .then(text => {
      console.log("SERVER RESPONSE:", text); // debug
      return JSON.parse(text);
    })
    .then(data => {
      container.innerHTML = "";

      if (data.success && data.orders.length > 0) {
        data.orders.forEach(order => {
          const div = document.createElement("div");
          div.className = "order-card";
          div.innerHTML = `
            <p>Order ID: ${order.orderId}</p>
            <p>Crop Name: ${order.cropsName}</p>
            <p>Crop ID: ${order.cropsId}</p>
            <p>Price: ৳${order.price}</p>
            <p>Farmer ID: ${order.farmers_id}</p>
            <p>Client ID: ${order.client_id}</p>
          `;
          container.appendChild(div);
        });
      } else {
        container.innerHTML = "<p>No orders found.</p>";
      }
    })
    .catch(err => {
      console.error(err);
      container.innerHTML = "<p>Failed to load orders.</p>";
    });
}

function goBack() {
  window.history.back();
}

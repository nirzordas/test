function loadToolsHistory() {
  const farmerId = document.getElementById("farmerId").value.trim();
  const container = document.getElementById("tools-container");

  container.innerHTML = "";

  if (farmerId === "") {
    container.innerHTML = "<p>Please enter Farmer ID.</p>";
    return;
  }

  fetch("view_tools_history.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "farmers_id=" + encodeURIComponent(farmerId)
  })
    .then(response => response.json())
    .then(data => {
      if (data.success && data.tools.length > 0) {
        data.tools.forEach(tool => {
          const div = document.createElement("div");
          div.className = "tool-card";
          div.innerHTML = `
            <p>Tool Order ID: ${tool.tools_order_id}</p>
            <p>Tool Name: ${tool.toolsName}</p>
            <p>Tool ID: ${tool.toolsId}</p>
            <p>Price: ৳${tool.price}</p>
            <p>Farmer ID: ${tool.farmers_id}</p>
            <p>Quantity: ${tool.quantity}</p>
          `;
          container.appendChild(div);
        });
      } else {
        container.innerHTML = "<p>No tool rental history found.</p>";
      }
    })
    .catch(error => {
      console.error(error);
      container.innerHTML = "<p>Failed to load tool history.</p>";
    });
}

function goBack() {
  window.history.back();
}

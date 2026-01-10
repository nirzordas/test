document.addEventListener("DOMContentLoaded", loadTools);

function loadTools() {
  fetch("rent_tools.php")
    .then(res => res.json())
    .then(data => {
      const container = document.getElementById("tools-container");
      container.innerHTML = "";

      data.tools.forEach(tool => {
        const div = document.createElement("div");
        div.className = "tool-card";
        div.innerHTML = `
          <p>Tool ID: ${tool.toolsId}</p>
          <p>Tool Name: ${tool.toolsName}</p>
          <p>Price: ৳${tool.price}</p>
        `;
        container.appendChild(div);
      });
    });
}

function rentTool() {
  const toolsId = document.getElementById("toolsId").value.trim();
  const farmerId = document.getElementById("farmerId").value.trim();
  const quantity = document.getElementById("quantity").value.trim();

  if (!toolsId || !farmerId || !quantity) {
    alert("❌ All fields are required!");
    return;
  }

  fetch("rent_tools.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body:
      "toolsId=" + toolsId +
      "&farmers_id=" + farmerId +
      "&quantity=" + quantity
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert("✅ Tool rented successfully");
        document.getElementById("rentForm").reset();
      } else {
        alert("❌ Tool not rented");
      }
    })
    .catch(() => alert("❌ Server error"));
}

function goBack() {
  window.history.back();
}


function uploadCrops() {
  const cropsName = document.getElementById("cropsName").value.trim();
  const price = document.getElementById("price").value.trim();
  const quantity = document.getElementById("quantity").value.trim();
  const farmerId = document.getElementById("farmerId").value.trim();

  if (!cropsName || !price || !quantity || !farmerId) {
    alert("❌ All fields are required!");
    return;
  }

  fetch("upload_crops.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body:
      "cropsName=" + encodeURIComponent(cropsName) +
      "&price=" + price +
      "&quantity_in_kg=" + quantity +
      "&farmers_id=" + farmerId
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert("✅ Added successfully");
        document.getElementById("cropsForm").reset();
      } else {
        alert("❌ Not added");
      }
    })
    .catch(() => {
      alert("❌ Server error");
    });
}

function goBack() {
  window.history.back();
}

function logout() {
  if (!confirm("Are you sure you want to logout?")) return;

  fetch("logout.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      window.location.href = "login.html";
    } else {
      alert("Logout failed. Please try again.");
    }
  })
  .catch(error => {
    console.error("Error:", error);
    alert("Something went wrong!");
  });
}

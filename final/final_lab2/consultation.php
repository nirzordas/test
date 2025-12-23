<?php
// Create uploads folder if not exists
if (!file_exists("uploads")) {
    mkdir("uploads", 0777, true);
}

$problem = $_POST['problem'];
$imageName = $_FILES['disease_image']['name'];
$tmpName = $_FILES['disease_image']['tmp_name'];
$targetPath = "uploads/" . basename($imageName);

// Move uploaded image
if (move_uploaded_file($tmpName, $targetPath)) {
    echo "<h2>Consultation Submitted Successfully</h2>";
    echo "<strong>Problem:</strong> " . htmlspecialchars($problem) . "<br><br>";
    echo "<strong>Uploaded Image:</strong><br>";
    echo "<img src='$targetPath' width='300'><br><br>";
    echo "<a href='dashboard.html'>Back to Dashboard</a>";
} else {
    echo "Image upload failed.";
}
?>

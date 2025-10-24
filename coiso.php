<form action="/upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file" id="file">
  <button type="submit">Upload</button>
</form>

<script>
    var form = document.getElementById("file");
    form.addEventListener("change", function() {
        var file = form.files[0];
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/upload.php", true);
        xhr.send(file);
    });
</script>

<?php
if ($_FILES["file"]["error"] > 0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {
  $fileName = $_FILES["file"]["name"];
  $fileTmpName = $_FILES["file"]["tmp_name"];
  $fileSize = $_FILES["file"]["size"];
  $fileType = $_FILES["file"]["type"];

  // Move the uploaded file to a specified directory
  if (move_uploaded_file($fileTmpName, "uploads/" . $fileName)) {
    echo "File uploaded successfully.";
  } else {
    echo "Error uploading file.";
  }
}
?>
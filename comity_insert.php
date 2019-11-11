<?php

include('action/sql_config.php');



if(isset($_POST["name"], $_POST["savings"])){

    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $savings = mysqli_real_escape_string($conn, $_POST["savings"]);
    $image = $_FILES['image']['name'];


}



$sql = "INSERT INTO comity (name, savings, date, image)
VALUES('$name', '$savings', '$date', '$image')";




if ($conn->query($sql) === TRUE) {
     
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: comity.php');



 // Image Upload Code

 if (isset($_POST['img_upload'])) {

    // image file directory
    $target = "images/comity/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}



$conn->close();
?>
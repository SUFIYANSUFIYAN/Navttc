<?php
include("dbcon.php");
//category reference
$categoryref="img/category/";
if (isset($_POST["addcategory"])){
    $catName = $_POST["cName"];
    $catImageName = $_FILES['cImage']['name'];
    $catTmpName =$_FILES['cImage']['tmp_name'];
    $extension =pathinfo($catImageName,PATHINFO_EXTENSION);
    $desig = "img/category/".$catImageName;
    if($extension=="jpg"||$extension =="jpeg"|| $extension =="png" ||$extension== "webp")
    {

if(isset($_POST['add_category'])){ // Changed button name
    $catName = $_POST['cName'];
    $catImageName = $_FILES['cImage']['name'];
    $catTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
    $desig = "img/category/" . $catImageName;
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){ 
        if(move_uploaded_file($catTmpName, $desig)){
            $query = $pdo->prepare("INSERT INTO categories (catName, catImage) VALUES (:pName, :pImage)"); 
            $query->bindParam(":pName", $catName); 
            $query->bindParam(":pImage", $catImageName); 
            $query->execute();
            echo "<script>alert('Category added')</script>";
        } else {
            echo "<script>alert('Failed to upload image')</script>";
        }
    } else {
        echo "<script>alert('Invalid file type')</script>";
    }
}
?>
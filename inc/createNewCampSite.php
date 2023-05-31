<?php
include_once("../utils/ImageUpload.php");

if (isset($_POST['upload_image'])) {
    var_dump($_POST);
    var_dump($_FILES);
    // uploadImage($_POST[""]);
}

?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

</form>

<h1>Image upload</h1>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="description" id="description" placeholder="Description">
    <input type="text" name="features" id="features" placeholder="features">
    <input type="text" name="price" id="price" placeholder="price">
    <input type="text" name="notice_note" id="notice_note" placeholder="notice_note">
    <input type="text" name="pitch_type_id" id="pitch_type_id" placeholder="PitchTypeID">
    <input type="file" name="files[]" multiple>
    <input type="submit" value="upload_image" name="upload_image">
</form>
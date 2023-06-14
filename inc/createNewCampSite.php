<?php
require_once(dirname(__DIR__) . "/config.php");
require_once(dirname(__DIR__) . "/classes/DatabaseConnection.php");
require_once(UTILS_PATH . "ImageUpload.php");
require_once(DATA_PATH . "CampSiteDataRepository.php");
require_once(DATA_PATH . "PitchTypeDataRepository.php");

// $db = new DatabaseConnection();
// $connection = $db->getConnection();
$pitchTypeRepo = new PitchTypeDataRepository($connection);
$campSiteRepo = new CampSiteDataRepository($connection);

// Fetch all the available pitch type
$pitchTypeList = $pitchTypeRepo->getLists();

if (isset($_POST['upload_image'])) {
    // Create the CampSite
    echo "Pitch type ID : " . $_POST["pitch_type_id"];
    $newCampSite = new CampSite($_POST["location"], $_POST["description"], $_POST["local_attraction"], $_POST["features"], $_POST["notice_note"], $_POST["pitch_type_id"], $_POST["price"]);
    $campSiteID = $campSiteRepo->insert($newCampSite);

    // Upload image
    uploadImage($campSiteID);
}
?>
<button id="btnOpenPopup">Create new campsite</button>

<div class="popup-form__bg">
    <div class="popup-form__container">
        <button id="btnClosePopup" class="popup-form__closebtn">X</button>
        <form action="<?php echo $_SERVER["PHP_SELF"]
                        ?>" method="post" enctype="multipart/form-data" class="form">
            <div class="form__group">
                <input type="text" name="description" id="description" placeholder="Description" class="form__input">
            </div>

            <div class="form__group">
                <input class="form__input" type="text" name="location" id="location" placeholder="Location">
            </div>
            <div class="form__group">
                <input class="form__input" type="text" name="features" id="features" placeholder="features">
            </div>
            <div class="form__group">
                <input class="form__input" type="text" name="local_attraction" id="local_attraction" placeholder="local_attraction">
            </div>
            <div class="form__group">
                <input class="form__input" type="text" name="price" id="price" placeholder="price">
            </div>
            <div class="form__group">
                <input class="form__input" type="text" name="notice_note" id="notice_note" placeholder="notice_note">
            </div>

            <label for="cars">Choose a pitch type :</label>
            <select name="pitch_type_id" id="pitch_type">
                <?php foreach ($pitchTypeList as $pitchType) :
                ?>
                    <option value="<?php echo $pitchType->getPitchTypeId();
                                    ?>"><?php echo $pitchType->getDescription()
                                        ?>
                    </option>
                <?php endforeach;
                ?>
            </select>

            <input type="file" name="files[]" multiple>
            <input type="submit" value="upload_image" name="upload_image">
        </form>
    </div>
</div>

<!-- <button id="btnOpenForm">Open Form</button>

<div class="form-popup-bg">
    <div class="form-container">
        <button id="btnCloseForm" class="close-button">X</button>
        <form action="">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Company Name</label>
                <input class="form-control" type="text" />
            </div>
            <div class="form-group">
                <label for="">E-Mail Address</label>
                <input class="form-control" type="text" />
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input class="form-control" type="text" />
            </div>
            <button>Submit</button>
        </form>
    </div>
</div> -->
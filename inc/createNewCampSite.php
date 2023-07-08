<?php
require_once(dirname(__DIR__) . "/config.php");
require_once(dirname(__DIR__) . "/classes/DatabaseConnection.php");
require_once(UTILS_PATH . "ImageUpload.php");
require_once(DATA_PATH . "CampSiteDataRepository.php");
require_once(DATA_PATH . "PitchTypeDataRepository.php");

$pitchTypeRepo = new PitchTypeDataRepository($connection);
$campSiteRepo = new CampSiteDataRepository($connection);

// Fetch all the available pitch type
$pitchTypeList = $pitchTypeRepo->getLists();

if (isset($_POST['create_campsite'])) {
    $pitchType = $pitchTypeRepo->searchById($_POST["pitch_type_id"]);
    var_dump($pitchType);
    $newCampSite = new CampSite($_POST["site_name"], $_POST["location"], $_POST["description"], $_POST["local_attraction"], $_POST["features"], $_POST["notice_note"], $pitchType, $_POST["price"]);
    $newCampSite->setMapIframe($_POST["map_iframe"]);
    $campSiteID = $campSiteRepo->insert($newCampSite);

    // Upload image
    uploadImage($campSiteID);
}
?>
<button data-modal-target="#modal" class="btn btn--primary">Create new campsite</button>
<div class="modal" id="modal">
    <div class="modal-header">
        <div class="modal__title">Create new campsite</div>
        <button data-close-button class="close-button">&times;</button>
    </div>

    <div class="modal-body">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" class="form">
            <div class="form__row">
                <input type="text" class="form__input" name="site_name" id="site_name" placeholder="Site Name" required>
                <input class="form__input" type="text" name="location" id="location" placeholder="Location" required>
            </div>

            <textarea name="description" id="description" cols="50" rows="5" placeholder="Description"
                required></textarea>
            <div class="form__row">
                <input class="form__input" type="text" name="features" id="features"
                    placeholder="features (use CSV format for each feature)" required>
                <input class="form__input" type="text" name="local_attraction" id="local_attraction"
                    placeholder="Local attraction" required>
            </div>

            <input class="form__input" type="text" name="map_iframe" ,
                placeholder="Enter Google Map link iframe of the location" required>
            <input class="form__input" type="number" name="price" id="price" placeholder="price" required>
            <textarea name="notice_note" id="notice_note" cols="50" rows="5" placeholder="Notice Note"
                required></textarea>

            <div class="form__row">
                <label for="cars">Choose a pitch type :</label>
                <select class="select" name="pitch_type_id" id="pitch_type">
                    <?php foreach ($pitchTypeList as $pitchType) :
                    ?>
                    <option value="<?php echo $pitchType->getPitchTypeId();
                                        ?>"><?php echo $pitchType->getTitle()
                            ?>
                    </option>
                    <?php endforeach;
                    ?>
                </select>
            </div>

            <input type="file" name="files[]" multiple>


            <input type="submit" value="Create new campsite" name="create_campsite" class="btn btn--primary">
        </form>
    </div>
</div>
<div id="modal-bg"></div>
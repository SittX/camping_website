<?php
require_once(dirname(__DIR__) . "/config.php");
require_once(INC_PATH . "header.php");
include_once("../classes/DatabaseConnection.php");
include_once("../data/UserDataRepository.php");
include_once("../data/CampSiteDataRepository.php");
include_once("../data/ReviewDataRepository.php");
include_once("../data/PitchTypeDataRepository.php");
include_once("../data/ContactDataRepository.php");
include_once("../models/PitchType.php");
include_once("../models/CampSite.php");
include_once("../models/Review.php");
include_once("../models/Contact.php");

$db = new DatabaseConnection();
$conn = $db->getConnection();

// // $userRepo = new UserDataRepository($conn);
// $newUser = new User("Kevin", "san", "kevin", "kevin@gmail.com", "kevin123");
// // $user = new User("john", "doe", "JohnDoe", "johndoe@gmail.com", "johndoe123");
// // $admin = new User("admin", "admin", "admin", "admin@gmail.com", "admin123");
// // $admin->setRank("admin");

// // $newUser = $userRepo->searchByUsername("kevin");
// // $user = $userRepo->searchByUsername("JohnDoe");
// // $userRepo->insert($user);
// // $userRepo->insert($admin);
// // echo $user->getUsername();
// // echo $newUser->getUsername();
// // $userRepo->update($user, $newUser);
// // $userRepo->remove(3);

// // $currentUserList = $userRepo->getLists();
// // foreach ($currentUserList as $currentUser) {
// //     echo $currentUser->getUsername();
// //     echo $currentUser->getFirstname();
// // }


// // PitchType
// // $familyPitchType = new PitchType("family pitch");
// // $singlePitchType = new PitchType("single pitch");
// // $groupPitchType = new PitchType("group pitch");

// // $pitchTypeRepo = new PitchTypeDataRepository($conn);
// // $pitchTypeRepo->insert($familyPitchType);
// // $pitchTypeRepo->insert($singlePitchType);
// // $pitchTypeRepo->insert($groupPitchType);


// // CampSite Repository
// // $camp1 = new CampSite("yangon", "Testing camp for introvert", "It is located near game center", "free wifi, 3 meals a day", "Be careful of GAMER!", 2, 29.99);
// // $camp2 = new CampSite("NPT", "Another camp for extrovert", "It is located near meditation center", "paid wifi, 2 meals a day", "Be careful of Introvert!", 3, 19.99);
// // $newCamp = new CampSite("MDY", "Testing", "Testing", "testin1, testing2", "testing method", 3, 50.99);

// // $campSiteRepo = new CampSiteDataRepository($conn);
// // $campSiteRepo->insert($camp1);
// // $campSiteRepo->insert($camp2);
// // $oldCamp = $campSiteRepo->queryById(1);
// // $campSiteRepo->update($oldCamp, $newCamp);
// // $campSiteRepo->remove(1);

// // $campList = $campSiteRepo->getLists();
// // foreach ($campList as $currentCamp) {
// //     echo $currentCamp->getSiteId();
// //     echo $currentCamp->getLocation();
// //     echo $currentCamp->getPrice();
// //     echo $currentCamp->getDescription();
// //     echo "</br>";
// // }


// /* Review */

// $review1 = new Review(4, "The campsite is very peaceful and quite. Would definitely coming back !", "Outer world !", 1, 2);
// // $reviewRepo = new ReviewDataRepository($conn);
// // $reviewRepo->insert($review1);

// // $reviewRepo->remove(1);
// // $reviews = $reviewRepo->getLists();
// // foreach ($reviews as $review) {
// //     echo $review->getMessage();
// // }


// /* Contact */

// $contact = new Contact("Hello world", 1);
// // $contactRepo = new ContactDataRepository($conn);

// // $contactRepo->insert($contact);

// include_once(dirname(__DIR__) . "/utils/ImageUpload.php");
// // Image  upload

// uploadImage(1);

$campRepo = new CampSiteDataRepository($conn);
$campRepo->searchById(2);

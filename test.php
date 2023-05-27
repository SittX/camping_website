<?php
include_once("./inc/header.php");

// $userRepo = new UserDataRepository($conn);
$newUser = new User("Kevin", "san", "kevin", "kevin@gmail.com", "kevin123");
$user = new User("john", "doe", "JohnDoe", "johndoe@gmail.com", "johndoe123");

// $userRepo->insert($user);
// $userRepo->update($user, $newUser);
// $userRepo->remove(3);

// $currentUserList = $userRepo->getLists();
// foreach ($currentUserList as $currentUser) {
//     echo $currentUser->getUsername();
//     echo $currentUser->getFirstname();
// }

// foreach ($currentUserList as $currentUser) {
//     $kevin = $userRepo->queryById($currentUser->getUserId());
//     echo $kevin->getUsername();
//     echo $kevin->getLastName();
//     echo $kevin->getEmail();
// }



// CampSite Repository
$oldCamp = new CampSite("yangon", 2999, "Testing camp");
$newCamp = new CampSite("Nay Pyi Taw", 5000, "Human testing camp");

// $campSiteRepo->insert($oldCamp);
// $campSiteRepo->update($oldCamp, $newCamp);
$campSiteRepo->remove(21);

$campList = $campSiteRepo->getLists();
foreach ($campList as $currentCamp) {
    echo $currentCamp->getSiteId();
    echo $currentCamp->getLocation();
    echo $currentCamp->getCost();
    echo $currentCamp->getDescription();
    echo "</br>";
}

<?php
require_once(dirname(__DIR__) . "/inc/header.php");

if(!SessionManager::checkAdmin()){
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}
$bookingRepo = new BookingDataRepository($connection);
$bookings=  $bookingRepo->getLists();
?>

<table class="table">
    <caption class="table__caption">Booking</caption>
    <thead class="table__header">
    <tr class="table__row">
        <th class="table__column">BookingId</th>
        <th class="table__column">Check In</th>
        <th class="table__column">Check Out</th>
        <th class="table__column">Username</th>
    </tr>
    </thead>
    <tbody class="table__body">
    <?php foreach($bookings as $booking):?>
            <tr class="table__row">
                <td class="table__data"> <?php echo $booking->getBookingId();?></td>
                <td class="table__data"> <?php echo $booking->getCheckIn()?></td>
                <td class="table__data"> <?php echo $booking->getCheckOut()?></td>
                <td class="table__data"> <?php echo $booking->getUser()->getUsername()?></td>
                <td class="table__data"> <?php echo $booking->getSite()->getName()?></td>
                <td class="table__data"><button class="btn">Delete</button></td>
            </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php
require_once(INC_PATH. "footer.php") ?>


<?php
require_once(dirname(__DIR__) . "/inc/header.php");

if (!SessionManager::checkAdmin()) {
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}
$bookingRepo = new BookingDataRepository($connection);
$bookings = $bookingRepo->getLists();

if (isset($_POST["delete"])) {
    $bookingId = $_POST["booking_id"];
    $bookingRepo->remove($bookingId);
    header("Location: " . ADMIN_PATH . "adminBooking.php");
}
?>

<table class="table">
    <caption class="table__caption">Booking</caption>
    <thead class="table__header">
        <tr class="table__row">
            <th class="table__column mobile-view">BookingId</th>
            <th class="table__column">Check In</th>
            <th class="table__column">Check Out</th>
            <th class="table__column">Username</th>
            <th class="table__column">Campsite Title</th>
            <th class="table__column mobile-view">Actions</th>
        </tr>
    </thead>
    <tbody class="table__body">
        <?php foreach ($bookings as $booking) : ?>
            <tr class="table__row">
                <td class="table__data mobile-view"> <?php echo $booking->getBookingId(); ?></td>
                <td class="table__data"> <?php echo $booking->getCheckIn() ?></td>
                <td class="table__data"> <?php echo $booking->getCheckOut() ?></td>
                <td class="table__data"> <?php echo $booking->getUser()->getUsername() ?></td>
                <td class="table__data"> <?php echo $booking->getSite()->getName() ?></td>
                <td class="table__data action-form mobile-view">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <input type="hidden" name="booking_id" value="<?php echo $booking->getBookingId() ?>">
                        <input type="submit" value="Delete" name="delete" class="btn btn--warning">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once(INC_PATH . "footer.php") ?>
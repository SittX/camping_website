<?php
include_once(dirname(__DIR__) . "/config.php");
$pageName = basename($_SERVER["REQUEST_URI"], ".php");
require_once("viewCounter.php");
function retrieveViewCount()
{
    $db = new DatabaseConnection();
    $connection = $db->getConnection();

    $query = "SELECT COUNT(DISTINCT ip_address) AS total_ips FROM User_logs";
    $stmt = $connection->query($query);
    $row = $stmt->fetch_assoc();
    return $row["total_ips"];
}

$viewCount = retrieveViewCount();
?>
</main>
<footer id="footer">
    <section class="footer__top">
        <div class="footer__column-title">
            <?php echo "<p class='you_are_here'>You are at " . $pageName . " page</p>"; ?>

            <?php echo "Total visitor : " . $viewCount ?>
            <!--              <p>Total view counter - 1</p>-->
        </div>

        <div class="footer__column">
            <p class="footer__column-title">Categories</p>
            <ul class="footer__link-container">
                <li><a class="footer__link" href="<?php echo PAGES_PATH . "pitchTypesAndAvailability.php" ?>">Information</a>
                </li>
                <li><a class="footer__link" href="<?php echo PAGES_PATH . "reviews.php" ?>">Reviews</a></li>
                <li><a class="footer__link" href="<?php echo PAGES_PATH . "wearableTechnologies.php" ?>">Wearable
                        technologies</a></li>
            </ul>
        </div>

        <div class="footer__column">
            <p class="footer__column-title">Contact Us</p>
            <ul class="footer__link-container">
                <!--                  <li><a class="footer__link" href="-->
                <?php //echo PAGES_PATH . "contact.php" ?><!--"><button-->
                <!--                              class="btn btn--primary">Contact-->
                <!--                              admin</button></a></li>-->
                <li>
                    <!-- The form -->
                    <div class="form-popup" id="myForm">
                        <form action="/action_page.php" class="form-container">
                            <h1>Login</h1>

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>

                            <button type="submit" class="btn">Login</button>
                            <button type="button" class="btn cancel" id="sticky-form-close-btn">Close</button>
                        </form>
                    </div>
                </li>

                <li><a class="footer__link" href="<?php echo PAGES_PATH . "privacyPolicy.php" ?>">Privacy Policy</a>
                </li>
                <li><a class="footer__link" href="<?php echo PAGES_PATH . "home.php#location_map" ?>">Site
                        location</a></li>
                <li><a class="footer__link" href="<?php echo PAGES_PATH . "rss.php" ?>">RSS Feed</a>
                </li>
                <div id="google_translate_element"></div>
            </ul>
        </div>
    </section>
    <hr>
    <section class="footer__bottom">
        <div class="footer__column">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
                <a href="#">CampSite website</a>.
            </p>
        </div>

        <ul class="social-links__container">
            <li><a class="social-links facebook" href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
            <li><a class="social-links twitter" href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
            <li><a class="social-links instagram" href="https://instagram.com"><i class="fa fa-instagram"></i></a>
            </li>
            <li><a class="social-links linkedin" href="https://linkedin.com"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </section>
</footer>
<script src="../static/js/index.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
</body>

</html>
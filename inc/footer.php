  <?php
    include_once(dirname(__DIR__) . "/config.php");
    $pageName = basename($_SERVER["REQUEST_URI"], ".php");
    ?>
  </main>
  <footer id="footer">
      <section class="footer__top">
          <div class="footer__column">
              <?php echo "<p class='you_are_here'>You are at " . $pageName . " page</p>"; ?>
          </div>

          <div class="footer__column">
              <p class="footer__column-title">Categories</p>
              <ul class="footer__link-container">
                  <li><a class="footer__link" href="<?php echo PAGES_PATH . "information.php" ?>">Information</a>
                  </li>
                  <li><a class="footer__link" href="<?php echo PAGES_PATH . "reviews.php" ?>">Reviews</a></li>
              </ul>
          </div>

          <div class="footer__column">
              <p class="footer__column-title">Contact Us</p>
              <ul class="footer__link-container">
                  <li><a class="footer__link" href="<?php echo PAGES_PATH . "contact.php" ?>"><button
                              class="btn btn--primary">Contact
                              admin</button></a></li>
                  <li><a class="footer__link" href="<?php echo PAGES_PATH . "privacyPolicy.php" ?>">Privacy Policy</a>
                  </li>
                  <li><a class="footer__link" href="<?php echo PAGES_PATH . "home.php#location_map" ?>">Site
                          location</a></li>
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
  <script src="../static/js/main.js"></script>
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
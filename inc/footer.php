  <?php
    include_once(dirname(__DIR__) . "/config.php");
    ?>
  </main>
  <footer id="footer">
      <div class="footer__container">
          <div class="footer__top-row">
              <div>
                  you are here
              </div>

              <div class="footer__item">
                  <p class="footer__title">Categories</p>
                  <ul class="footer__link-container">
                      <li><a class="footer__link" href="<?php echo PAGES_PATH . "information.php" ?>">Information</a>
                      </li>
                      <li><a class="footer__link" href="<?php echo PAGES_PATH . "reviews.php" ?>">Reviews</a></li>
                  </ul>
              </div>

              <div class="footer__item">
                  <p class="footer__title">Contact Us</p>
                  <ul class="footer__link-container">
                      <li><a class="footer__link" href="<?php echo PAGES_PATH . "contact.php" ?>"><button
                                  class="btn btn--primary">Contact
                                  admin</button></a></li>
                      <!-- <li><a class="footer__link" href="<?php // echo PAGES_PATH . "" 
                                                                ?>">Email</a></li> -->
                      <li><a class="footer__link" href="<?php echo PAGES_PATH . "" ?>">Privacy Policy</a></li>
                      <li><a class="footer__link" href="/camping_website/pages/home.php#map">Site location</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <hr>
      <div class="footer__container">
          <div class="footer__bottom-row">
              <div class="footer__item">
                  <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
                      <a href="#">CampSite website</a>.
                  </p>
              </div>

              <div class="footer__item">
                  <ul class="social-icons">
                      <li><a class="facebook" href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                      <li><a class="twitter" href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                      <li><a class="instagram" href="https://instagram.com"><i class="fa fa-instagram"></i></a></li>
                      <li><a class="linkedin" href="https://linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <script src="../static/js/main.js"></script>
  </body>

  </html>
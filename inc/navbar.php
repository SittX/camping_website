<header id="header" aria-label="header">
    <div class="header__container">
        <div class="nav__start">
            <a class="nav__logo" href="/">
                <img src="https://github.com/Evavic44/responsive-navbar-with-dropdown/blob/main/assets/images/logo.png?raw=true"
                    width="35" height="35" alt="Inc Logo" />
            </a>

            <nav class="nav">
                <ul class="nav__menu">
                    <li>
                        <button class="nav__link dropdown__btn" data-dropdown="dropdown1" aria-haspopup="true"
                                aria-expanded="false" aria-label="discover">
                            Discover
                        </button>

                        <div id="dropdown1" class="dropdown">
                            <ul role="menu">
                                <li>
                                    <span class="dropdown__link-title">Destinations</span>
                                </li>

                                <!-- Fetch campsite destination from the database and display them using Foreach loop-->
                                <li role="menu item">
                                    <a class="dropdown__link" href="#adobe-xd">
                                        <img src="./assets/icons/xd.svg" />
                                        Adobe XD
                                    </a>
                                </li>
                                <!-- Foreach loop ends here -->
                            </ul>

                            <ul role="menu">
                                <li class="dropdown-title">
                                    <span class="dropdown__link-title">CampSite types</span>
                                </li>
                                <!-- Fetch campsite type from the database and display them using ForEach loop -->
                                <li role="menu item">
                                    <a class="dropdown__link" href="#adobe-xd">
                                        <img src="./assets/icons/xd.svg" />
                                        Adobe XD
                                    </a>
                                </li>
                                <!-- ForEach loop ends here -->
                            </ul>
                        </div>
                    </li>
                    <li><a class="nav__link" href="/">Reviews</a></li>
                    <li><a class="nav__link" href="/">Contact Us</a></li>
                    <li><a class="nav__link" href="#about_us">About</a></li>
                </ul>
            </nav>
        </div>

        <div class="nav__end">
            <div class="nav__end-container">
                <button class="btn btn--primary">Login</button>
                <button class="btn btn--primary">Sign Up</button>
            </div>

            <button id="hamburger-menu" aria-label="hamburger menu" aria-haspopup="true" aria-expanded="false">
                =
            </button>
        </div>
    </div>
</header>
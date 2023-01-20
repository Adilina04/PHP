<body>
    <header>
        <section>
            <nav class="navibar">
                <h1><a href="index.php" class="hyperlink">Pocket Bank</a></h1>
                <section class="navilinks">
                    <div class="aboutus container">
                        <a href="nous.php" class="hyperlink">A propos</a>
                    </div>
                    <div class="contactus container">
                        <a href="contact.php" class="hyperlink">Nous Contacter</a>
                    </div>
                    <div class="myspace container">
                        <a href="myaccount.php" class="hyperlinkB">Mon espace</a>
                    </div>
                    <?php 
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                            echo '<div class="contactus container"><a href="/actions/Logout.php" class="hyperlink">Se déconnecter</a></div>';
                        } else {
                            echo '<div class="contactus container"><a href="login.php" class="hyperlink">Se connecter</a></div>';
                        }
                    ?>
                </section>
            </nav>
        </section>
    </header>
</body>

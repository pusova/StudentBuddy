<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentBuddy</title>
    <link rel="stylesheet" href="css\style.css">
</head>

<body>
    <header class="app-header">
        <div class="logo-container">
            <img src="images\logo.png" alt="Logo" class="logo">
            <h1>StudentBuddy</h1>
        </div>
        <nav class="app-nav">
            <a href="?c=home" title="Feed">Feed</a>
            <p>|</p>
            <a href="?c=home&a=friends" title="Friends">Friends</a>
        </nav>
        <div class="header-actions">
            <button class="icon-btn" title="Search">🔍</button>
            <button class="icon-btn" title="Notifications">🔔</button>
            <div class="profile-menu-container">
                <details class="dropdown">
                    <summary class="profile-pic-btn">
                        <div class="user-avatar">KP</div>
                    </summary>

                    <div class="dropdown-content">
                        <a href="#profile">Môj profil</a>
                        <a href="<?= $link->url('profile.myposts') ?>">Moje príspevky</a>
                        <a href="#logout">Odhlásiť sa</a>
                    </div>
                </details>
            </div>
            <!--<a href="#" class="user-avatar-link" title="Môj profil">
                <div class="user-avatar">JK</div>
            </a>-->
        </div>
    </header>

    <div class="container-fluid mt-3">
        <div class="web-content">
            <?= $contentHTML ?>
        </div>
    </div>

    <footer class="app-footer">
        <p>&copy; 2026 StudentBuddy</p>
        <div class="footer-links">
            <a href="#" title="FAQ">FAQ</a>
            <a href="#" title="Terms">Terms</a>
        </div>
    </footer>
</body>

</html>
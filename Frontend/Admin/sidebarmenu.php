<?php
    $location = $_SERVER['REQUEST_URI'];
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo $location == '/crowd/Frontend/Admin/index.php' ? 'active' : ''?>" aria-current="page" href="index.php">
                <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $location == '/crowd/Frontend/Admin/user.php' ? 'active' : ''?>" href="user.php">
                <span data-feather="file"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $location == '/crowd/Frontend/Admin/campaign.php' ? 'active' : ''?>" href="campaign.php">
                <span data-feather="shopping-cart"></span>
                    Campaigns
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $location == '/crowd/Frontend/Admin/donation.php' ? 'active' : ''?>" href="donation.php">
                <span data-feather="users"></span>
                    Donations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $location == '/crowd/Frontend/Admin/markDone.php' ? 'active' : ''?>" href="markDone.php">
                <span data-feather="bar-chart-2"></span>
                    Mark as Done
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $location == '/crowd/Frontend/Admin/contact.php' ? 'active' : ''?>" href="contact.php">
                <span data-feather="bar-chart-2"></span>
                    Contact Us
                </a>
            </li>
        </ul>
    </div>
</nav>
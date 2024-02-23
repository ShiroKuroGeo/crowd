
<script src="/crowd/Middleware/Vue/vue.3.js"></script>
<script src="/crowd/Middleware/Vue/axios.js"></script>
<?php
    $location = $_SERVER['REQUEST_URI'];
    if($location == '/crowd/Frontend/regular/index.php'){

        echo "<script src='/crowd/Middleware/Users/index.js'></script>";

    }else if($location == '/crowd/Frontend/users/profile.php'){

        echo "<script src='/crowd/Middleware/Users/profile.js'></script>";

    }else if($location == '/crowd/Frontend/users/index.php'){

        echo "<script src='/crowd/Middleware/Users/index.js'></script>";
        
    }else if($location == '/crowd/Frontend/users/storeDonation.php'){

        echo "<script src='/crowd/Middleware/Users/campaign.js'></script>";
        
    }else{
        echo "<script src='/crowd/Middleware/Users/preview.js'></script>";
    }
?>
<script src="/crowd/Assets/JS/bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
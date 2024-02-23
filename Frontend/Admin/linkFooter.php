
<script src="/crowd/Middleware/plugins/chart/chart.js"></script>
<script src="/crowd/Middleware/Vue/vue.3.js"></script>
<script src="/crowd/Middleware/Vue/axios.js"></script>
<script src="/crowd/Assets/JS/bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<?php
    if($location == '/crowd/Frontend/Admin/index.php'){

        echo "<script src='/crowd/Middleware/Admin/index.js'></script>";

    }else if($location == '/crowd/Frontend/Admin/campaign.php'){

        echo "<script src='/crowd/Middleware/Admin/campaign.js'></script>";

    }else if($location == '/crowd/Frontend/Admin/donation.php'){

        echo "<script src='/crowd/Middleware/Admin/donation.js'></script>";

    }else if($location == '/crowd/Frontend/Admin/markDone.php'){

        echo "<script src='/crowd/Middleware/Admin/markAsDone.js'></script>";
    }else if($location == '/crowd/Frontend/Admin/contact.php'){

        echo "<script src='/crowd/Middleware/Admin/contact.js'></script>";

    }else if($location == '/crowd/Frontend/Admin/reports.php'){

        echo "<script src='/crowd/Middleware/Admin/reports.js'></script>";

    }else if($location == '/crowd/Frontend/Admin/user.php'){

        echo "<script src='/crowd/Middleware/Admin/user.js'></script>";

    }else{
        echo "<script src='/crowd/Middleware/Admin/preview.js'></script>";
    }
?>
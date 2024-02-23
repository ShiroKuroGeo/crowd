<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Donations Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/adminDashboard.css">
</head>
<body>
    <?php
        include('header.php');
    ?>

    <div class="container-fluid" id="donations">
        <div class="row">
            <!-- Side Bar Menu -->
            <?php 
                include('sidebarmenu.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <!-- <div class="row"> -->
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Campaign Name</th>
                                                <th scope="col">Donated by</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Receipt</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="d of donation">
                                                <td>{{d.campaign_title}}</td>
                                                <td>{{d.name}}</td>
                                                <td>{{d.amount}}</td>
                                                <td>{{d.date_created}}</td>
                                                <td>
                                                    <a :href="'/crowd/Assets/Img/' + d.receipt" target="_blank" class="text-decoration-none">
                                                        <img :src="'/crowd/Assets/Img/' + d.receipt" alt="" width="40">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </main>
        </div>
    </div>
    <?php
        include('linkFooter.php');
    ?>
</body>
</html>
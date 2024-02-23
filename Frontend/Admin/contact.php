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

    <div class="container-fluid" id="contact">
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="d of contact">
                                                <td>{{d.name}}</td>
                                                <td>{{d.email}}</td>
                                                <td>{{d.address}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" @click="toModal(d.contact_id)" data-bs-toggle="modal" data-bs-target="#modalVieMessage" >View Message</button>
                                                    <div class="modal fade" id="modalVieMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{message}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
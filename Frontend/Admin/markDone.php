<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reports Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/adminDashboard.css">
</head>
<body>
    <?php
        include('header.php');
    ?>

    <div class="container-fluid" id="marks">
        <div class="row">
            <!-- Side Bar Menu -->
            <?php 
                include('sidebarmenu.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="col-lg-12">
                        <div class="card" style="width: 71rem;">
                            <div class="card-body">
                                <table class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Campaign title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Rendered Goal</th>
                                            <th scope="col">Campaign Goal</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="c of markDone">
                                            <td>{{c.name}}</td>
                                            <td>{{c.campaign_title}}</td>
                                            <td>{{c.categories}}</td>
                                            <td>{{c.rendered_goal}}</td>
                                            <td>{{c.campaign_goal}}</td>
                                            <td>{{c.location}}</td>
                                            <td>{{c.campaign_deadline}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php
        include('linkFooter.php');
    ?>
</body>
</html>
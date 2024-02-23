<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Campaign Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/adminDashboard.css">
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="container-fluid" id="campaigns">
        <div class="row">
            <!-- Side Bar Menu -->
            <?php
            include('sidebarmenu.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="card rounded card-clickable m-2 shadow mx-4" style="width: 18rem;" v-for="cam of showCampaign">
                                        <img class="card-img-top mt-3" :src="'/crowd/Assets/Img/' + cam.image" width="30" height="130" alt="Card image cap">
                                        <div class="card-body campaign_body">
                                            <div class="d-flex gap-2 align-items-center">
                                            </div>
                                            <div class="card-text">
                                                <span class="fw-bold">Title: </span>{{ cam.campaign_title }}<br>
                                                <span class="fw-bold">From: </span>{{ cam.name }} <br>
                                                <span class="fw-bold">Due Date: </span>{{ cam.campaign_deadline }} <br> <br>
                                            </div>
                                            <div class="goal_box">
                                                <div class="d-flex justify-content-between">
                                                    <p> <span class="current_count">Goal</span> Raised </p>
                                                    <p> <span class="current_count">{{ (cam.rendered_goal / cam.campaign_goal) * 100 }}</span>%</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p> <span class="current_count">Status</span> </p>
                                                    <p>
                                                        <span :class="cam.status == 0 ? 'text-warning' : cam.status == 1 ? 'text-primary' : cam.status == 2 ? 'text-danger' : 'text-info'">
                                                            {{ cam.status == 0 ? 'Pending' : cam.status == 1 ? 'Accepted' : cam.status == 2 ? 'Decline' : 'Mark As Done' }}
                                                        </span>
                                                    </p>
                                                </div>
                                                Goal php <span class="goal_count">{{cam.campaign_goal}}</span>
                                                <progress class="col-12 py-2" :value="cam.rendered_goal" :max="cam.campaign_goal"></progress>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-success btn-sm" @click="preview(cam.campaign_id)">Preview Campaign</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
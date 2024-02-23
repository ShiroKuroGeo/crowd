<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/adminDashboard.css">
</head>
<body>
    <?php
        include('header.php');
    ?>

    <div class="container-fluid" id="previews">
        <div class="row">
            <!-- Side Bar Menu -->
            <?php 
                include('sidebarmenu.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-center align-items-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="card" style="width: 20rem;" v-for="sc of selectedCampaign">
                        <img class="card-img-top" :src="'/crowd/Assets/Img/'+sc.image" alt="Card image cap" width="20">
                        <div class="card-body">
                            <span class="fw-bold">Title: </span>{{ sc.campaign_title }}<br>
                            <span class="fw-bold">From: </span><a :href="'profile.php?userId='+sc.userId">{{ sc.name }}</a><br>
                            <span class="fw-bold">Due Date: </span>{{ sc.campaign_deadline }} <br> <br>
                            <span class="fw-bold">Gcash QR Code: </span><a :href="'/crowd/Assets/Img/' + sc.gcashPicture">View QR Code</a><br>
                            <span class="fw-bold">View Valid ID: </span><a :href="'/crowd/Assets/Img/' + sc.validId">
                                View Valid ID
                            </a><br>
                            <span class="fw-bold">Description: </span>{{sc.campaign_description}}<br>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{sc.categories}}</li>
                            <li class="list-group-item">{{sc.location}}</li>
                            <li class="list-group-item">{{sc.date_created}}</li>
                            <li class="list-group-item">
                                <span :class="sc.status == 0 ? 'text-warning' : sc.status == 1 ? 'text-primary' : sc.status == 2 ? 'text-danger' : 'text-info'">
                                    {{ sc.status == 0 ? 'Pending' : sc.status == 1 ? 'Accepted' : sc.status == 2 ? 'Decline' : 'Mark As Done' }}
                                </span>
                            </li>
                        </ul>
                        <div class="card-body d-flex justify-content-between" v-if="statusShow">
                            <button class="btn btn-success btn-sm col-3" @click="accepted(sc.campaign_id)">Accept</button>
                            <button class="btn btn-success btn-sm col-3" @click="done(sc.campaign_id)">Done</button>
                            <button class="btn btn-danger btn-sm col-3" @click="rejected(sc.campaign_id)">Decline</button>
                        </div>
                        <div class="card-body d-flex justify-content-between" v-else>
                            <button class="btn btn-success btn-sm col-3" disabled>Accept</button>
                            <button class="btn btn-success btn-sm col-3" @click="done(sc.campaign_id)" >Done</button>
                            <button class="btn btn-danger btn-sm col-3" disabled>Decline</button>
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
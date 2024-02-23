<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crowd Funding</title>
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/donation.css">
</head>

<body>
    <div class="container-fluid p-0 vh-100" id="preview">
        <?php
        include('header.php');
        ?>
        <!-- Header-->
        <div class="text-white">
            <div class="container px-5">
                <section class="py-5">
                    <div class="container px-5 my-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bolder">Donate as much as you want</h2>
                            <p class="lead mb-0">Planning to donate of <?php echo $_GET['cat'] ?> List Category</p>
                        </div>
                        <div class="row gx-5 justify-content-center text-dark">
                            <div class="card mb-3 w-100" v-for="sc of selectedCategories">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img :src="'/crowd/Assets/Img/'+sc.image" height="320" width="310" class="my-4 rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{sc.campaign_title}}</h5>
                                            <p class="card-text">{{sc.campaign_description}}.</p>
                                            <p class="card-text"><small class="text-muted">Campaign Deadline {{sc.campaign_deadline}}</small></p>
                                            <p class="card-text col-5">Campaign Goal {{sc.campaign_goal}}</p>
                                            <div :class="currentDateMethod > sc.campaign_deadline ? 'text-danger' : 'visually-hidden'">Mark as Done</div>
                                            <div class="goal_box">
                                            <div class="d-flex justify-content-between">
                                                    <p> <span class="current_count">Goal</span> Raised </p>
                                                    <p> <span class="current_count">{{ (sc.rendered_goal / sc.campaign_goal) * 100 }}</span>%</p>
                                            </div>
                                                <progress class="col-12 py-2" :value="sc.rendered_goal" style="width: 70%" :max="sc.campaign_goal"></progress>
                                            </div>
                                            <p class="card-text"><small class="text-muted">Date created {{sc.date_created}}</small></p>
                                            <div class="col-12"><button class="btn btn-sm btn-primary col-3 float-end mb-2" @click="goTo(sc.campaign_id)" :disabled="currentDateMethod > sc.campaign_deadline" :href="'donation.php?donationId='+ sc.campaign_id">Check This Out</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section></br></br></br></br></br></br></br></br></br></br></br>
            </div>
            <footer class="py-4">
                <div class="container px-4">
                    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
                </div>
            </footer>
        </div>
    </div>
    <?php
    include('linkFooter.php');
    ?>
</body>

</html>
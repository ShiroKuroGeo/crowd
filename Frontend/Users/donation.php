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
    <div class="container-fluid p-0 vh-100 h-100" id="preview">
        <?php
        include('header.php');
        ?>
        <!-- Header-->
        <div class="text-white d-flex justify-content-center align-items-center">
            <div class="container">
                <h1 class="mb-5 mt-4 fw-bold text-center"><small class="fst-italic">Campaign View</h1>
                <div class="row bg-white rounded h-100 p-3">
                    <div class="col-6 text-dark">
                        <img :src="'/crowd/Assets/Img/' + allImages" alt="" width="10" class="col-12 mb-2 rounded">
                    </div>

                    <div class="col-6 text-dark">
                        <div class="row">
                            <div class="col-2">
                                <img :src="'/crowd/Assets/Img/' + profile" alt="" width="10" class="col-12 mb-2 rounded rounded-circle">
                            </div>
                            <div class="col-10">
                                Name of User: {{ username }} <br>
                                Campaign Created : {{ dateToString(createdat) }}
                            </div>
                        </div>

                        <div class="col-12 border p-0">
                            <div class="col-12" v-if="userId == campaignUserId">
                                <button class="btn btn-sm btn-warning col-12" disabled>Donate</button>
                            </div>
                            <div class="col-12" v-else>
                                <a href="/crowd/Frontend/users/donationform.php?donationId=<?php echo $_GET['donationId'] ?>">
                                    <button class="btn btn-sm btn-primary col-12" data-bs-toggle="modal" data-bs-target="#donate">Donate</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="comments border border-1 mt-2" style="height: 215px; overflow-y: scroll;">
                                <div class="pt-1" v-for="c in comments">
                                    <div class="px-3 fw-bolder">{{c.name}}</div>
                                    <div class="px-3 pb-2 border-bottom border-2 mb-2"> >> {{c.comment}}.</div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="input-group input-group-sm">
                                    <textarea name="comment" id="comment" class="form-control" cols="63" rows="1"></textarea>
                                    <button class="btn btn-info" @click="comment">Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <span class="text-dark text-capitalize">
                            <span class="fw-bold">Campaign Description: </span><br>
                            <span class="fw-normal">{{ campaign_description }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div></br></br></br></br></br></br></br></br></br></br></br>
        <footer class="py-4">
            <div class="container px-4">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
    </div>
    <?php
    include('linkFooter.php');
    ?>
</body>

</html>
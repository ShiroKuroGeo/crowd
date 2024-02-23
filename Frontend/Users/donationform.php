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
            <div class="container px-5">
                <h1 class="mb-5 mt-4 fw-bold text-center"><small class="fst-italic">Donation Form</h1>
                <div class="row bg-white text-dark rounded d-flex justify-content-center" style="height: 60vh;">
                    <div class="col-6 p-3 border my-4">
                        <div class="text-center fw-bold fst-italic">
                            <h1 class="fw-bold">Donation
                                <span id="check" class="visually-hidden text-primary">&check;</span>
                                <span id="uncheck" class="visually-hidden text-danger">&#10060;</span>
                            </h1>
                        </div>
                        <div class="group my-3">
                            <label for="">Amount to Send</label>
                            <input type="number" name="amount" id="amount" class="form-control form-control-sm" placeholder="Enter amount" required>
                        </div>
                        <div class="group my-3">
                            <a :href="'/crowd/Assets/Img/'+ gcashPicture">
                                <button class="col-12 btn btn-md btn-warning">Scan QR CODE</button>
                            </a>
                        </div>
                        <div class="group my-3">
                            <label for="">Send Proof Of Giving</label><br>
                            <input type="file" name="proof" id="proof" class="form-control form-control-sm" required>
                        </div>
                        <div class="group my-2 float-end col-12">
                            <div class="col-12" v-if="userId == campaignUserId">
                                <button class="btn btn-sm btn-warning col-12" @click="doDonate(<?php echo $_GET['donationId'] ?>)" disabled>Donate</button>
                            </div>
                            <div class="col-12" v-else>
                                <button class="btn btn-sm btn-primary col-12" @click="doDonate(<?php echo $_GET['donationId'] ?>)">Donate</button>
                            </div>
                        </div>
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
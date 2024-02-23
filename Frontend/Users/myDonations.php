
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
                <h1 class="mb-5 mt-4 fw-bold text-center"><small class="fst-italic">My Donations</h1>
                <div class="row bg-white rounded" style="height: 56vh;">
                    <div class="col-lg-12 mt-3">
                        <div class="">
                            <div class="card-body"  style="height: 50vh; overflow-y: scroll">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Campaign Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Receipt</th> 
                                            <th scope="col">Proof of Successfull Campaign</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="d of myDonation">
                                            <td>{{d.campaign_title}}</td>
                                            <td>{{d.amount}}</td>
                                            <td>{{d.date_created}}</td>
                                            <td>
                                                <a :href="'/crowd/Assets/Img/' + d.receipt" target="_blank" class="text-decoration-none">
                                                    <img :src="'/crowd/Assets/Img/' + d.receipt" alt="" width="40">
                                                </a>
                                            </td>
                                            <td style="word-break: break-all;"><a :href="d.proofUrl">{{d.proofUrl}}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('linkFooter.php');
    ?>
</body>
</html>
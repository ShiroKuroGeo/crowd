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
                <h1 class="mb-5 mt-4 fw-bold text-center"><small class="fst-italic">Donor's List</h1>
                <div class="row bg-white rounded" style="height: 56vh;">
                    <div class="col-lg-12 mt-3">
                        <div class="">
                            <div class="card-body" style="height: 50vh; overflow-y: scroll">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Campaign Name</th>
                                            <th scope="col">Donated by</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Proof</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="d of needApprovalDonation">
                                            <td>{{d.campaign_title}}</td>
                                            <td>{{d.name}}</td>
                                            <td>{{d.amount}}</td>
                                            <td>{{d.created_at}}</td>
                                            <td>
                                                <a :href="'/crowd/Assets/Img/' + d.receipt" target="_blank" class="text-decoration-none">
                                                    <img :src="'/crowd/Assets/Img/' + d.receipt" alt="" width="40">
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary ms-1 btn-sm" data-bs-toggle="modal" data-bs-target="#needApproval" @click="selectedProofDonate(d.camp_id)">Approved</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="needApproval" tabindex="-1" aria-labelledby="needApprovalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" v-for="d of selectedDonation">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="needApprovalLabel">Donation Approval</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <img :src="'/crowd/Assets/Img/' + d.receipt" class="img-fluid mb-5">
                                            Enter if there is some error of the amount given by the donator.
                                            <input type="text" v-model="receiptProof" class="form-control form-control-sm visually-hidden">
                                            <input type="number" v-model="amountProof" class="form-control form-control-sm">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click="approved(d.camp_id)">Approve</button>
                                        </div>
                                    </div>
                                </div>
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
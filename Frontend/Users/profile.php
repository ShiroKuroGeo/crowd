
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
    <div class="container-fluid p-0 vh-100" id="profile">
        <?php
            include('header.php');
        ?>
        <!-- Header-->
        <div class="vh-100">
            <div class="container py-5" v-for="p in profile">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4 shadow h-100">
                            <div class="card-body text-center">
                                <img :src="'/crowd/Assets/Img/' + p.image" alt="avatar" class="rounded img-fluid" style="width: 50%;">
                                <h5 class="my-3">{{p.name}}</h5>
                                <hr class="my-5">
                                <h5 class="my-3">
                                    <button type="button" class="btn btn-md btn-primary col-12" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profile</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <div class="my-2">
                                                        <span class="float-start fw-light">Name</span>
                                                        <input type="text" name="updateName" id="updateName" :value="p.name" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="my-2">
                                                        <span class="float-start fw-light">Email</span>
                                                        <input type="email" name="updateEmail" id="updateEmail" :value="p.email" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="my-2">
                                                        <span class="float-start fw-light">Address</span>
                                                        <input type="text" name="updateAddress" id="updateAddress" :value="p.country" class="form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-primary" @click="updateProfile" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4 mb-md-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{p.name}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{p.email}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{p.country}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">Assets</span></p>
                                        <div class="d-flex justify-content-between align-items-between">
                                            <p class="mb-1" style="font-size: .77rem;">Total Donated</p>
                                            <p class="mb-1" style="font-size: .77rem;">P{{p.totalAmount}}</p>
                                        </div>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <footer class="py-4">
            <div class="container-fluid"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
    </div>
    <?php
        include('linkFooter.php');
    ?>
</body>
</html>
<!-- profile -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../../Assets/CSS/adminDashboard.css">
</head>
<body>
    <?php
        include('header.php');
    ?>

    <div class="container-fluid" id="users">
        <div class="row">
            <!-- Side Bar Menu -->
            <?php 
                include('sidebarmenu.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="container-fluid content-inner mt-n5 py-0">
                        <div class="card rounded">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="user in users" v-if="usersStatus">
                                            <td>{{ user.name }}</td>
                                            <td>{{ user.email }}</td>
                                            <td><p :class="user.is_logged == 1 ? 'text-success' : 'text-danger'">{{ user.is_logged == 1 ? 'Signed In' : 'Signed Out' }}</p></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary col-5 me-2" @click="selectedUser(user.user_id)" data-bs-toggle="modal" data-bs-target="#detailsmodal">Details</button>
                                                <button class="btn btn-sm btn-danger col-5 ms-2" @click="selectedUser(user.user_id)"  data-bs-toggle="modal" data-bs-target="#updateUser">Delete</button>
                                            </td>
                                        </tr>
                                        <tr v-else>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="detailsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body" v-for="user in selectedId">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <div class="card" style="width: 20rem;">
                                                <img :src="'/crowd/Assets/Img/' + user.image" class="my-3" alt="test">
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        <div class="d-flex justify-content-between align-items-between border border-top-0">
                                                            <div class="title">Name: </div>
                                                            <div class="body">{{ user.name }}</div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-between  border border-top-0">
                                                            <div class="title">Email: </div>
                                                            <div class="body">{{ user.email }}</div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-between  border border-top-0">
                                                            <div class="title">Country: </div>
                                                            <div class="body">{{ user.country }}</div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-between  border border-top-0">
                                                            <div class="title">Role: </div>
                                                            <div class="body">{{ user.user_type == 1 ? 'Regular User' : 'Admin' }}</div>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body" v-for="user in selectedId">
                                        <div class="row m-5">
                                            <h1>Are you sure you want to delete {{ user.name }}?</h1><br>
                                            <button class="btn btn-sm btn-primary mb-2" @click="deleteID(user.user_id)">Yes</button>
                                            <button class="btn btn-sm btn-danger mt-2">No</button>
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
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
                <h1 class="mb-5 mt-4 fw-bold text-center"><small class="fst-italic">My Campaign</h1>
                <div class="row bg-white rounded" style="height: 56vh;">
                    <div class="table col-9">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Campaign Goal</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="sc in selectUserCampaign">
                                    <th scope="row" class="text-center"><img :src="'/crowd/Assets/Img/'+sc.image" class="img-fluid rounded" width="50"></th>
                                    <td class="fw-bold">{{sc.campaign_title}}</td>
                                    <td class="fw-bold">{{sc.campaign_goal}}</td>
                                    <td class="fw-bold">{{sc.categories}}</td>
                                    <td class="fw-bold">{{sc.location}}</td>
                                    <td :class="sc.status == 1 ? 'text-primary fw-bold' : sc.status == 2 ? 'text-danger fw-bold' : sc.status == 3 ? 'text-info fw-bold' : 'text-warning fw-bold' ">{{sc.status == 1 ? 'Approve' : sc.status == 2 ? 'Decline' : sc.status == 3 ? 'Done' : 'Pending' }}</td>
                                    <td class="text-center">
                                        <button @click="getCampaignUsing(sc.campaign_id)" class="btn btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal"> Updates </button>
                                        <a class="text-decoration-none btn btn-sm btn-info mx-1" :href="'donated.php?id='+sc.campaign_id">Recent Donated</a>
                                        <a class="text-decoration-none btn btn-sm btn-secondary mx-1" :href="'viewdonated.php?id='+sc.campaign_id">View Donate</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Update -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update this campaign</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit="updateThisCampaign" v-for="gc in getCampaignUsingId">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Image</label><br>
                                    <img :src="'/crowd/Assets/Img/'+ gc.image" class="rounded" width="150" alt="">
                                </div>
                                <div class="col-4">
                                    <label for="">Gcash</label><br>
                                    <img :src="'/crowd/Assets/Img/'+ gc.gcashPicture" class="rounded" width="150" alt="">
                                </div>
                                <div class="col-4">
                                    <label for="">Valid</label><br>
                                    <img :src="'/crowd/Assets/Img/'+ gc.validId" class="rounded" width="150" alt="">
                                </div>
                            </div>
                            <div class="group my-2">
                                <input type="text" name="Id" :value="thisCamId" id="Id" class="form-control visually-hidden">
                            </div>
                            <div class="group my-2">
                                <label for="">Proof Url</label>
                                <input type="url" name="Proof" :value="gc.proofUrl"  id="Proof" class="form-control"required>
                            </div>
                            <div class="group my-2">
                                <label for="">Title</label>
                                <input type="text" name="Title" :value="gc.campaign_title" id="Title" class="form-control" required>
                            </div>
                            <div class="group my-2">
                                <label for="">Category</label>
                                <input type="text" name="Cate" :value="gc.categories" id="Cate" class="form-control" required>
                            </div>
                            <div class="group my-2">
                                <label for="">Goal</label>
                                <input type="text" name="Goal" :value="gc.campaign_goal" id="Goal" class="form-control" required>
                            </div>
                            <div class="group my-2">
                                <label for="">Due Date</label>
                                <input type="date" name="Due" :value="gc.campaign_deadline" id="Due" class="form-control" required>
                            </div>
                            <div class="group my-2">
                                <label for="">Location</label>
                                <input type="text" name="Loc" :value="gc.location" id="Loc" class="form-control" required>
                            </div>
                            <div class="group my-2">
                                <label for="">Description</label>
                                <textarea name="Desc" id="Desc" :value="gc.campaign_description" cols="4" class="form-control" required>

                                </textarea>
                            </div>
                            <div class="group mt-4 text-center col-12">
                                <button class="btn btn-md btn-primary col-7" type="submit">Save Changes</button>
                            </div>
                        </form>
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
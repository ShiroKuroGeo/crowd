
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crowd Funding</title>
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/style.css">
</head>
<style>
    body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.30)),  url(/crowd/Assets/Img/donation.jpg) no-repeat;
    background-size: 100% 100%; /* Cover the entire container */
    background-size: cover;
    background-position: center center;
    image-rendering: crisp-edges;
    -webkit-image-rendering: pixelated;
    -moz-image-rendering: pixelated;
    -o-image-rendering: pixelated;
}
</style>
<body>
    <div class="container-fluid p-0 vh-100" id="campaign">
        <?php
            include('header.php');
        ?>
        <!-- Header-->
        <div class="vh-100">
            <div class="container px-5">
                <div class="text-white text-center pt-1">
                    <h1 class="fw-bold fst-italic">Create A Campaign</h1>
                </div>
                <div class="row border rounded bg-white p-4" style="height: 80vh;">
                    <form @submit="storeCampaign" class="row" enctype="multipart/form-data">
                        <div class="col-6">
                            <div class="group mb-2">
                                <label>Campaign Title</label>
                                <input type="text" name="entryName" id="entryName" class="form-control form-control-sm" placeholder="Enter Campaign Title">
                            </div>
                            <div class="group mb-2">
                                <label>Campaign Category</label>
                                <select name="categ" id="categ" class="form-control  form-control-sm">
                                    <option value="noValue">Select Category</option>
                                    <option value="Animals">Animals</option>
                                    <option value="Charity">Charity</option>
                                    <option value="Community">Community</option>
                                    <option value="Events">Events</option>
                                </select>
                            </div>
                            <div class="group mb-2">
                                <label>Campaign Goal</label>
                                <input type="number" name="goal" id="goal" class="form-control form-control-sm" placeholder="Enter Campaign Goal" required>
                            </div>
                            <div class="group mb-2 row">
                                <div class="col">
                                    <label>Campaign Due Date</label>
                                    <input type="date" name="deadline" id="deadline" class="form-control form-control-sm" required>
                                </div>
                                <div class="col">
                                    <label>Campaign Full Location</label>
                                    <input type="text" name="location" id="location" class="form-control form-control-sm" placeholder="Enter Location" required>
                                </div>
                            </div>
                            <div class="group mb-2">
                                <label>Campaign Description(1 sentence only)</label>
                                <textarea name="description" id="description" class="form-control form-control-sm" cols="30" rows="7" required></textarea>
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <div class="group mb-2">
                                <label for="">Select Picture</label><br>
                                <input type="file" name="image" id="image" class="form-control form-control-sm" required>
                            </div>
                            <div class="group mb-2">
                                <label for="">Select Picture for Gcash</label><br>
                                <input type="file" name="gcash" id="gcash" class="form-control form-control-sm" required>
                            </div>
                            <div class="group mb-2">
                                <label for="">Select Picture for Valid Id</label><br>
                                <input type="file" name="validId" id="validId" class="form-control form-control-sm" required>
                            </div>
                            <div class="content text-center mt-5 mb-3 border h-25">
                                Admin check your ID and QRCODE <br>
                                wait for approval
                            </div>
                            <div class="content text-center my-4 float-end col-12">
                                <button type="submit" class="btn btn-md btn-primary col-12">Create campaign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="py-4">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
    </div>
    <?php
        include('linkFooter.php');
    ?>  
</body>
</html>
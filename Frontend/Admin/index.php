<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Assets/CSS/bootstrap5.css">
    <link rel="stylesheet" href="../../Assets/CSS/adminDashboard.css">
</head>
<body>
    <?php
        include('header.php');
    ?>
    <div class="container-fluid" id="indexs">
        <div class="row">
            <!-- Side Bar Menu -->
            <?php 
                include('sidebarmenu.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="row">
                                <ul class="d-flex justify-content-evenly align-items-evenly">
                                    <li class="col-3 card">
                                        <div class="card-body">
                                            <div class="progress-widget">
                                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.37121 10.2017V17.0618" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M12.0382 6.91919V17.0619" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M16.6285 13.8269V17.0619" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <div class="progress-detail">
                                                    <p class="mb-2">Total Campaigns</p>
                                                    <h4 class="counter">{{ totalOfCampaign }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-3 card">
                                        <div class="card-body">
                                            <div class="progress-widget">
                                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <div class="progress-detail">
                                                    <p class="mb-2">Total Donations</p>
                                                    <h4 class="counter">{{ totalOfDonation }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-3 card">
                                        <div class="card-body">
                                            <div class="progress-widget">
                                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59151 15.2068C13.2805 15.2068 16.4335 15.7658 16.4335 17.9988C16.4335 20.2318 13.3015 20.8068 9.59151 20.8068C5.90151 20.8068 2.74951 20.2528 2.74951 18.0188C2.74951 15.7848 5.88051 15.2068 9.59151 15.2068Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59157 12.0198C7.16957 12.0198 5.20557 10.0568 5.20557 7.63476C5.20557 5.21276 7.16957 3.24976 9.59157 3.24976C12.0126 3.24976 13.9766 5.21276 13.9766 7.63476C13.9856 10.0478 12.0356 12.0108 9.62257 12.0198H9.59157Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M16.4829 10.8815C18.0839 10.6565 19.3169 9.28253 19.3199 7.61953C19.3199 5.98053 18.1249 4.62053 16.5579 4.36353" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M18.5952 14.7322C20.1462 14.9632 21.2292 15.5072 21.2292 16.6272C21.2292 17.3982 20.7192 17.8982 19.8952 18.2112" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <div class="progress-detail">
                                                    <p class="mb-2">Total Users</p>
                                                    <h4 class="counter">{{ totalOfUsers }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-3 card">
                                        <div class="card-body">
                                            <div class="progress-widget">
                                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <div class="progress-detail">
                                                    <p class="mb-2">Total Admins</p>
                                                    <h4 class="counter">{{ totalOfAdmin }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                                <canvas id="myChart" class="col-12" style="max-width:800px; max-height:400px;"></canvas>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <div class="col-12 mb-4">
                                <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                                    <div class="flex-wrap card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="mb-2 card-title">Users</h4>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="mt-4 table-responsive">
                                            <table id="basic-table" class="table mb-0 table-striped" role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="user in users">
                                                        <td>{{ user.name }}</td>
                                                        <td>{{ user.user_type == 1 ? 'Regular User' : 'Admin' }}</td>
                                                        <td>{{ user.email }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                                    <div class="flex-wrap card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="mb-2 card-title">Campaigns</h4>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="mt-4 table-responsive">
                                            <table id="basic-table" class="table mb-0 table-striped" role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Campaign</th>
                                                        <th>Total Donation</th>
                                                        <th>Completion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="sh in showCampaign">
                                                        <td>{{ sh.name }}</td>
                                                        <td>{{ sh.campaign_title }}</td>
                                                        <td>₱{{ sh.rendered_goal }}</td>
                                                        <td>
                                                            {{ ( sh.rendered_goal / sh.campaign_goal) * 100 }}%
                                                            <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">
                                                                <div class="progress-bar bg-primary" data-toggle="progress-bar" :style="'width: ' + ( sh.rendered_goal / sh.campaign_goal) * 100 + '%;'" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="200"></div>
                                                            </div>
                                                        </td>
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
            </main>
        </div>
    </div>
    <?php
        include('linkFooter.php');
    ?>
</body>
</html>
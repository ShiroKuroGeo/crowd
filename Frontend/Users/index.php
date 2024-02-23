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

<body>
    <div id="index">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="../../Assets/Img/Cordovalogo.png" alt="logo" width="80">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#aboutArea">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="#donateArea">Donate</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contactUs">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#aboutUs">About Us</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" class="btn" href="" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">My Profile</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="mycampaign.php">My Campaign</a></li>
                                <li><a class="dropdown-item" href="myDonations.php">My Donations</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5 donation">
                            <h1 class="display-5er mb-2"> "A LITTLE HELP FOR A BIG CAUSE" </h1>
                            <p class="lead  mb-4 fw-bolder">IMONG PISO UG MODAGHAN, DAKO NA UG TABANG</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-outline-light btn-lg px-4" href="storeDonation.php">Create Campaign</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="py-5 border-bottom" id="aboutArea">
            <div class="container px-5 my-5 ">
                <div class="row gx-5">
                    <h1 class="mb-5 text-center">Categories</h1>
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <img src="/crowd/Assets/Img/categories/animals.jpg" class="col-12 rounded" alt="charity" width="300">
                        <a class="text-decoration-none btn btn-sm btn-primary col-12 mt-2" href="categoryFunding.php?cat=Animals">
                            Animals
                        </a>
                    </div>
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <img src="/crowd/Assets/Img/categories/charity.jpg" class="col-12 rounded" alt="charity" width="300">
                        <a class="text-decoration-none btn btn-sm btn-primary col-12 mt-2" href="categoryFunding.php?cat=Charity">
                            Charity
                        </a>
                    </div>
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <img src="/crowd/Assets/Img/categories/community.jpg" class="col-12 rounded" alt="charity" width="300">
                        <a class="text-decoration-none btn btn-sm btn-primary col-12 mt-2" href="categoryFunding.php?cat=Community">
                            Community
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <img src="/crowd/Assets/Img/categories/events.jpg" class="col-12 rounded" alt="charity" width="300">
                        <a class="text-decoration-none btn btn-sm btn-primary col-12 mt-2" href="categoryFunding.php?cat=Events">
                            Events
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray py-5 border-bottom" id="donateArea">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Featured Campaigns</h2>
                    <p class="lead mb-0">Planning to do donate is like donating organs</p>
                    <p class="lead mb-0">Donate as Much as you want!</p>
                </div>
                <div class="row gx-5">

                    <div class="my-4 col-lg-4 col-xl-4" v-for="c in campaign">
                        <div class="card mb-0 mb-xl-4 shadow">
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-3">
                                    <img :src="'/crowd/Assets/Img/'+c.image" class="col-12 rounded" alt="charity" width="300">
                                </ul>
                                <div class="fst-italic" style="color: green;">Goal: {{c.campaign_goal}}</div>
                                <div class="fst-italic">Name: {{c.name}}</div>
                                <div class="fst-italic">Location: {{c.location}}</div>
                                <div class="fst-italic">Title: {{c.campaign_title}}</div>
                                <div class="fst-italic">Categories: {{c.categories}}</div>
                                <div class="fst-italic"><small class="text-muted">Campaign Deadline: {{c.campaign_deadline}}</div>
                                <div :class="currentDateMethod < c.campaign_deadline ? 'text-danger' : 'visually-hidden'">Over Due date</div>
                                <div class="goal_box">
                                    <div class="d-flex justify-content-between">
                                        <p> <span class="current_count">Goal</span> Raised </p>
                                        <p> <span class="current_count">{{ (c.rendered_goal / c.campaign_goal) * 100 }}</span>%</p>
                                    </div>
                                    <progress class="col-12 py-2" :value="c.rendered_goal == null ? 0 : c.rendered_goal" :max="c.campaign_goal == null ? 0 : c.campaign_goal"></progress>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-primary mt-2" @click="goTo(c.campaign_id)" :disabled="currentDateMethod < c.campaign_deadline">
                                        Check This Out
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light py-5 border-bottom" id="contactUs">
            <div class="container px-5 my-5">
                <h1 class="text-center fw-bolder">Contact Us</h1>
                <div class="text-center">
                    <p class="lead mb-0">If you have concern about your campaign or funds just fill up this form and send it to us,</br> so that we can feedback you in your gmail account<br>make sure to put your valid gmail or you can directly message us thru our gmail</p>
                    <p>Contact me via Gmail: <a href="mailto:cfunding18@gmail.com">cfunding18@gmail.com</a></p>
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <form class="col-7 border p-5 shadow" @submit="getContactUs">
                            <div class="text-start mb-2">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" required>
                            </div>
                            <div class="text-start mb-2">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm" required>
                            </div>
                            <div class="text-start mb-2">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control form-control-sm" required>
                            </div>
                            <div class="text-start mb-2">
                                <label for="">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control form-control-sm" required>

                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary mt-3 col-12">Send to Admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light py-5 border-bottom" id="aboutUs">
            <div class="container px-5 my-5">
                <h1 class="text-center fw-bolder">About Us</h1><br>
                <div class="text-center">
                    We started a Crowdfunding out of a desire to help people living in Cordova.
                    We wanted to make a difference. But how can we have the greatest impact? By
                    giving others the stepping stone they need to pursue their world-changing dreams,
                    we can help her not only serve her one great purpose, but all at once. We recognize
                    that many objectives can be achieved. Crowdfunding is a great way to give your dreams
                    the financial boost they need. Charity makes a big difference in the world and we want to do our part.
                </div>
                <div class="text-center">
                    Our goal is to connect people who live in Cordova who need help to reach their goals
                    and who want to help others achieve their dreams through this system is we can connect
                    the crowd of all cordovanhon. The internet has opened the door for all Cordovanhons
                    who otherwise might not have the opportunity or the means to pursue their dreams. As
                    crowdfunding platforms have grown in popularity, more people have been able to follow the
                    path they should have. All campaigns funded through our site are designed to have a lasting
                    impact and we work hard to ensure that our users do.
                </div>
                <div class="text-center">
                    We believe everyone has the right to make their dreams come true, even if traditional
                    approaches do not. Crowdfunding systems are a great approach, whatever your dream
                    is. We exist to turn dreams into reality through global crowdfunding. Our passion is
                    connecting people around the Cordova and making an impact in our communities. If you
                    have a dream that you want to make come true and have been hesitant until now, this is
                    your chance to make it come true.
                </div><br>
                <div class="text-center">
                    <h1>TERMS AND CONDITIONS</h1><br>
                    <span>
                        Crowdfunding campaigns make dreams come true through charitable donations. To
                        ensure the protection of all users of this platform, we have established the following
                        terms and conditions. Failure to comply with these terms may result, among other
                        consequnces, in suspending or terminating your account at our sole discretion.
                        You are responsible for your account.  Be sure to enter accurate information when you
                        register and keep your information up to date.  Keep your password safe.  If you discover
                        that someone is using your account without your permission, contact us immediately.  We
                        are not responsible for any loss or damages caused by unauthorized use of your account
                        or from your failure to comply with our terms and conditions.
                        You may not impersonate anyone, use an offensive username, or violate another person’s
                        rights in any way. 
                        Always be truthful.  Do not seek to mislead others with inaccurate or false information.  Do
                        not do anything that could be considered fraudulent or deceptive. 
                        Do not use the same title, photos, or other content that another campaign is using, as this
                        could confuse potential contributors.  If two campaigns have used the same material or are
                        otherwise determined to be too similar, the first campaign to have been registered will be
                        deemed to be legitimate and the other will be removed.
                        We strongly encourage you to familiarize yourself with our terms and conditions and
                        policies before beginning your campaign with us.  We want you to keep every donation that
                        you raise, but we also take violations very seriously.  We reserve the right to remove any
                        content, campaign, or user account that violates our terms, and while we do not make such
                        decisions lightly, we also will not allow charity to be abused.  All removals and suspensions
                        are at our sole discretion and we reserve the right to decline to discuss the reasons for our
                        decisions with users.
                    </span>
                </div>
            </div>


        </section></br></br>
        <footer class="py-4">
            <div class="container-fluid">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
    </div>
    <?php
    include('linkFooter.php');
    ?>
</body>

</html>
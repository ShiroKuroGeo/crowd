<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">        
    <link rel="stylesheet" href="Assets/CSS/login.css">
    <link rel="stylesheet" href="Assets/CSS/bootstrap5.css">
</head>
<body class="vh-100">
    <div id="IndexForm">
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <img src="Assets/Img/Cordovalogo.png" alt="logo" width="80">
                </a>
                <a href="#" class="d-flex mx-5 text-decoration-none" data-bs-toggle="modal" data-bs-target="#RegisterForm">
                    Register
                </a>
                <div class="modal fade" id="RegisterForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                    <div class="form col-10">
                                        <div class="form-group">
                                            <label for="gcashqrcode">Profile Picture</label>
                                            <input type="file" class="form-control form-control-sm" id="gcashqrcode" name="file">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control form-control-sm" name="registerEmail" id="registerEmail" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-sm" name="registerpPassword" id="registerpPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm">Confirm Password</label>
                                            <input type="password" class="form-control form-control-sm" name="confirmpassword" id="confirm" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Location</label>
                                            <input type="text" class="form-control form-control-sm" id="country" name="country" placeholder="Country">
                                        </div>
                                        <div class="alert alert-danger mt-2 visually-hidden" id="alertPassword" role="alert">
                                            Password not Match.
                                        </div>
                                        <div class="alert alert-danger mt-2 visually-hidden" id="emptyFields" role="alert">
                                            Empty Fields
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" @click="registerForm" class="btn btn-sm btn-primary">Create Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid" id="loginForm">
            <div class="row mt-5 d-flex justify-content-center align-items-center">
                <div class="card mt-4 border-0 d-flex justify-content-center align-items-center">
                    <div class="card-body col-12 col-lg-4 border shadow">
                        <div class="card-title logo text-center">
                            <h6 class="fst-italic">Semi Crowd Funding</h6>
                            <img src="Assets/Img/Cordovalogo.png" class="mb-3" alt="logo" style="width: 150px">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="alert alert-dismissible fade show" id="form_alert" role="alert" style="display:none;">
                                <span class="alert_msg"></span>
                            </div>
                            <div class="form col-7">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="row login_forgot d-flex align-items-center justify-content-center">
                                    <div class="alert alert-danger text-center mt-2 col-11 visually-hidden" id="wrongValidations" role="alert">
                                        Wrong Validations or is Restricted Due of some cases.
                                    </div>
                                    <div class="col-12 text-center">
                                        <button @click="loginForm" class="btn btn-md btn-primary my-4 col-5">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="Middleware/Vue/vue.3.js"></script>
    <script src="Middleware/Vue/axios.js"></script>
    <script src="Middleware/authentication.js"></script>
    <script src="Assets/JS/bootstrap5.js"></script>
</body>
</html>
<?php require_once "controllerUserData.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>PDT Sign in & Sign up Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    input {
        font-family: "Poppins", sans-serif;
    }

    .container {
        position: relative;
        width: 100%;
        background-color: #fff;
        min-height: 160vh;
        overflow: hidden;
    }

    .forms-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .signin-signup {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        left: 75%;
        width: 50%;
        transition: 1s 0.7s ease-in-out;
        display: grid;
        grid-template-columns: 1fr;
        z-index: 5;
    }

    form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0rem 5rem;
        transition: all 0.2s 0.7s;
        overflow: hidden;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
    }

    form.sign-up-form {
        opacity: 0;
        z-index: 1;
    }

    form.sign-in-form {
        z-index: 2;
    }

    .title {
        font-size: 2.2rem;
        color: #444;
        margin-bottom: 10px;
    }

    .input-field {
        max-width: 380px;
        width: 100%;
        background-color: #f0f0f0;
        margin: 10px 0;
        height: 55px;
        border-radius: 55px;
        display: grid;
        grid-template-columns: 15% 85%;
        padding: 0 0.4rem;
        position: relative;
    }

    .input-field i {
        text-align: center;
        line-height: 55px;
        color: #acacac;
        transition: 0.5s;
        font-size: 1.1rem;
    }

    .input-field input {
        background: none;
        outline: none;
        border: none;
        line-height: 1;
        font-weight: 600;
        font-size: 0.9rem;
        color: #333;
    }

    .input-field select {
        background: none;
        outline: none;
        border: none;
        line-height: 1;
        font-weight: 600;
        font-size: 0.8rem;
        color: #333;
    }

    .input-field input::placeholder {
        color: #333;
        font-weight: 500;
        font-size: 0.8rem;
    }

    .social-text {
        padding: 0.7rem 0;
        font-size: 1rem;
    }

    .social-media {
        display: flex;
        justify-content: center;
    }

    .social-icon {
        height: 46px;
        width: 46px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 0.45rem;
        color: #333;
        border-radius: 50%;
        border: 1px solid #333;
        text-decoration: none;
        font-size: 1.1rem;
        transition: 0.3s;
    }

    .social-icon:hover {
        color: #4481eb;
        border-color: #4481eb;
    }

    .btn {
        width: 150px;
        background-color: #5995fd;
        border: none;
        outline: none;
        height: 49px;
        border-radius: 49px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.5s;
    }

    .btn:hover {
        background-color: #4d84e2;
    }

    .panels-container {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .container:before {
        content: "";
        position: absolute;
        height: 2000px;
        width: 2000px;
        top: -10%;
        right: 48%;
        transform: translateY(-50%);
        background-image: linear-gradient(-45deg, #4481eb 0%, #04befe 100%);
        transition: 1.8s ease-in-out;
        border-radius: 50%;
        z-index: 6;
    }

    .image {
        width: 100%;
        transition: transform 1.1s ease-in-out;
        transition-delay: 0.4s;
    }

    .panel {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-around;
        text-align: center;
        z-index: 6;
    }

    .left-panel {
        pointer-events: all;
        padding: 3rem 17% 2rem 12%;
    }

    .right-panel {
        pointer-events: none;
        padding: 3rem 12% 2rem 17%;
    }

    .panel .content {
        color: #fff;
        transition: transform 0.9s ease-in-out;
        transition-delay: 0.6s;
    }

    .panel h3 {
        font-weight: 600;
        line-height: 1;
        font-size: 1.5rem;
    }

    .panel p {
        font-size: 0.95rem;
        padding: 0.7rem 0;
    }

    .btn.transparent {
        margin: 0;
        background: none;
        border: 2px solid #fff;
        width: 130px;
        height: 41px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .right-panel .image,
    .right-panel .content {
        transform: translateX(800px);
    }

    /* ANIMATION */

    .container.sign-up-mode:before {
        transform: translate(100%, -50%);
        right: 52%;
    }

    .container.sign-up-mode .left-panel .image,
    .container.sign-up-mode .left-panel .content {
        transform: translateX(-800px);
    }

    .container.sign-up-mode .signin-signup {
        left: 25%;
    }

    .container.sign-up-mode form.sign-up-form {
        opacity: 1;
        z-index: 2;
    }

    .container.sign-up-mode form.sign-in-form {
        opacity: 0;
        z-index: 1;
    }

    .container.sign-up-mode .right-panel .image,
    .container.sign-up-mode .right-panel .content {
        transform: translateX(0%);
    }

    .container.sign-up-mode .left-panel {
        pointer-events: none;
    }

    .container.sign-up-mode .right-panel {
        pointer-events: all;
    }

    @media (max-width: 870px) {
        .container {
            min-height: 800px;
            height: 100vh;
        }

        .signin-signup {
            width: 100%;
            top: 95%;
            transform: translate(-50%, -100%);
            transition: 1s 0.8s ease-in-out;
        }

        .signin-signup,
        .container.sign-up-mode .signin-signup {
            left: 50%;
        }

        .panels-container {
            grid-template-columns: 1fr;
            grid-template-rows: 1fr 2fr 1fr;
        }

        .panel {
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            padding: 2.5rem 8%;
            grid-column: 1 / 2;
        }

        .right-panel {
            grid-row: 3 / 4;
        }

        .left-panel {
            grid-row: 1 / 2;
        }

        .image {
            width: 200px;
            transition: transform 0.9s ease-in-out;
            transition-delay: 0.6s;
        }

        .panel .content {
            padding-right: 15%;
            transition: transform 0.9s ease-in-out;
            transition-delay: 0.8s;
        }

        .panel h3 {
            font-size: 1.2rem;
        }

        .panel p {
            font-size: 0.7rem;
            padding: 0.5rem 0;
        }

        .btn.transparent {
            width: 110px;
            height: 35px;
            font-size: 0.7rem;
        }

        .container:before {
            width: 1500px;
            height: 1500px;
            transform: translateX(-50%);
            left: 30%;
            bottom: 68%;
            right: initial;
            top: initial;
            transition: 2s ease-in-out;
        }

        .container.sign-up-mode:before {
            transform: translate(-50%, 100%);
            bottom: 32%;
            right: initial;
        }

        .container.sign-up-mode .left-panel .image,
        .container.sign-up-mode .left-panel .content {
            transform: translateY(-300px);
        }

        .container.sign-up-mode .right-panel .image,
        .container.sign-up-mode .right-panel .content {
            transform: translateY(0px);
        }

        .right-panel .image,
        .right-panel .content {
            transform: translateY(300px);
        }

        .container.sign-up-mode .signin-signup {
            top: 5%;
            transform: translate(-50%, 0);
        }
    }

    .row {
        margin: 10px -15px;

    }

    .col_half {
        width: 50%;
        float: left;
        padding: 0 15px;
        box-sizing: border-box;
    }

    @media (max-width: 570px) {
        form {
            padding: 0 1.5rem;
        }

        .image {
            display: none;
        }

        .panel .content {
            padding: 0.5rem 1rem;
        }

        .container {
            padding: 1.5rem;
        }

        .container:before {
            bottom: 72%;
            left: 50%;
        }

        .container.sign-up-mode:before {
            bottom: 28%;
            left: 50%;
        }
    }


    /* PDT anime */

    #container {
        color: white;
        text-transform: uppercase;
        font-size: 36px;
        font-weight: bold;
        width: 100%;
        bottom: 70%;
        display: block;
    }

    #flip {
        height: 50px;
        overflow: hidden;
    }

    #flip>div>div {
        color: #fff;
        padding: 4px 12px;
        height: 45px;
        margin-bottom: 45px;
        display: inline-block;
    }

    #flip div:first-child {
        animation: show 5s linear infinite;
    }

    #flip div div {
        background: #42c58a;
    }

    #flip div:first-child div {
        background: #4ec7f3;
    }

    #flip div:last-child div {
        background: #DC143C;
    }

    @keyframes show {
        0% {
            margin-top: -270px;
        }

        5% {
            margin-top: -180px;
        }

        33% {
            margin-top: -180px;
        }

        38% {
            margin-top: -90px;
        }

        66% {
            margin-top: -90px;
        }

        71% {
            margin-top: 0px;
        }

        99.99% {
            margin-top: 0px;
        }

        100% {
            margin-top: -270px;
        }
    }
</style>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="log-sign.php" method="POST" autocomplete="" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                                echo "   ";
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input class="details" type="email" placeholder="Email Address" name="email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required />
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <input type="submit" class="btn solid" name="login" value="Login" />
                    <p class="social-text"> Sign in with </p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>


                <form action="log-sign.php" method="post" class="sign-up-form" enctype="multipart/form-data">
                    <h2 class="title">Sign up</h2>

                    <?php
                    if (count($errors) == 1) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    } elseif (count($errors) > 1) {
                    ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($errors as $showerror) {
                            ?>
                                <li>
                                    <?php echo $showerror; ?>
                                </li>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row clearfix">
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Full Name" name="firstname" required />
                            </div>
                        </div>

                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Email" name="email" required value="<?php echo $email ?>" />
                            </div>

                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-phone"></i>
                                <input type="number" placeholder="Phone No" name="phone" required <?php echo $phone ?> />
                            </div>
                        </div>
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-birthday-cake"></i>
                                <input type="date" placeholder="Birthdate" id="birthdate" name="birthdate" required />
                            </div>

                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-image" data-tippy="Add profile Photo"></i>
                                <input type="file" name="image" id="image" accept="image/png, image/jpeg" />
                            </div>
                        </div>
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-mars"></i>
                                <!-- <input type="file" name="my_image" id="my-image"> -->
                                <select name="gender" id="gender">
                                    <option disabled selected style="color: #aaa;" important!>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                        </div>
                    </div>



                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" placeholder="Address" name="address" required <?php echo $address ?> />
                    </div>

                    <div hidden class="input-field">
                        <input hidden type="text" name="type" value="3" />
                    </div>

                    <!-- <div class="input-field" hidden>
                        <i class="fas fa-address-card"></i>
                        <input hidden type="text" placeholder="usertype" name="usertype" required value="3" />
                    </div> -->

                    <div class="row clearfix">
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="password" required />
                            </div>
                        </div>
                        <div class="col_half">
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Re-type Password" name="cpassword" required />
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn" name="signup" value="Signup" />
                    <!-- <p class="social-text">Or Sign up with </p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div> -->
                </form>


            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <div id=container>
                        Parcel
                        <div id=flip>
                            <div>
                                <div>Tracking</div>
                            </div>
                            <div>
                                <div>And</div>
                            </div>
                            <div>
                                <div>Delivery</div>
                            </div>
                        </div>
                        Management System
                    </div>
                    <h3 style="color: greenyellow;"><br>New here ?</h3>
                    <p>
                        Please register yourself in our system for enjoying wonderful services.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="image/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <div id=container>
                        Parcel
                        <div id=flip>
                            <div>
                                <div>Tracking</div>
                            </div>
                            <div>
                                <div>And</div>
                            </div>
                            <div>
                                <div>Delivery</div>
                            </div>
                        </div>
                        Management System
                    </div>
                    <h3 style="color: greenyellow;"><br>Already have an account?</h3>
                    <p>
                        Click here for log into our system and order your parcel for wonderful parcel delivery services.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="image/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
    </script>
</body>

</html>
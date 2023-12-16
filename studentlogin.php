<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/stylelogin.css">
<script src="https://kit.fontawesome.com/2ba669933d.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <title>EduTrack - Login</title>

</head>

<body>
    <main>


        <main>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand text-dark" href="index.html">EduTrack</a> 
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-link active mr-3 text-dark" aria-current="page" href="index.html">Home</a>
                            <a class="nav-link mr-3 text-dark" href="aboutus.html">About Us</a>
                            <a class="nav-link mr-3 text-dark" href="selectuser.html">Login</a>
                            <a class="nav-link text-dark" href="signup.php">SignUp</a>
                        </div>
                    </div>
                </div>
            </nav>

            <br><br><br><br><br>
        <div class="container">
            <center><h4>Welcome Back Students</h4></center>
            <header>Login to EduTrack</header>
           
            <form class="form" action="studentloginprocess.php" method="post">
                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>
                    <label for="email">&nbsp; Email address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <label for="password">&nbsp; Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="d-flex flex-column align-items-center">
                    <div class="input-box mb-3">
                    
                    </div>
                
                    <div class="button-container text-center">
                        <button type="submit" name="loginsubmit" class="btn btn-primary mb-3">Login</button>
                    </div>
                
                    <div class="signup-link text-center font-weight-bold">
                        Not a member? <a href="signup.php">Signup now</a>
                    </div>
                </div>
                </div>
            </form>
        </div>
        
        <script>
            document.getElementById("smallHomeBtn").addEventListener("click", function() {
                window.location.href = "index.html";
            });
        </script>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>

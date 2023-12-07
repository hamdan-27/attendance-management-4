<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/stylesignup.css">
    <script src="https://kit.fontawesome.com/2ba669933d.js" crossorigin="anonymous"></script>
    <title>Edutrack Register</title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>

<body>

    <section class="container">
        <header>EduTrack Registration Form</header>
        <form action="adduser.php" method="post" class="form" onsubmit="return validateForm()">
            <div class="input-box">
                <label for="full-name">
                    <i class="fa-solid fa-user"></i>&nbsp; Full Name
                </label>
                <input type="text" id="full-name" name="full-name" placeholder="Enter full name" required />
            </div>

            <div class="input-box">
                <label for="email-address">
                    <i class="fa-solid fa-envelope"></i>&nbsp; Email Address
                </label>
                <input type="text" id="email-address" name="email-address" placeholder="Enter email address"
                    required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label for="phone-number">
                        <i class="fa-solid fa-phone"></i>&nbsp; Phone Number
                    </label>
                    <input type="number" id="phone-number" name="phone-number" placeholder="Enter phone number"
                        required />
                </div>
            </div>
            <div class="input-box">
                <label for="role">
                    <i class="fa-solid fa-repeat"></i>&nbsp; Role
                </label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Select a role</option>
                    <option value="Student">student</option>
                    <option value="Teacher">teacher</option>
                    <option value="Admin">admin</option>
                </select>
            </div>

            <div class="input-box">
                <label for="password">
                    <i class="fa-solid fa-lock"></i>&nbsp; Password
                </label>
                <input type="password" id="password" name="password" placeholder="Create A New Password" required />
            </div>
            <div class="input-box confirm-password">
                <label for="confirm-password">
                    <i class="fa-solid fa-lock"></i>&nbsp; Confirm Password
                </label>
                <input type="password" id="confirm-password" name="confirm-password"
                    placeholder="Confirm Your Password" required />
                <span id="password-error" class="error-message"></span>
            </div>

            <div class="button-container">
                <button id="homeButton" onclick="goToHomePage()">Home</button>
                <input type="hidden" name="submit" value="submit">
                <button type="submit" class="button">Submit</button>
                <button id="loginButton" onclick="goToLoginPage()">Login</button>
            </div>
        </form>
    </section>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;

            if (password !== confirmPassword) {
                document.getElementById("password-error").innerText = "Passwords do not match";
                return false;
            } else {
                document.getElementById("password-error").innerText = "";
                return true;
            }
        }

        function goToHomePage() {
            window.location.href = "index.html";
        }

        function goToLoginPage() {
            window.location.href = "selectuser.html"
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>

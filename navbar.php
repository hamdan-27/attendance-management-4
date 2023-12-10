<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
session_start();
?>

<style>
    * {
        font-size: 18px;
        padding: 0;
        margin: 0;
    }

    .navbar {
        padding: 10px;
        position: sticky;
        height: 10vh;
    }

    .navbar-nav .active a {
        font-weight: bold;
    }

    .vertical-line {
        border-left: 2px solid gainsboro;
        height: 70px;
        margin-left: 5px;
        margin-right: 10px;
    }

    .btn-primary {
        padding: 8px 20px 8px 20px;
        letter-spacing: 1px;
    }

    .btn-danger {
        padding: 8px 15px 8px 15px;
        letter-spacing: 1px;
    }

    .bi-person-circle {
        color: black;
    }
</style>

<?php
function generate_nav()
{
?>
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php'>EduTrack</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage==' index.html' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='index.php'>Home</a>
                </li>
            </ul>
        </div>
        <div class='d-flex align-items-center gap-3'>
            <span class='navbar-text' style='color: #003DB2; font-weight: bold;'>
            </span>
            <form class='form-inline'>
                <a href=" ../pages/login.php" class="btn btn-primary">Login</a>
                    </form>
        </div>
    </nav>
<?php
}
?>

<?php
function generate_common_nav($currentPage)
{
    ?>
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php'>EduTrack</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item <?= ($currentPage == 'index.php' ? 'active' : ''); ?>'>
                    <a class='nav-link' href='index.php'>Home</a>
                </li>
            </ul>
            <?php if ($_SESSION['user_role'] == 'Administrator') { ?>
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item <?= ($currentPage == 'admin_dashboard.php' ? 'active' : ''); ?>'>
                        <a class='nav-link' href='admin_dashboard.php'><b>Admin Dashboard</b></a>
                    </li>
                </ul>
            <?php } elseif ($_SESSION['user_role'] == 'Student') { ?>
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item <?= ($currentPage == 'student_dashboard.php' ? 'active' : ''); ?>'>
                        <a class='nav-link' href='student_dashboard.php'><b>Student Dashboard</b></a>
                    </li>
                </ul>
            <?php } elseif ($_SESSION['user_role'] == 'Teacher') { ?>
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item <?= ($currentPage == 'teacher_dashboard.php' ? 'active' : ''); ?>'>
                        <a class='nav-link' href='teacher_dashboard.php'><b>Teacher Dashboard</b></a>
                    </li>
                </ul>
            <?php } ?>
        </div>
        <?php generate_user_details(); ?>
    </nav>
    <?php
}
?>


<?php
function generate_user_details()
{
    ?>
    <div class='d-flex align-items-center gap-3'>
        <i class=" bi bi-person-circle" style="font-size: 2rem;"></i>
        <span class='navbar-text' style='color: #003DB2; font-weight: bold;'>
            <?php
            echo $_SESSION['user_fname']; // Display user's full name
            echo "<br>";
            echo $_SESSION['user_role']; // Display user's role
            ?>
        </span>
        <form class='form-inline' action="../pages/logout.php">
            <input type="submit" value="Logout" class="btn btn-danger">
        </form>
    </div>
    <?php
}
?>


    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    if (($currentPage == 'index.php' || $currentPage == 'login.php') && !isset($_SESSION['logged_in'])) { ?>
        <?php generate_nav(); ?>
    <?php
    } ?>

    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
    ?>
        <?php generate_common_nav(); ?>
        <?php
        if ($_SESSION['role_name'] == 'Administrator') { ?>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage==' admin_dashboard.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='admin_dashboard.php'><b>Admin Dashboard</b></a>
                </li>
            </ul>
            <div class=" vertical-line">
                    </div>
                    </div>
                    <?php generate_user_details(); ?>
    </nav>
<?php
        } else if ($_SESSION['role_name'] == 'Student') { ?>
    <ul class='navbar-nav ml-auto'>
        <li class='nav-item " . ($currentPage==' student_dashboard.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='student_dashboard.php'><b>Student Dashboard</b></a>
                </li>
            </ul>
            <div class=" vertical-line">
            </div>
            </div>
            <?php generate_user_details(); ?>
            </nav>
        <?php
        } else if ($_SESSION['role_name'] == 'Teacher') { ?>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage==' teacher_dashboard.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='teacher_dashboard.php'><b>Teacher Dashboard</b></a>
                </li>
            </ul>
            <div class=" vertical-line">
                    </div>
                    </div>
                    <?php generate_user_details(); ?>
                    </nav>
                <?php
            }
                ?>
            <?php
        }
            ?>
            <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">




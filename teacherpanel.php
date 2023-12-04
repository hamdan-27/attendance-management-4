<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher's page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
  <script src="js/teacherpanelscript.js"></script>
  <script src="https://kit.fontawesome.com/2ba669933d.js" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stylestudentpanel.css">
  <style>


#sidebar {
  position: fixed;
  height: 100%;
  width: 250px;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #2B5BA4;
  padding-top: 20px;
}

#content {
  margin-left: 250px;
  padding: 16px;
}


#sidebar h2 {
  background-color: white; 
  color: #111; 
  padding: 10px; 
  text-align: center; 
}


#sidebar .btn-dark {
  background-color: white;
  color: #111; 
  width: 100%; 
  margin-bottom: 10px;
  margin-left: 5px;
  border-radius: 10px;
  
  
}
#sidebar .btn-dark.active {
  background-color: grey;
}

#sidebar .btn-dark:hover {
  background-color: grey; 
}

@media screen and (max-width: 768px) {
  #sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }

  #content {
    margin-left: 0;
  }

 
  #sidebar h2 {
    padding: 10px;
  }
}


  </style>
</head>
<body>

<div id="sidebar">
  <h2>&nbsp; EduTrack</h2> <br>
  <ul class="nav flex-column">
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('teacherdashboard')">Dashboard</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('markattendance')">Mark Attendance</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('viewcourse')">View Courses</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('teacherviewclass')">View Classes</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('generateattendancereport')">Generate Attendance Report</button>
    </li> 
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('viewabsentapplications')">View Absent Application</button>
    </li> <br><br><br><br><br><br><br>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('logout')">Logout</button>
    </li>
  </ul>
</div>

<div id="content"></div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>
  document.addEventListener('DOMContentLoaded', function () {

    loadContent('teacherdashboard');
  });
</script>



<script>
  document.addEventListener('DOMContentLoaded', function () {

    loadContent('teacherdashboard');


    var buttons = document.querySelectorAll('.btn-dark');
    buttons.forEach(function(button) {
      button.addEventListener('click', function() {
      
        buttons.forEach(function(btn) {
          btn.classList.remove('active');
        });
      
        button.classList.add('active');
      });
    });
  });
</script>

</body>
</html>

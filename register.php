<?php
include("db.php");

if(isset($_POST['register'])){

    $fullname   = $_POST['fullname'];
    $email      = $_POST['email'];
    $mobile     = $_POST['mobile'];
    $college    = $_POST['college'];
    $department = $_POST['department'];
    $year       = $_POST['year'];
    $teamname   = $_POST['teamname'];
    $teamsize   = $_POST['teamsize'];
    $track      = $_POST['track'];
    $idea       = $_POST['idea'];

    $stmt = $conn->prepare("INSERT INTO registration
    (fullname,email,mobile,college,department,year_of_study,team_name,team_size,hackathon_track,project_idea)
    VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param(
        "sssssssiss",
        $fullname,
        $email,
        $mobile,
        $college,
        $department,
        $year,
        $teamname,
        $teamsize,
        $track,
        $idea
    );

    if($stmt->execute()){
        echo "<script>
        alert('Registration Successful!');
        window.location='register.php';
        </script>";
    }else{
        echo "<script>alert('".$stmt->error."');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | Amrita Online Hackathon 2026</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:
linear-gradient(rgba(10,15,40,.80),rgba(10,15,40,.80)),
url("symbol.png");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
background-attachment:fixed;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:30px;
}

.card{
width:100%;
max-width:850px;
background:rgba(255,255,255,.10);
backdrop-filter:blur(15px);
border:none;
border-radius:25px;
padding:35px;
color:white;
box-shadow:0 20px 50px rgba(0,0,0,.4);
}

.logo{
text-align:center;
font-size:40px;
margin-bottom:10px;
}

h2{
text-align:center;
font-weight:bold;
margin-bottom:5px;
}

.subtitle{
text-align:center;
color:#ddd;
margin-bottom:30px;
}

.form-control,
.form-select{
background:rgba(255,255,255,.12);
border:1px solid rgba(255,255,255,.2);
color:white;
}

.form-control::placeholder{
color:#ddd;
}

.form-control:focus,
.form-select:focus{
background:rgba(255,255,255,.18);
color:white;
box-shadow:none;
border-color:#ff4d79;
}

.form-select option{
color:black;
}

label{
margin-bottom:8px;
font-weight:600;
}

.btn-register{
width:100%;
padding:14px;
font-size:18px;
border:none;
border-radius:30px;
background:linear-gradient(45deg,#ff4d79,#ff9800);
color:white;
font-weight:bold;
transition:.3s;
}

.btn-register:hover{
transform:scale(1.03);
box-shadow:0 10px 25px rgba(255,100,100,.4);
}

.back{
text-align:center;
margin-top:20px;
}

.back a{
color:#fff;
text-decoration:none;
}

.back a:hover{
color:#ff9800;
}

</style>

</head>

<body>

<div class="card">

<div class="logo">
<i class="fa-solid fa-code"></i>
</div>

<h2>Amrita Online Hackathon 2026</h2>

<p class="subtitle">
Register your team and start building the future.
</p>

<form method="POST" action="">

<div class="row">

<div class="col-md-6 mb-3">
<label>Full Name</label>
<input type="text" class="form-control" name="fullname" placeholder="Enter your name" required>
</div>

<div class="col-md-6 mb-3">
<label>Email</label>
<input type="email" class="form-control" name="email" placeholder="Enter your email" required>
</div>

<div class="col-md-6 mb-3">
<label>Mobile Number</label>
<input type="tel" class="form-control" name="mobile" placeholder="10-digit mobile number" required>
</div>

<div class="col-md-6 mb-3">
<label>College / Institution</label>
<input type="text" class="form-control" name="college" placeholder="College Name" required>
</div>

<div class="col-md-6 mb-3">
<label>Department</label>
<input type="text" class="form-control" name="department" placeholder="Department">
</div>

<div class="col-md-6 mb-3">
<label>Year of Study</label>
<select class="form-select" name="year">
<option selected disabled>Select Year</option>
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
<option>4th Year</option>
<option>PG</option>
<option>Research Scholar</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label>Team Name</label>
<input type="text" class="form-control" name="teamname" placeholder="Awesome Coders">
</div>

<div class="col-md-6 mb-3">
<label>Team Size</label>
<select class="form-select" name="teamsize">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select>
</div>

<div class="col-md-12 mb-3">
<label>Hackathon Track</label>
<select class="form-select" name="track">
<option>Artificial Intelligence</option>
<option>Cloud Computing</option>
<option>Cyber Security</option>
<option>Blockchain</option>
<option>IoT</option>
<option>Healthcare</option>
<option>Sustainability</option>
<option>Open Innovation</option>
</select>
</div>

<div class="col-md-12 mb-4">
<label>Project Idea (Optional)</label>
<textarea class="form-control" rows="4" name="idea" placeholder="Briefly describe your idea..."></textarea>
</div>

</div>

<button type="submit" name="register" class="btn-register">
<i class="fa-solid fa-paper-plane"></i>
Register Now
</button>

</form>

<div class="back">
<a href="index.html">
<i class="fa-solid fa-arrow-left"></i>
Back to Home
</a>
</div>

</div>

</body>
</html>

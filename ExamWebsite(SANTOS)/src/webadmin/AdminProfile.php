<?php
include '../includes/connectdb.php';
	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erovoutika Exam Website - Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
            crossorigin="anonymous"
        />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
        <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/admin_profile_style.css">
    </head>

    <body id="body-pd">
        <header class="header shadow" id="header">
            <div class="header_toggle"> 
                <i class='bx bx-menu' id="header-toggle"></i> 
            </div>
            <div id="i--account--admin">
                <div class="header_img"> 
                    <a href="AdminProfile.php">
                        <?php 
                            $clUrID = $_SESSION['clUrID'];
                            $result = mysqli_query($connectdb, "SELECT clUrPhoto from tbusers where clUrID = $clUrID;");
                            $row = $result->fetch_assoc();

                            if ($row['clUrPhoto'] == ""){
                                echo '<img src="../images/Display Picture Icon.png" alt="display picture">';
                            }
                            else{
                                echo '<img src="../images/user images/'. $row['clUrPhoto'] .'" alt="display picture">';
                            }
                        ?>
                    </a>
                </div>
                <div>
                    <button type="button" class="btn ms-4 mt-2">
                        <a href="../includes/logout.php" class="fw-bold" id="i--button--logout">Logout</a>
                    </button>
                </div>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <!-- Admin Home with Logo -->
                    <a href="AdminHome.php" class="nav_logo"> 
                        <i>
                            <img src="../images/Small Logo.png" alt="Erovoutika Logo" id="i--logo--erovoutika">
                        </i> 
                        <span class="nav_logo-name fs-5 fw-bold">Erouvotika</span> 
                    </a>
                    <div class="nav_list"> 
                        <a href="AdminHome.php" class="nav_link"> 
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span> 
                        </a> 
                        <a href="AdminProfile.php" class="nav_link active">
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name fw-bold">Edit Profile</span> 
                        </a>
                        <a href="admin_usertable.php" class="nav_link"> 
                            <i class='bx bx-table nav_icon'></i>
                            <span class="nav_name">User Table</span> 
                        </a> 
                        <a href="AdminExamList.php" class="nav_link"> 
                            <i class='bx bx-message-square-detail nav_icon'></i> 
                            <span class="nav_name">Exam List</span> 
                        </a>
                    </div>
                </div> 
                    <a href="adminsignup_template.php"  class="btn btn-primary ms-3 mb-3">
                        <i class="bi bi-pencil-square"></i> 
                        <span class="nav_name" id="i--label--signout">Sign Up</span>
                    </a>
                </div> 
            </nav>
        </div>

        <!--Container Main start-->
        <div class="height-100" id="i--container--mainContent">
            <div class="container my-3">
                <div class="col display-6">
                    EDIT PROFILE
                </div>
                <form method="post" enctype="multipart/form-data">                
                    <div class="row mt-5">
                        <!-- Profile Section -->
                        <div class="col-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col fs-2">
                                        PROFILE
                                    </div>
                                </div>
                                <!-- Blue Line -->
                                <div class="row">
                                    <div class="col-4 ms-2" id="i--line--profile"></div>
                                </div>
                                <!-- Profile Banners -->
                                <!-- Firstname -->
                                <div class="row my-2 gy-3">
                                    <div class="col-11">
                                        <div class="card" id="i--card--edit">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row fs-4 fw-bold">
                                                        FIRSTNAME:
                                                    </div>
                                                    <div class="row" id="i--line--card"></div>
                                                    <div class="row mt-2 fs-5">
                                                        <!-- Display user's firstname as placeholder -->
                                                        <?php
                                                            $result = mysqli_query($connectdb, "SELECT clUrFirstname from tbusers where clUrID = $clUrID;");
                                                            $row = $result->fetch_assoc();
                                                            echo '<input type="name" class="form-control" id="adminName" aria-describedby="nameAdmin" placeholder="'. $row['clUrFirstname'] .'" name="adminFirstname">';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Lastname -->
                                    <div class="col-11">
                                        <div class="card" id="i--card--edit">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row fs-4 fw-bold">
                                                        Last NAME:
                                                    </div>
                                                    <div class="row" id="i--line--card"></div>
                                                    <div class="row mt-2 fs-5">
                                                        <!-- Display user's Lastname as placeholder -->
                                                        <?php
                                                            $result = mysqli_query($connectdb, "SELECT clUrLastname from tbusers where clUrID = $clUrID;");
                                                            $row = $result->fetch_assoc();
                                                            echo '<input type="name" class="form-control" id="adminName" aria-describedby="nameAdmin" placeholder="'. $row['clUrLastname'] .'" name="adminLastname">';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Username -->
                                    <div class="col-11">
                                        <div class="card" id="i--card--edit">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row fs-4 fw-bold">
                                                        USERNAME:
                                                    </div>
                                                    <div class="row" id="i--line--card"></div>
                                                    <div class="row mt-3 fs-5">
                                                        <!-- Display user's firstname as placeholder -->
                                                        <?php
                                                            $result = mysqli_query($connectdb, "SELECT clUrUsername from tbusers where clUrID = $clUrID;");
                                                            $row = $result->fetch_assoc();
                                                            echo '<input type="name" class="form-control" id="adminUN" aria-describedby="usernameAdmin" placeholder="'. $row['clUrUsername'] .'" name="adminUN">';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Photo -->
                                    <div class="col-11">
                                        <div class="card" id="i--card--edit">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row fs-4 fw-bold">
                                                        PHOTO:
                                                    </div>
                                                    <div class="row" id="i--line--card"></div>
                                                    <div class="row mt-3 fs-5">
                                                        <input type="file" class="form-control" id="customFile" name = "file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Cancel and Save Button -->
                                    <div class="col-11">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-5">
                                                    <a href="#">
                                                        <button type="button" class="btn btn-lg btn-danger" id="i--button--cancel">CANCEL</button>
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <input type = "hidden" name = "profile" value ="true">
                                                    <input type = "hidden" name = "password" value ="false">
                                                    <input type = "hidden" name = "delete" value ="false">
                                                    <button type="submit" formaction="AdminEditProfile.php" class="btn btn-lg btn-success" id="i--button--save">SAVE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Account Section -->
                        <div class="col-6">
                            <div class="container">
                                <!-- Header -->
                                <div class="row">
                                    <div class="col-11 fs-2">
                                        ACCOUNT
                                    </div>
                                </div>
                                <!-- Blue Line -->
                                <div class="row">
                                    <div class="col-4 ms-2" id="i--line--account"></div>
                                </div>
                                <!-- Account Banners -->
                                <div class="row mt-1 gy-4">
                                    <!-- Update Password -->
                                    <div class="col-11">
                                        <button type="button" class="btn" id="i--button--up" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                            <div class="card" id="i--card--edit">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row fs-4 fw-bold">
                                                            UPDATE PASSWORD
                                                        </div>
                                                        <div class="row" id="i--line--card"></div>
                                                        <div class="row mt-3 fs-5"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </button> 
                                    </div>
                                    <!-- Delete Account -->
                                    <div class="col-11">
                                        <button type="button" class="btn" id="i--button--up" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <div class="card" id="i--card--edit">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row fs-4 fw-bold">
                                                            DELETE ACCOUNT
                                                        </div>
                                                        <div class="row" id="i--line--card"></div>
                                                        <div class="row mt-3 fs-5"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <!-- Log Out -->
                                    <div class="col-11">
                                        <button type="button" class="btn" id="i--button--up" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                            <div class="card" id="i--card--edit">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row fs-4 fw-bold">
                                                            LOG OUT
                                                        </div>
                                                        <div class="row" id="i--line--card"></div>
                                                        <div class="row mt-3 fs-5"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal -->
            <!-- Passoword Modal -->
            <div id="passwordModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method = 'post'>
                            <div class="modal-body">
                                <label for="Password" class="form-label fw-bold">Enter the new Password:</label>
                                <input type="password" class="form-control" id="newPassword" aria-describedby="passwordNew" name = "newPassword">
                                <label for="Password" class="form-label mt-2 fw-bold">Re-enter the new Password:</label>
                                <input type="password" class="form-control" id="newPassword" aria-describedby="passwordNew" name = "newRePassword">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <input type = "hidden" name = "profile" value ="false">
                                <input type = "hidden" name = "password" value ="true">
                                <input type = "hidden" name = "delete" value ="false">
                                <!--<button type="button" class="btn btn-success" data-bs-dismiss="modal">-->
                                <button type="submit" class="btn btn-success" formaction="AdminEditProfile.php">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div id="deleteModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                All data saved on this admin account will be deleted. <br>
                                Do you want to proceed?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <form method = "post">
                                <input type = "hidden" name = "profile" value ="false">
                                <input type = "hidden" name = "password" value ="false">
                                <input type = "hidden" name = "delete" value ="true">
                                <!--<button type="button" class="btn btn-danger" data-bs-dismiss="modal">-->
                                <button type="submit" class="btn btn-danger" formaction="AdminEditProfile.php">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout Modal -->
            <div id="logoutModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Log Out</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Do you want to log out?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <!--<button type="button" class="btn btn-danger" data-bs-dismiss="modal">-->
                            <a href="../includes/logout.php">
                                <button type="button" class="btn btn-danger">
                                    Log Out
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <!--Container Main end-->
        
        <footer>
            <!-- This is where the footer is -->
        </footer>

        <!-- Custom Javascript -->
        <script src="../javascript/admin_home_script.js"></script>
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    </body>
</html>
<?php
	}else
	{
		if($_SESSION['client_sid']==session_id()){
			header("location:../includes/error.php");		
		}
		else{
				header("location:../login_template.php");
			}
	}

    //UPDATE PASSWORD

?>

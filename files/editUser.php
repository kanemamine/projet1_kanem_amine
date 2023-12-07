<title>Modification Profil</title>
<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('location: index.php');
  exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include '../includes/userInfo.php';
include '../includes/head.php' ;
$actual_page = 'editProfil.php';
// include '../includes/logVerif.php';
?>

<link rel="stylesheet" href="../CSSs/editProfil.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <button class="cta">
            <a href="adminUsers.php">Page admin</a>
            <svg viewBox="0 0 13 10" height="10px" width="15px">
            <path d="M1,5 L11,5"></path>
            <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </button>

        <div class="title container">
            <h1>Modifiez votre profil :</h1> 
            <!-- <hr> -->
        </div>

        <?php 
            include '../includes/dB.php';
            $conn = mysqli_connect("localhost", "root", "root", "amine");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // $id = $_GET['id'];
            $email = $_GET['email'];
            $q = 'SELECT * FROM user WHERE email = ?';
            $stmt = mysqli_prepare($conn, $q);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            $id = $row['id'];
            $firstName = $row['fname'];
            $lastName = $row['lname'];
            $email = $row['email'];
            $user_role = $row['user_role'];
            $phone = $row['phone'];
            $adresse = $row['adresse'];
            $user_name = $row['user_name'];
     
        ?>

        <div class="all container">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="profil_infos d-flex flex-column align-items-center text-center p-3 py-5">
                        <img src="../images/3551739.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <?php
                            echo '<span class="name font-weight-bold">' . $firstName . ' ' . $lastName . '</span>
                                <span class="text-black-50">';
                                
                                if($user_role == 2) {
                                    echo '<span class="poste text-black-50">' . "Administrateur". '</span>';
                                }else if($user_role == 1){
                                    echo '<span class="poste text-black-50">' . "Client" . '</span>';
                                    }; 
                                echo '</span></div>';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <a href="profil.php" class="link-dark"><h6> Retour au profil</h6></a>
                                </div>
                                <h6 class="text-right">Edit Profile</h6>
                            </div> -->
                            
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row mt-2">
                                    <?php
                                    
                                        echo'<div class="col-md-6"><input type="text" name="prenom" placeholder="Prénom" value="' . $firstName . '"></div>
                                                <div class="col-md-6"><input type="text" name="nom" placeholder="Nom" value="' . $lastName . '"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><input type="email" name="user_name" placeholder="username" value="' . $user_name . '" readonly></div>
                                                <div class="col-md-6"><input type="text" name="email" placeholder="email" value="' . $email . '"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><input type="text" name="phone" placeholder="phone" value="' . $phone . '"></div>
                                                <div class="col-md-6"><input type="text" name="adresse" placeholder="adresse" value="' . $adresse . '"></div>
                                            </div>';
                                    ?>
                                </div>
                                <?php include '../includes/message.php'; ?>
                                <div class="text-right"><button class="change_infos" type="submit">Enregitrer les modifications</button></div>
                            </form>

                            <?php
                                

                                if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['user_name']) && isset($_POST['adresse'])) {
                                    $prenom = $_POST['prenom'];
                                    $nom = $_POST['nom'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $user_name = $_POST['user_name'];
                                    $adresse = $_POST['adresse'];
                                
                                    $q = 'UPDATE user SET fname = "'.$prenom.'", lname = "'.$nom.'", email = "'.$email.'", phone = "'.$phone.'", user_name = "'.$user_name.'", adresse = "'.$adresse.'" WHERE id = '.$id.'';
                                    $result = mysqli_query($conn, $q);
                                
                                    // header('location: editUser.php?message=Les informations ont bien été modifiées');
                                    echo "<script>window.location.href='adminUsers.php?message=Les informations ont bien été modifiées';</script>";
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
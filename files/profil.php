
<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['email'])){
  header('location: index.php');
  exit;
}
include '../includes/userInfo.php';
include '../includes/head.php' ;
$actual_page = 'profil.php';
// include '../includes/logVerif.php';
include '../includes/dB.php';
?>


<link rel="stylesheet" href="../CSSs/profil.css">
<title>Mon profil</title>
</head>
<html>
    <body>
      <main>
          <div class="cont1 container">

            <button class="cta">
              <a href="index_user.php"><ion-icon name="home-outline"></ion-icon>Accueil</a>
              <svg viewBox="0 0 13 10" height="10px" width="15px">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
              </svg>
            </button>
            

            <?php  
            include '../includes/message.php';
            ?>
            <div class="col-lg-5">
            <div class="profil col-lg-12 text-center">
                <a href="deconnexion.php" class="logout"><ion-icon name="log-out-outline"></ion-icon></a>
                <img src="../images/3551739.jpg" alt="avatar"² class="rounded-circle img-fluid" style="width: 150px;">
                <?php
                echo '<h3 class="name">' . ucfirst(strtolower($userInfo[0]['fname'])) . ' ' . strtoupper($userInfo[0]['lname']) . '</h3>';

                $userInfSelect = 'SELECT role_id FROM user WHERE email = :email';
                $req = $bdd->prepare($userInfSelect);
                $req->execute([
                    'email' => $_SESSION['email']
                ]);
                $userRoleId = $req->fetchColumn();

                if ($userRoleId == 1) {
                    echo '<h3 class="role">Client</h3>';
                    echo '<div class="btns d-flex justify-content-center mb-2">';
                      echo '<a href="editProfil.php"><button type="button">Modifier le profil</button></a>';
                      echo '<a class="suppression" href="suppression.php"><button type="button">Supprimer le profil</button></a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

            <!-- line -->        
            <div class="col-lg-7">
              <div class="infos card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Nom complet</p>
                  </div>
                  <div class="col-sm-8">
                    <?php echo '<p class="output text-muted mb-0">' .  ucfirst(strtolower($userInfo[0]['fname'])) . ' ' . strtoupper($userInfo[0]['lname']) . '</p>'; ?>
                  </div>
                </div>
                <hr>
                <!-- line -->
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-8">
                    <?php echo '<p class="output text-muted mb-0">' . $userInfo[0]['email'] . '</p>'; ?>
                  </div>
                </div>
                <hr>
                <!-- line -->
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Nom d'utilisateur</p>
                  </div>
                  <div class="col-sm-8">
                    <?php 
                      if($userInfo[0]['user_name'] == NULL){
                        echo '<p class="output text-muted mb-0">Username</p>';
                      }else{
                        echo '<p class="output text-muted mb-0">' . $userInfo[0]['user_name'] . '</p>';
                      }
                    ?>               
                  </div>
                </div>
                <!-- line -->             
                <!-- <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Telephone</p>
                  </div>
                  <div class="col-sm-8">
                    <php 
                      if($userInfo[0]['phone'] == NULL){
                        echo '<p class="output text-muted mb-0">Telephone</p>';
                      }else{
                        echo '<p class="output text-muted mb-0">' . $userInfo[0]['phone'] . '</p>';
                      }
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Adresse</p>
                  </div>
                  <div class="col-sm-8">
                    <php  echo '<p class="output text-muted mb-0">' . $userInfo[0]['adresse'] . '</p>'; ?> 
                  </div>
                </div> -->
              </div>
            </div>                 
          </div>
        </div>
          
      </main>
    </body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Profil</title>
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
        </div>

        <?php
            include '../includes/dB.php';
            $conn = mysqli_connect("localhost", "root", "root", "amine_bdd");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Vérifiez si l'email est défini et n'est pas vide avant de l'utiliser dans la requête SQL
            if (isset($_GET['email']) && !empty($_GET['email'])) {
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
                $user_role = $row['role_id'];
                $user_name = $row['user_name'];
            } else {
                // Gérez le cas où l'email n'est pas défini ou vide
                echo "L'email n'est pas spécifié.";
                exit;
            }
        ?>

        <div class="all container">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="profil_infos d-flex flex-column align-items-center text-center p-3 py-5">
                        <img src="../images/3551739.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <?php
                            echo '<span class="name font-weight-bold">' . $firstName . ' ' . $lastName . '</span>
                                <span class="text-black-50">';
                                
                                if ($user_role == 2) {
                                    echo '<span class="poste text-black-50">' . "Administrateur" . '</span>';
                                } else if ($user_role == 1) {
                                    echo '<span class="poste text-black-50">' . "Client" . '</span>';
                                };
                                echo '</span></div>';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row mt-2">
                                    <?php
                                        echo '<div class="col-md-6"><input type="text" name="prenom" placeholder="Prénom" value="' . $firstName . '"></div>
                                              <div class="col-md-6"><input type="text" name="nom" placeholder="Nom" value="' . $lastName . '"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><input type="email" name="user_name" placeholder="username" value="' . $user_name . '" readonly></div>
                                                <div class="col-md-6"><input type="text" name="email" placeholder="email" value="' . $email . '"></div>
                                            </div>';
                                    ?>
                                </div>
                                <?php include '../includes/message.php'; ?>
                                <div class="text-right"><button class="change_infos" type="submit">Enregistrer les modifications</button></div>
                            </form>

                            <?php
                                if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email'])) {
                                    $prenom = $_POST['prenom'];
                                    $nom = $_POST['nom'];
                                    $email = $_POST['email'];

                                    $q = 'UPDATE user SET fname = ?, lname = ?, email = ? WHERE id = ?';
                                    $stmt = mysqli_prepare($conn, $q);
                                    mysqli_stmt_bind_param($stmt, "sssi", $prenom, $nom, $email, $id);
                                    $result = mysqli_stmt_execute($stmt);

                                    if ($result) {
                                        echo "<script>window.location.href='adminUsers.php?message=Les informations ont bien été modifiées';</script>";
                                    } else {
                                        echo "Erreur lors de la mise à jour des informations.";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
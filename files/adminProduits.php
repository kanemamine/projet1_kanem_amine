
<?php
  session_start();
  if(!isset($_SESSION['email'])){
    header('location: index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<style>
    
.produit .card {
    border: 1px solid rgba(0,0,0,.125);
    padding: 5px 5px;
    box-shadow: 0px;
}

.produit .card::after {
    position: absolute;
    z-index: -1;
    opacity: 0;
    -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.produit .card:hover {
    transform: scale(1.02, 1.02);
    -webkit-transform: scale(1.02, 1.02);
    backface-visibility: hidden; 
    will-change: transform;
    box-shadow: 0 1rem 3rem rgba(211, 211, 211, 0.75) !important;
}

.produit .card:hover::after {
    opacity: 1;
}

.produit .card:hover .btn-outline-primary{
    color:white;
    background:rgb(24, 119, 242);
}
.imageproduit  a ion-icon
{
    color: rgb(246, 139, 30);
}
.imageproduit  a ion-icon:hover
{
    color: rgb(255, 0, 0);
}
.titre
{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}
.titre h4
{
    font-size: 18px;
}
.titre h5, .titre h6
{
    font-size: 15px;
}
.titre h6
{
    font-size: 15px;
    color: #929292;
}
.prix li
{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.prix li h4
{
    font-size: 20px;
    margin: 0;
}
.prix li a
{
    display: flex;
    justify-content: center;
    text-align: center;
}
.card .prix li .delete {
    background-color: rgb(242, 242, 242);
    border: rgb(255, 255, 255);
    color: red;
}

.prix li .btn
{
    font-size: 20px;
    padding: 4px 4px 4px 3px;
    color: #ffffff;
    border: 2px solid rgb(255, 195, 135);
    background-color: rgb(246, 139, 30);
    border-radius: 7px;
    margin: 0;
    width: 35px;
    height: 35px;
}
.prix li .btn:hover
{
    font-size: 20px;
    padding: 4px 4px 4px 3px;
    color: #464646;
    transition: 0.4s;
    background-color: rgb(248, 131, 14);
    border: 2px solid rgb(255, 195, 135);
    border-radius: 7px;
}
.produit .card-body div{
    display: flex;
    justify-content: center;
    align-items: center;
}
.produit .card-body img{
    width:100%;
    height: 150px;
}
</style>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link sizes="76x76" href="../images/logo_without_text.png">
  <link rel="icon" type="image/png" href="../images/logo_without_text.png">
  <title>Admin Users</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header d-flex ">
      <a class="navbar-brand m-0 d-flex justify-content-center " href="#" target="_blank">
        <img src="../images/logo_lupum.png" alt="main_logo">
      </a>
      <a href="deconnexion.php" class="logout"><ion-icon name="log-out-outline"></ion-icon></a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        
        <li class="nav-item">
            <a class="nav-link  " href="adminUsers.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <ion-icon name="game-controller-outline"></ion-icon>
                </div>
                <span class="nav-link-text ms-1">Users</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="adminProduits.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Produits</span>
          </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="adminPaiements.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>office</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                        <g id="office" transform="translate(153.000000, 2.000000)">
                            <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                            <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                        </g>
                        </g>
                    </g>
                    </g>
                </svg>
                </div>
                <span class="nav-link-text ms-1">Paiements</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="adminCommandes.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Commandes</span>
          </a>
        </li>
  </aside>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Users</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "root", "root", "amine_bdd");

    // Requête pour obtenir le nombre total de produits
    $q = 'SELECT COUNT(*) FROM product';
    $req = mysqli_prepare($conn, $q);
    mysqli_stmt_execute($req);
    $total_products = mysqli_stmt_get_result($req)->fetch_row()[0]; // Utilisez fetch_row pour obtenir une seule valeur

?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card produit mb-4">
                <div class="card-header pb-0">
                    <h6>Liste des Produits :</h6>
                    <h6>Total : <?php echo $total_products; ?> </h6>
                    <a href="addProduit.php" class="btn btn-sm btn-primary">Ajouter un produit</a>
                </div>
                <div class="row">
                    <?php
                    // Récupération des informations des produits depuis la table product
                    $query = 'SELECT * FROM product';
                    $result = mysqli_query($conn, $query);

                    // Vérification s'il y a des résultats
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-lg-2 col-md-4 col-6 mb-4">
                                <form method="POST" action="deleteProduit.php">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="imageproduit">
                                                <!-- <a href="#" style="font-size:25px; position: absolute; right: 10px; top: 8px;">
                                                  <ion-icon name="settings-outline"></ion-icon>
                                                </a> -->
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <img src='<?php echo $row["img_url"]; ?>' class="img-fluid" style="">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group pt-2 px-2 list-group-flush description">
                                            <li class="list-group-item px-1 titre">
                                                <h4><?php echo $row["name"]; ?></h4>
                                                <h5><?php echo $row["description"]; ?></h5>
                                                <h6><?php echo $row["price"]; ?> $</h6>
                                                <h6>Quantité : <?php echo $row["quantity"]; ?></h6>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-flush prix">
                                            <li class="list-group-item pt-2 pb-2">
                                                <h4><?php echo $row["price"]; ?> $</h4>
                                                <input type="hidden" name="productId" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="delete">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                                
                            </div>
                            <?php
                        }
                    } else {
                        echo "Aucun produit trouvé.";
                    }

                    // Fermer la connexion à la base de données
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

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
 header {
    background-color: transparent;
    width: 100%;
    z-index: 1;
}
header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 17% 0px 10%;
}
.menu ul{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.menu ul li{
    list-style: none;
    margin: 0 20px 0 0 ;
    text-decoration: none;
}
.menu ul li a{
    text-decoration: none;
    color: #393939;
    font-size: 20px;
}
.menu ul .simple_button{
    border: 3px solid #D3BEFF;
    border-radius: 13px;
    padding: 5px 20px 5px 17px;
}
.menu ul .big_button{
    border: 3px solid #F68B1E;
    background-color: #F68B1E;
    border-radius: 13px;
    padding: 12px 20px;
}
.menu ul li a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0;
}
.menu ul li a i {
    padding: 0 10px 0 0;
}
.menu ul li a ion-icon {
    padding: 0 7px 0 0;
    font-size: 28px;
}
.logo{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}
.logo img{
    width: 200px;
}
main{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
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
    <header>
        <div class="container">
            <svg class="vagues" id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 180" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(245, 238, 255, 1)" offset="0%"></stop><stop stop-color="rgba(245, 238, 255, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,132L80,113.7C160,95,320,59,480,62.3C640,66,800,110,960,106.3C1120,103,1280,51,1440,58.7C1600,66,1760,132,1920,161.3C2080,191,2240,183,2400,150.3C2560,117,2720,59,2880,51.3C3040,44,3200,88,3360,95.3C3520,103,3680,73,3840,73.3C4000,73,4160,103,4320,121C4480,139,4640,147,4800,128.3C4960,110,5120,66,5280,58.7C5440,51,5600,81,5760,99C5920,117,6080,125,6240,113.7C6400,103,6560,73,6720,62.3C6880,51,7040,59,7200,77C7360,95,7520,125,7680,113.7C7840,103,8000,51,8160,47.7C8320,44,8480,88,8640,88C8800,88,8960,44,9120,51.3C9280,59,9440,117,9600,124.7C9760,132,9920,88,10080,66C10240,44,10400,44,10560,58.7C10720,73,10880,103,11040,102.7C11200,103,11360,73,11440,58.7L11520,44L11520,220L11440,220C11360,220,11200,220,11040,220C10880,220,10720,220,10560,220C10400,220,10240,220,10080,220C9920,220,9760,220,9600,220C9440,220,9280,220,9120,220C8960,220,8800,220,8640,220C8480,220,8320,220,8160,220C8000,220,7840,220,7680,220C7520,220,7360,220,7200,220C7040,220,6880,220,6720,220C6560,220,6400,220,6240,220C6080,220,5920,220,5760,220C5600,220,5440,220,5280,220C5120,220,4960,220,4800,220C4640,220,4480,220,4320,220C4160,220,4000,220,3840,220C3680,220,3520,220,3360,220C3200,220,3040,220,2880,220C2720,220,2560,220,2400,220C2240,220,2080,220,1920,220C1760,220,1600,220,1440,220C1280,220,1120,220,960,220C800,220,640,220,480,220C320,220,160,220,80,220L0,220Z"></path></svg>
            <div class="logo">
                <img src="../images/logo_lupum.png" alt="logo">
                <div class="menu">
                    <ul>
                        <li class="simple_button"><a href="#text"><ion-icon name="information-circle-outline"></ion-icon>Infos</a></li>
                        <li class="simple_button"><a href="produits.php"><ion-icon name="information-circle-outline"></ion-icon>Produits</a></li>
                        <li class="simple_button"><a href="panier.php"><ion-icon name="cart-outline"></ion-icon>Panier</a></li>
                        <li class="big_button"><a href="index_user.php"><i class="fa-regular fa-user"></i>Accueil</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

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
                                <form method="POST" action="ajouterAuPanier.php">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="imageproduit">
                                                <button type="submit" name="addToCart" style="font-size: 25px; position: absolute; right: 10px; top: 8px; background: transparent; border: none;">
                                                    <ion-icon name="cart-outline"></ion-icon>
                                                </button>
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
                                                <input type="hidden" name="productName" value="<?php echo $row['name']; ?>">
                                                <input type="hidden" name="productPrice" value="<?php echo $row['price']; ?>">
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
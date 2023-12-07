<?php
    include 'includes/verifRoleAdmin.php';
    $actual_page = 'produits.php';
    include 'includes/bodyDash.php';
    include 'includes/Product.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="../CSSs/carteProduit.css">
</head>
<body>
    <section class="pb-5">  
        <div class="container px-4 pt-4 pb-3">
            <div class="row">
                <?php
                    echo '
                    <div class="col-lg-3 col-md-12 mb-4">
                        <form id="deleteProduct" method="POST" enctype="multipart/form-data">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="imageproduit">
                                        <a href="#" style="font-size:25px; position: absolute; right: 10px; top: 8px;">
                                            <ion-icon name="heart-outline" title="Favoris"></ion-icon>
                                        </a>
                                        <div style="display: flex; justify-content: center; align-items: center;">
                                            <img src=' . $productInfo[$i]["product_image"] . ' class="img-fluid" style="">
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group pt-2 px-2 list-group-flush description">
                                    <li class="list-group-item px-1 titre">
                                        <h4>'.$productInfo[$i]["product_name"].'</h4>
                                        <h5>'.$productInfo[$i]["product_desc"].'</h5>
                                        <h6>'.$productInfo[$i]["product_price"].' € / KG</h6>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush prix">
                                    <li class="list-group-item pt-2 pb-2">
                                        <h4>'.$productInfo[$i]["product_price"].' €</h4>
                                        <button type="button" class="delete" onclick="deleteProduct(' . $productInfo[$i]["id"] . ')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button> 
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>';
                
                ?>
            </div>
        </div>
    </section>
</body>
</html>
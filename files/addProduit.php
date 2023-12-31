<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include '../includes/dB.php';
    include '../includes/head.php';
?>
<link rel="stylesheet" href="../CSSs/addProduit.css">

<body>
    <main>
        <button class="cta">
            <a href="adminProduits.php">Liste des Produits</a>
            <svg viewBox="0 0 13 10" height="10px" width="15px">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </button>

        <div class="title container">
            <h1>Ajouter un Produit :</h1>
        </div>
        <div class="all container">
            <div class="row">
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <form action="addProduit_bdd.php" method="POST" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-6"><input type="text" name="name" placeholder="Nom du Produit" required></div>
                                <div class="col-md-6"><input type="number" name="price" placeholder="Prix" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><textarea name="description" placeholder="Description" required></textarea></div>
                                <div class="col-md-6"><input type="number" name="quantity" placeholder="Quantité" required></div>
                            </div>
                            <div class="row mt-3">
                                <input type="file" name="productImage" accept="image/*" required>
                            </div>
                            
                            <div class="text-right"><button class="change_infos" type="submit" name="addProduct">Ajouter le Produit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
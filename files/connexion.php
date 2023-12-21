<?php include '../includes/head.php' ?>
<title>Connexion</title>
<script src="../js/transition.js"></script>
<link href="../CSSs/connexion.css" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
    <body class="text-center">
        <main>
          <div class="bloc">
            <h3 class="hello">Content de vous revoir !</h3>
            <div class="description">
                <img src="../images/connexion.png" alt="inscription image">
                <h3>Explorez notre catalogue, ajoutez des produits à votre panier, et profitez d'une expérience de shopping en ligne exceptionnelle.</h3>
            </div> 

            <form action="verif_connexion.php" method="post">
                <h1>Connectez-vous</h1>
                <?php include '../includes/message.php' ?>

                <div class="email">
                    <input type="email" name="email" placeholder="Adresse mail">  
                </div>

                <div class="password">
                    <input type="password" name="pwd" placeholder="Mot de passe">
                </div>

                <button type="submit" name="submit">Connexion</button><br>

                <div class="possession">
                    <p>Vous n’avez pas encore de compte !</p>
                    <a href="inscription.php">S’inscrire</a>
                </div>
            </form>

            <button class="cta">
                <a href="index.php">Accueil</a>
                <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </button>
          </div>
        </main>
    </body>
</html>



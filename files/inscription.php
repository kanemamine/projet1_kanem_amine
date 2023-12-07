<?php include '../includes/head.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<title>Inscription</title>
<link href="../CSSs/inscription.css" rel="stylesheet">
</head>
<script src="../js/transition.js"></script>
<body>
  <main>
    <div class="bloc">
        
        <h3 class="hello">Bienvenue !</h3>
        <form action="verif_inscription.php" method="POST">
          <h1>Inscrivez-vous</h1>
          <?php include '../includes/message.php' ?>

          <div class="email">
            <input type="email" placeholder="Adresse mail" required="" name="email">  
          </div>

          <div class="username">
            <input type="texte" placeholder="Nom d'utilisateur" required="" name="user_name">
          </div>

          <div class="lastName">
            <input type="texte" placeholder="Nom" required="" name="lname">  
          </div>
          
          <div class="firstName">
            <input type="texte" placeholder="Prénom" required="" name="fname">
          </div>

          <div class="password1">
            <input type="password" placeholder="Mot de passe" required="" name="pwd">
          </div>

          <button type="submit" name="submit">S'inscrire</button><br>
          
          <div class="possession">
            <p>Vous avez déjà un compte ?</p>
            <a href="connexion.php">Se connecter</a>
          </div>
        </form>

        <div class="description">
          <img src="../images/inscription-removebg-preview.png" alt="inscription image">
          <h3>Rejoignez nous pour profiter de nos services !</h3>
        </div>
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
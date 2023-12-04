<style>
    .confirm{
        position: absolute;
        top: 20px;
        right: 20px;
        width: 300px;
        border: 2px solid #3db779;
        border-radius: 7px;
        background-color: #D3BEFF;
        color: #3db779;
    }
    .rejet{
        position: absolute;
        top: 20px;
        right: 20px;
        width: 300px;
        border: 2px solid #ff0000;
        border-radius: 7px;
        background-color: #D3BEFF;
        color: #ff0000;
    }
</style>
<div class="error">
    <?php 
    if(isset($_GET['message']) && !empty($_GET['message'])){
        $error = htmlspecialchars($_GET['message']);
        if($error == 'Compte créé avec succès' || $error == 'Informations modifiés avec succès'){
            echo '<div class="confirm">' . $error . '</div>';
        }
        else{
        echo '<div class="rejet">' . $error . '</div>';
        }
    }
    ?>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
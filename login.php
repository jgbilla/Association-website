<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  
  <title>Se connecter</title>
</head>

<body>
<form method="POST", action="login.php">

<?php echo display_error(); ?>

<div class="cont">
  <div class="form sign-in">
    <h2>Nous sommes contents de vous retrouver,</h2>
    <label>
        <span>Numero de telephone</span>
        <input type="phone", name="phone_number"/>
        </label>
    <label>
      <span>Mot de passe</span>
      <input type="password" name="password" />
    </label>
    <p class="forgot-pass">Mot de passe oublie?</p>
    <button type="submit" class="submit" name="login_btn">Se connecter</button>
    
  </div>
  
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>Nouveau?</h2>
        <p>Creer un compte et decouvrer d'innombrables opportunites!</p>
      </div>
      <div class="img__text m--in">
        <h2>Deja membre?</h2>
        <p>Si vous avez deja un compte, connectez vous!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Creer un compte</span>
        <span class="m--in">Se connecter</span>
      </div>
    </div>

</form>

<form method="POST", action="login.php">

    <div class="form sign-up">
      <h2>Bienvenue dans la Communaute Mathematique</h2>
      <label>
        <span>Nom</span>
        <input type="text" name="username" value="<?php echo $username; ?>" />
        </label>
      <label>
        <span>Numero de telephone</span>
        <input type="phone", name="phone_number"/>
        </label>
      <label>
        <span>Mot de Passe</span>
        <input type="password" name="password_1" />
      </label>

      <label>
        <span>Confirmer le mot de passe</span>
        <input type="password" name="password_2" />
      </label>

      <button type="submit" class="submit" name="register_btn">Creer un compte</button>
    </div>
  </div>
</div>
</form>


<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
  <script src="login.js"></script>
  <div align="center"><a class="savoir" href="main.html" target="_blank" rel="nofollow noopener">Revenir a la Page d'Acceuil</a></div>

</body>
</html>
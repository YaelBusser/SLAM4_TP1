<form action="/inscription" method="POST" class="block-form">
    <input type="text" placeholder="Votre login..." name="loginInscription" value="<?php if(isset($_POST["loginInscription"])){ echo $_POST["loginInscription"]; } ?>">
    <input type="email" placeholder="Votre email..." name="emailInscription" value="<?php if(isset($_POST["emailInscription"])){ echo $_POST["emailInscription"]; } ?>">
    <input type="password" placeholder="Votre mot de passe..." name="pwdInscription">
    <input type="password" placeholder="Confirmez votre mot de passe..." name="pwd2Inscription">
    <input type="submit" value="s'inscrire" name="btnInscription" class="btn-form">
    <p><?= $errorInscription; ?></p>
</form>
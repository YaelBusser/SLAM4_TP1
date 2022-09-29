<form action="/inscription" method="POST" class="block-form">
    <h1>Inscription</h1>
    <span>
        <i class="bi bi-person"></i>
        <input type="text" placeholder="Votre login..." name="loginInscription"
               value="<?php if (isset($_POST["loginInscription"])) {
                   echo $_POST["loginInscription"];
               } ?>">
    </span>
    <span>
        <i class="bi bi-envelope"></i>
        <input type="email" placeholder="Votre email..." name="emailInscription"
               value="<?php if (isset($_POST["emailInscription"])) {
                   echo $_POST["emailInscription"];
               } ?>">
    </span>
    <span>
        <i class="bi bi-lock"></i>
        <input type="password" placeholder="Votre mot de passe..." name="pwdInscription">
    </span>
    <span>
        <i class="bi bi-lock"></i>
        <input type="password" placeholder="Votre mot de passe..." name="pwd2Inscription">
    </span>
    <span>
        <i class="bi bi-info-circle-fill" style="color: rgba(0, 207, 211, 1); top: 10px; left: 5px;font-size: 15px"></i>
        <p class="txtSubForm">Vous avez déjà un compte ? <a href="/connection">Cliquez ici.</a></p>
    </span>
    <span>
        <input type="submit" value="s'inscrire" name="btnInscription" class="btn-form">
    </span>
    <?php
    if (isset($errorInscription) && $errorInscription != "") {
        ?>
        <p class="errorForm"><?= $errorInscription; ?></p>
    <?php } ?>
</form>
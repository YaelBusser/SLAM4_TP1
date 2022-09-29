<form action="/connection" method="POST" class="block-form">
    <h1>Connexion</h1>
    <span>
        <i class="bi bi-person"></i>
        <input type="text" placeholder="Votre login..." name="login" value="<?php if (isset($_POST["login"])) {
            echo $_POST["login"];
        } ?>">
    </span>
    <span>
        <i class="bi bi-lock"></i>
        <input type="password" placeholder="Votre mot de passe..." name="pwd">
    </span>
    <span>
        <i class="bi bi-info-circle-fill infoIcon" style="color: rgba(0, 207, 211, 1); top: 10px; left: 5px;font-size: 15px"></i>
        <p class="txtSubForm">Vous n'avez pas encore de compte ? <a href="/inscription">Cliquez ici.</a></p>
    </span>
    <input type="submit" value="se connecter" name="btnConnection" class="btn-form">
    <?php
    if (isset($errorConnection) && $errorConnection != "") {
        ?>
        <p class="errorForm"><?= $errorConnection; ?></p>
    <?php } ?>
</form>
<?php
if (isset($_GET["creation"])) {
    if ($_GET["creation"] == "ok") {
        echo "<script>alert(\"Votre compte a été créé avec succès !\")</script>";
    }
}
?>
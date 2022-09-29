<form action="/connection" method="POST" class="block-form">
    <input type="text" placeholder="Votre login..." name="login" value="<?php if (isset($_POST["login"])) {
        echo $_POST["login"];
    } ?>">
    <input type="password" placeholder="Votre mot de passe..." name="pwd">
    <input type="submit" value="se connecter" name="btnConnection" class="btn-form">
    <?= $errorConnection; ?>
</form>
<?php
if (isset($_GET["creation"])) {
    if ($_GET["creation"] == "ok") {
        echo "<script>alert(\"Votre compte a été créé avec succès !\")</script>";
    }
}
?>
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

        <form action="x.php" method="post">
            <div class="form-group">
                <input type="text" id="prenom" class="form-control" name="prenom" placeholder="prenom">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="passwordConfirm">
            </div>
            <div class="form-btn">
                <input id="buttonSignup" type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Vous avez déjà un compte ?  Connectez vous <a href="login.php">ici</a></p></div>
      </div>
    </div>
</body>
</html>
<?php

    $loginUser = new UsersController();
    $loginUser->auth();
?>
<?php 
echo'<pre>';
print_r($_SESSION);
echo '</pre>';
?>
<!-- form -->
<body>
<div class="right">
        <div class="container">
            <h1>Sign into your account</h1>
            <form method="post">
                <div class="input-group">
                    <input type="text" placeholder="Enter your username" name="username">
                </div>
                <div class="input-group">
                    <input id="password" type="password" placeholder="Enter your password" name="password">

                </div>
                <button name="submit" class="btn-submit">LOGIN</button>
        </div>
        </form>
        <h6>Dont have an account ? <a href="<?php echo BASE_URL; ?>register">Register</a></h6>

        <!-- end form -->
</body>

</html>

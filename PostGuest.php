<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PostGuest</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
<!-- title -->
<h1>Guest sign up</h1>
    <?php
        if(isset($_POST['submit'])){
            
        }
    ?>
    <!-- form -->
    <form action="PostGuest.php" method="post">
    <span> First Name:<input type="text" name="fName"></span><br>
    <span> Last Name:<input type="text" name="lName"></span><br>
    <span> Email Address:<input type="text" name="fName"></span><br>
    <input type="reset" name="reset" value="Reset Form">
    <input type="submit" name="submit" value"Post Guest">
    </form>
    <hr>
    <p>
    <a href="GuestBook.php">View guest book</a>
    </p>
</body>
</html>
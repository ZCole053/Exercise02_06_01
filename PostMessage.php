<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Post New Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    if(isset($_POST['submit'])){

    }
    ?>
    <h1>Post New Message</h1>
    <hr>
    <form action="PostMessage.php" method="post">
        <span style="font-weight:bold">Subject: <input type="text" name="subject"></span>
        <span style="font-weight:bold">Name: <input type="text" name="name"></span><br>
        <textarea name="message" cols="80" rows="6" style="margin: 10px 5px 5px"></textarea> <br>
        <input type="reset" name="reset" value="Reset Form">
        <input type="submit" name="submit" value"Post Message">
    </form>
    <hr>
    <p>
        <a href="MessageBoard.php">View Message</a>
    </p>
</body>

</html>
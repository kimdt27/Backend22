<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hacker's Site</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Hacker's page</h1>
            <form action="http://mysite.org/getting.php" method="post">
                <input type="text" name="email" id="email"><br>
                <input type="hidden" name="token" id="token" value="f8d9siyf087sddyf0s"><br>

                <input type="submit" value="Submit Form" class="btn">
            </form>
        </div>
</body>
</html>
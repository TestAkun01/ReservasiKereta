<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failure</title>
</head>

<body>
    <h1>Failure!</h1>
    <p><?= isset($data["message"]) ? $data["message"] : 'An error occurred. Please try again.'; ?></p>
    <a href="/user/auth">Go to Auth</a>
    <script>
        setTimeout(function() {
            window.location.href = "/";
        }, 5000);
    </script>
</body>

</html>
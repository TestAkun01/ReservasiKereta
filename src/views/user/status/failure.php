<h1>Failure!</h1>
<p><?= isset($data["message"]) ? $data["message"] : 'An error occurred. Please try again.'; ?></p>
<a href="/user/auth">Go to Auth</a>
<script>
    setTimeout(function() {
        window.location.href = "/";
    }, 5000);
</script>
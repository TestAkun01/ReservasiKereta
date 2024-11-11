<h1>Success!</h1>
<p><?= isset($data["message"]) ? $data["message"] : 'Operation completed successfully.'; ?></p>
<a href="/">Go to Home</a>
<script>
    setTimeout(function() {
        window.location.href = "/";
    }, 5000);
</script>
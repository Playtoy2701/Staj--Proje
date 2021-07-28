<?php
session_start();
unset($_SESSION["student_id"]);
"<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>";
header("Location:sign_in.php");
?>
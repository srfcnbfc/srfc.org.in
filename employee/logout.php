<?php
session_start();
unset($_SESSION["adminemail"]);
session_destroy();
?>
<script type="text/javascript">
    window.location.href = 'login';
</script>





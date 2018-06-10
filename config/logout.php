<?php
session_start();
error_reporting();
session_unset();
session_destroy();
?>
<script>
window.location.href='../index.php' 
</script>
<?php


exit();
?>
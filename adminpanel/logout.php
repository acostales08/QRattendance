<?php 

session_start();
session_destroy();
session_unset() ;
header("Location: admin/index.php");
ob_end_clean();
exit(0)

?>
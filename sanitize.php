<?php

 $a = htmlspecialchars(strip_tags(urldecode($_SERVER['REQUEST_URI'])));

 $b = htmlspecialchars(urldecode($_SERVER['REQUEST_URI']));


 if($a!=$b){
 	
 	header('Location: ' . $a, true,301);
 }
?>

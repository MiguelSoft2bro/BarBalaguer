<?php 



 function parsePrecio($string){



$string = str_replace("[1/2]", "<span style = 'font-size: 10px;01' >media ración \n</span></h6><h6 class='text-primary menu-price'>",$string);

$string = str_replace("[1/1]", "<span style = 'font-size: 10px;01' >ración  \n</span></h6><h6 class='text-primary menu-price'> ",$string);

return $string;

}






?>
<?php 
use \Router\Routers\Routers;

if(count($_REQUEST) > 1){
    $Data = [];
    foreach ($_REQUEST as $Key => $Value) {
        if($Key != '_url'){
            $Data[] = array($Key=>$Value);
        }
    }

    Routers::Get('/'.$Url[0],$Data);
}else{
    Routers::Get('/'.$Url[0]);
}

?>
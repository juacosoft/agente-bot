<?php 

$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if(isset($update["queryResult"]["action"])) {
    processMessage($update);
}


function processMessage($update) {
    //el action getcontent que hemos indicado en el intent (action and parameters)
    if($update["queryResult"]["action"] == "getcontent"){
        //parametros creados en el intent. En nuestro caso vendrá el nombre de la ciudad
        $params = $update["queryResult"]["parameters"];
        //obtenemos el nombre de la ciudad
        $nombreCliente = $params["geo-city"];
        
        
        
        
        //creamos el mensaje a mostrar al usuario
        sendMessage(array(
            "fulfillmentText" => "Gracias sr(a)".$nombreCliente." Un asesor se comunicara con usted",
            "source"=> "Juaco.info"
        ));
    }else{
        //mensaje de error
        sendMessage(array(
            "fulfillmentText"=> "Error no se recibieron datos",
            "source"=> "example.com"
        ));
    }
}


?>

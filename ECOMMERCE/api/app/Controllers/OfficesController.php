<?php
namespace app\Controllers;
class OfficesController extends Controllers{
   
    function selectOffices($request,$response){
        
$message=$this->OfficesModel->selectOffices();

return json_encode($message);
    }
       
    function selectOfficesID($request,$response,$id){
        
        $message=$this->OfficesModel->selectOfficesID($id);
        
        return json_encode($message);
            }
    function insertOffices($request,$response){
    $office=$request->getParsedBody();
    $message=$this->OfficesModel-> insertOffice_PDO($office);
return json_encode($message);
    }
  
}

?>
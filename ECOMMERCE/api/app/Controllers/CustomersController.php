<?php
namespace app\Controllers;

class CustomersController extends Controllers{
   
    function selectCustomers($request,$response){      
        $message=$this->CustomersModel->selectCustomers();
        return json_encode($message);
    }
    function selectCustomersID($request,$response){      
        $id=$request->getAttribute('id');
        $message['JSON']=$this->CustomersModel->selectCustomersID($id);
        $message['twp']=$this->TwpEncrip->Encrip($id);
        $message['desencrip']=$this->TwpEncrip->desencrip($message['twp']);
        return json_encode($message);
    }
    function insertCustomers($request,$response){
        $customer=$request->getParsedBody();
        $message=$this->CustomersModel-> saveCustomers($customer);
        return json_encode($message);
    }
}
?>
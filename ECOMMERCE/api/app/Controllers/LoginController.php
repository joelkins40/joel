<?php
namespace app\Controllers;
class LoginController extends Controllers{
   
    function selectLogin($request,$response){
        $user=$request->getParsedBody();
      $user['pass'] =$this->TwpEncrip->Encrip($user['pass']);
     
        $message=$this->LoginModel->selectLogin($user);
        return json_encode($message);
    }
  
}
?>
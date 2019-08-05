<?php
namespace app\Models;
class LoginModel extends Models{
    public function selectLogin($user){



$sth=$this->db->pdo->prepare('select * from employees where email=:email and password =:pass');
$sth->bindParam(':email',$user['user'], \PDO::PARAM_STR); 
      $sth->bindParam(':pass',$user['pass'],\PDO::PARAM_STR);
      $sth->execute();
  
    $registros=$sth->fetchAll(\PDO::FETCH_ASSOC);
    if(!is_null($sth->errorInfo()[1])){
        return array(
            'Error'=>false,
            'description'=>$sth->errorInfo()[2]
        );
    }else if(empty($registros)){
        return array(
            'noFound'=>true,
            'description'=>'User and Password is incorrect'
        );
    }
        return array(
        'success'=>true,
        'description'=> 'Welcome to the aplication',
        'User'=>$user['user']);
    
}
}

?>
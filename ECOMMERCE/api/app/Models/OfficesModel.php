<?php
namespace app\Models;
class OfficesModel extends Models{
    public function selectOffices(){

        $sth=$this->db->pdo->prepare("select * from offices");
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
                'description'=>'The table is empty'
            );
        }
            return array(
            'success'=>true,
            'description'=> 'The Offices were found',
            'Offices'=>$registros);
    
}
public function selectOfficesID($id){
$officeCode=implode($id);


    $sth=$this->db->pdo->prepare("select * from offices where officeCode=".$officeCode);
    
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
            'description'=>'The table is empty'
        );
    }
        return array(
        'success'=>true,
        'description'=> 'The Offices were found',
        'Offices'=>$registros);

}
public function insertOffice_PDO($office){
   
    $officeCode=$office['officeCode'];
    $city=$office['city'];
    $phone=$office['phone'];
    $addressLine1=$office['addressLine1'];
    $addressLine2=$office['addressLine2'];
    $state=$office['state'];
    $country=$office['country'];
    $postalCode=$office['postalCode'];
    $territory=$office['territory'];
    $Message='Valor';
  
    
    $sth=$this->db->pdo->prepare('select * from offices where officeCode=:officeCode');
    $sth->bindParam('officeCode',$officeCode); 
    $sth->execute();
  
    $valor=$sth->fetchAll();
    var_dump($Message);die();    
    if(!$valor){
            $sth=$this->db->pdo->prepare('insert into Offices (officeCode,city,phone,addressLine1,addressLine2,state,country,postalCode,territory) values(:officeCode,:city,:phone,:addressLine1,:addressLine2,:state,:country,:postalCode,:territory)');
            $Message='The Offices was Inserted';
    }else{
            $sth=$this->db->pdo->prepare('update Offices set city=:city,phone=:phone,addressLine1=:addressLine1,addressLine2=:addressLine2,state=:state,country=:country,postalCode=:postalCode,territory=:territory where officeCode=:officeCode');
            $Message='The Offices was Update';
    }

            $sth->bindParam(':officeCode',$officeCode, \PDO::PARAM_STR,10); 
            $sth->bindParam(':city',$city,\PDO::PARAM_STR,10);
            $sth->bindParam(':phone',$phone,\PDO::PARAM_STR,10);
            $sth->bindParam(':addressLine1',$addressLine1,\PDO::PARAM_STR,10);
            $sth->bindParam(':addressLine2',$addressLine2,\PDO::PARAM_STR,10);
            $sth->bindParam(':state',$state,\PDO::PARAM_STR,10);
            $sth->bindParam(':country',$country,\PDO::PARAM_STR,10);
            $sth->bindParam(':postalCode',$postalCode,\PDO::PARAM_STR,10);
            $sth->bindParam(':territory',$territory,\PDO::PARAM_STR,10);

           $sth->execute();


            if(!is_null($sth->errorInfo()[1])){
                return array(
                    'ERROR'=>false,
                'description'=>$sth->errorInfo()[2]
                
            );
            }
                return array(
                    'Succes'=>false,
                'Description'=>$Message);

}



public function updateOffices($Offices,$id){

    $result=$this->db->update("Offices",[
        
        'city'=>$Offices['city'] ,
        'phone'=>$Offices['phone'],
        'addressLine1'=>$Offices['addressLine1'],
        'addressLine2'=>$Offices['addressLine2'],
        'state'=>$Offices['state'],
        'country'=>$Offices['country'],
        'postalCode'=>$Offices['postalCode'],
        'territory'=>$Offices['territory']
            ],['officeCode'=>$id]);
            if(!is_null($this->db->error()[1])){
                return array(
                    'succes'=>false,
                'description'=>$this->db->error()[2]
            
            );
            }
            return array(
                'success'=>true,
                'description'=> 'The Offices was updated');

}

public function saveOffices($Offices){

    $result=$this->db->select('offices',['officeCode'],["officeCode" => $Offices['officeCode']]);
    if(empty($result)){
    $result=$this->db->insert("Offices",[
'officeCode'=>$Offices['officeCode'],
'city'=>$Offices['city'] ,
'phone'=>$Offices['phone'],
'addressLine1'=>$Offices['addressLine1'],
'addressLine2'=>$Offices['addressLine2'],
'state'=>$Offices['state'],
'country'=>$Offices['country'],
'postalCode'=>$Offices['postalCode'],
'territory'=>$Offices['territory']
    ]);
    if(!is_null($this->db->error()[1])){
        return array(
            'succes'=>false,
        'description'=>$this->db->error()[2]
    
    );
    }
    return array(
        'success'=>true,
        'description'=> 'The Offices was inserted');
        
    }
    else{
        $result=$this->db->update("Offices",[
        
            'city'=>$Offices['city'] ,
            'phone'=>$Offices['phone'],
            'addressLine1'=>$Offices['addressLine1'],
            'addressLine2'=>$Offices['addressLine2'],
            'state'=>$Offices['state'],
            'country'=>$Offices['country'],
            'postalCode'=>$Offices['postalCode'],
            'territory'=>$Offices['territory']
                ],['officeCode'=>$Offices['officeCode']]);
                if(!is_null($this->db->error()[1])){
                    return array(
                        'succes'=>false,
                    'description'=>$this->db->error()[2]
                
                );
                }
                return array(
                    'success'=>true,
                    'description'=> 'The Offices was updated'
                );
    }



    }



}

?>
<?php
namespace app\Models;
class CustomersModel extends Models{
    public function selectCustomers(){
$result=$this->db->select('Customers',[
    'customerNumber',
    'customerName',
    'contactLastName',
    'contactFirstName',
    'phone',
    'addressLine1',
    'addressLine2',
    'city',
    'state',
    'postalCode',
    'country',
    'salesRepEmployeeNumber',
    'creditLimit'
    ]
);
if(!is_null($this->db->error()[1])){ 
    return array('error'=>true,
    'description'=>$this->db->error()[2]

);
}else if(empty($result)){
return array(
    'noFound'=>true,
    'description'=>'The table is empty'
);

}
return array(
    'success'=>true,
    'description'=> 'The Customers were found',
    'Customers'=>$result);
    
}
public function selectCustomersID($customerCode){
  
    
    
        $sth=$this->db->pdo->prepare("select * from customers where customerNumber=".$customerCode);
        
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
            'description'=> 'The customer were found',
            'Offices'=>$registros);
    
    }

public function saveCustomers($customer){
   
    $result=$this->db->select('Customers',['customerNumber'],["customerNumber" => $customer['customerNumber']]);
    if(empty($result)){
        $result=$this->db->insert("Customers",
        [
    'customerNumber'=>$customer['customerNumber'],
    'customerName'=>$customer['customerName'],
    'contactLastName'=>$customer['contactLastName'] ,
    'city'=>$customer['city'],
    'phone'=>$customer['phone'],
    'addressLine1'=>$customer['addressLine1'],
    'addressLine2'=>$customer['addressLine2'],
    'city'=>$customer['city'],
    'state'=>$customer['state'],
    'postalCode'=>$customer['postalCode'],
    'country'=>$customer['country'],
    'salesRepEmployeeNumber'=>$customer['salesRepEmployeeNumber'],
    'creditLimit'=>$customer['creditLimit']
    
        ]);
        if(!is_null($this->db->error()[1])){
            return array(
                'succes'=>false,
            'description'=>$this->db->error()[2]
        
        );
        }
        return array(
            'success'=>true,
            'description'=> 'The Customers was inserted');
    }
    
    else{

        $result=$this->db->update("Customers",
        [
    'customerNumber'=>$customer['customerNumber'],
    'customerName'=>$customer['customerName'],
    'contactLastName'=>$customer['contactLastName'] ,
    'city'=>$customer['city'],
    'phone'=>$customer['phone'],
    'addressLine1'=>$customer['addressLine1'],
    'addressLine2'=>$customer['addressLine2'],
    'city'=>$customer['city'],
    'state'=>$customer['state'],
    'postalCode'=>$customer['postalCode'],
    'country'=>$customer['country'],
    'salesRepEmployeeNumber'=>$customer['salesRepEmployeeNumber'],
    'creditLimit'=>$customer['creditLimit']],['customerNumber'=>$customer['customerNumber']]);
        if(!is_null($this->db->error()[1])){
            return array(
                'succes'=>false,
            'description'=>$this->db->error()[2]
        
        );
        }
        return array(
            'success'=>true,
            'description'=> 'The Customers was uptaded');
    }
   
    
        
    }

    }

?>
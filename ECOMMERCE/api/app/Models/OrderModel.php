<?php

namespace app\Models;
class  OrderModel extends Models{

    public function insertOrder($order){
        
        $lines=$order['cart']['lines'];
        
        $orderNumber=time();
       $orderDate=date('Y-m-d',time());
       $requiredDate=date('Y-m-d',time());
       $status='In Process';
       $customerNumber='114';     
       $productCode=$lines[1]['product']['productCode'];
       $quantityOrdered=$lines[1]['product']['quantity'];
       $priceEach=$lines[1]['product']['MSRP'];
       $contad=count($order);


        $this->db->pdo->beginTransaction();
foreach($lines as $value){


      $sth= $this->db->pdo->prepare("Call B(:VOrderNum,:VorderDate,:VrequiredDate,:VStatus,:Vcustomers,:VproductCode,:VquantityOrdered,:VpriceEach)");
      $sth->bindParam(':VOrderNum',$orderNumber, \PDO::PARAM_STR); 
      $sth->bindParam(':VorderDate',$orderDate,\PDO::PARAM_STR);
      $sth->bindParam(':VrequiredDate',$requiredDate,\PDO::PARAM_STR);
      $sth->bindParam(':VStatus',$status,\PDO::PARAM_STR);
      $sth->bindParam(':Vcustomers',$customerNumber,\PDO::PARAM_STR);
      $sth->bindParam(':VproductCode',$value['product']['productCode'],\PDO::PARAM_STR);
      $sth->bindParam(':VquantityOrdered',$value['product']['quantity'],\PDO::PARAM_STR);
      $sth->bindParam(':VpriceEach',$value['product']['MSRP'],\PDO::PARAM_STR);
      $sth->execute();
}



      if(!is_null($sth->errorInfo()[1])){
        $this->db->pdo->rollBack(); 
        return array(
            
              'ERROR'=>false,
          'description'=>$sth->errorInfo()[2]
          
      );
      }
      $this->db->pdo->commit();
return array(
    'success'=>true,
    'description'=> 'The Order was Inserted');

          
}

    

}
  


?>
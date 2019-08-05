<?php
namespace app\Models;
class EmployeesModel extends Models{
    public function selectEmployees(){
$result=$this->db->select('Employees',["[><]offices" => ["Employees.officeCode" => "officeCode"]],[
    'employeeNumber',
    'lastName',
    'firstName',
    'extension',
    'email',
    'city',
    'reportsTo',
    'jobTitle']
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
    'description'=> 'The Employees were found',
    'Employees'=>$result);
    
}


public function selectEmployeesID($id){
    $employeeCode=implode($id);
    
    
        $sth=$this->db->pdo->prepare("select * from Employees where employeeNumber=".$employeeCode);
        
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
            'description'=> 'The Employee were found',
            'Offices'=>$registros);
    
    }
public function saveEmployees($Employees){

    $result=$this->db->select('Employees',['employeeNumber'],["employeeNumber" => $Employees['employeeNumber']]);
    if(empty($result)){
    
    $result=$this->db->insert("Employees",[
'employeeNumber'=>$Employees['employeeNumber'],
'lastName'=>$Employees['lastName'] ,
'firstName'=>$Employees['firstName'],
'extension'=>$Employees['extension'],
'email'=>$Employees['email'],
'officeCode'=>$Employees['officeCode'],
'reportsTo'=>$Employees['reportsTo'],
'jobTitle'=>$Employees['jobTitle']
    ]);
    if(!is_null($this->db->error()[1])){
        return array(
            'succes'=>false,
        'description'=>$this->db->error()[2]
    
    );
    }
    return array(
        'success'=>true,
        'description'=> 'The Employees was inserted');
        
    }else{
        $result=$this->db->update("Employees",[
            
            'lastName'=>$Employees['lastName'] ,
            'firstName'=>$Employees['firstName'],
            'extension'=>$Employees['extension'],
            'email'=>$Employees['email'],
            'officeCode'=>$Employees['officeCode'],
            'reportsTo'=>$Employees['reportsTo'],
            'JobTitle'=>$Employees['jobTitle']],['employeeNumber'=>$Employees['employeeNumber']]);

                if(!is_null($this->db->error()[1])){
                    return array(
                        'succes'=>false,
                    'description'=>$this->db->error()[2]
                
                );
                }
                return array(
                    'success'=>true,
                    'description'=> 'The Employees was updated');
                    

    }}


    }

?>
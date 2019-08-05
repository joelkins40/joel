<?php
namespace app\Models;
class ProductsModel extends Models{
    public function selectProducts(){
$result=$this->db->select('products',[
    'productCode',
    'productName',
    'productLine',
    'productLine',
    'productScale',
    'productVendor',
    'productDescription',
    'quantityInStock',
    'buyPrice',
    'MSRP'
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
    'description'=> 'The products were found',
    'products'=>$result);
    
}

public function selectproductline(){
    
    $sth=$this->db->pdo->prepare("select DISTINCT(productLine) from products");
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
        'description'=> 'The Departaments were found',
        'Offices'=>$registros);
}
    
public function saveProducts($products){
    $result=$this->db->select('products',['productCode'],["productCode" => $products['productCode']]);
    if(empty($result)){
        $result=$this->db->insert("products",[
            'productCode'=>$products['productCode'],
            'productName'=>$products['productName'] ,
            'productLine'=>$products['productLine'],
            'productScale'=>$products['productScale'],
            'productVendor'=>$products['productVendor'],
            'productDescription'=>$products['productDescription'],
            'quantityInStock'=>$products['quantityInStock'],
            'buyPrice'=>$products['buyPrice'],
            'MSRP'=>$products['MSRP'],
            
                ]);
                if(!is_null($this->db->error()[1])){
                    return array(
                        'succes'=>false,
                    'description'=>$this->db->error()[2]
                
                );
                }
                return array(
                    'success'=>true,
                    'description'=> 'The products was inserted');
        
    }
    else{
        $result=$this->db->update("products",[
            
            'productName'=>$products['productName'] ,
            'productLine'=>$products['productLine'],
            'productScale'=>$products['productScale'],
            'productVendor'=>$products['productVendor'],
            'productDescription'=>$products['productDescription'],
            'quantityInStock'=>$products['quantityInStock'],
            'buyPrice'=>$products['buyPrice'],
            'MSRP'=>$products['MSRP']],['productCode'=>$products['productCode']]

            
                );
                if(!is_null($this->db->error()[1])){
                    return array(
                        'succes'=>false,
                    'description'=>$this->db->error()[2]
                
                );
                }
                return array(
                    'success'=>true,
                    'description'=> 'The products was updated'); 
    }

    
}




    }

?>
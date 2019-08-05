import { Injectable } from '@angular/core';
import { Product } from './product';
import { ProductDatasourceService } from './product-datasource.service';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {
private products:Product[]=[];

private categories:string[]=[];
private vendor:string[]=[];
private scale:string[]=[];
private selectcategory:string;
private selectvendor:string;
private selectscale:string;
  constructor(private dataSourceServices:ProductDatasourceService) {
      dataSourceServices.getProducts()
      .subscribe((response)=>{
        this.products=response['products'];
        this.categories=response['products'].map(p=>p.productLine)
        .filter((c,index,array)=>array.indexOf(c)===index ).sort();
console.log(this.categories);

this.vendor=response['products'].map(p=>p.productVendor)
.filter((c,index,array)=>array.indexOf(c)===index ).sort();
this.scale=response['products'].map(p=>p.productScale)
.filter((c,index,array)=>array.indexOf(c)===index ).sort();





      });

   }

   getproducts(productLine:string=null,productvendor:string=null,productScale:string=null):Product[]{
   // this.categories=this.products.filter((p)=>productLine==null || p.productLine==productLine).filter((p)=>productvendor==null||p.productVendor==productvendor)
   //.filter((p)=>productScale==null || p.productScale==productScale).map(p=>p.productLine)
   //.filter((c,index,array)=>array.indexOf(c)===index ).sort();

   //this.vendor=this.products.filter((p)=>productLine==null || p.productLine==productLine).filter((p)=>productvendor==null||p.productVendor==productvendor)
  // .filter((p)=>productScale==null || p.productScale==productScale).map(p=>p.productVendor)
  // .filter((c,index,array)=>array.indexOf(c)===index ).sort();
   //this.scale=this.products.filter((p)=>productLine==null || p.productLine==productLine).filter((p)=>productvendor==null||p.productVendor==productvendor)
   //.filter((p)=>productScale==null || p.productScale==productScale).map(p=>p.productScale)
   //.filter((c,index,array)=>array.indexOf(c)===index ).sort();


  return     this.products.filter((p)=>productLine==null || p.productLine==productLine).filter((p)=>productvendor==null||p.productVendor==productvendor)
  .filter((p)=>productScale==null || p.productScale==productScale);
  
       

   }
 

  
    
   getcategories():string[]{
    
    return this.categories;
  }
  getvendor():string[]{
    return this.vendor;
  }
  getScale():string[]{
    return this.scale;
  }
}

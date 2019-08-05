import { Injectable } from '@angular/core';
import { Product } from './product';
import { ProductDatasourceService } from './product-datasource.service';

@Injectable({
  providedIn: 'root'
})
export class DepartamentRepositoryService {

  private products:Product[]=[];

  constructor(private dataSourceServices:ProductDatasourceService) {
      dataSourceServices.getDepartaments()
      .subscribe((response)=>{
this.products=response['Offices'];
console.log(this.products);
      });

   }

   getDepartaments():Product[]{
     return this.products;
   }
}

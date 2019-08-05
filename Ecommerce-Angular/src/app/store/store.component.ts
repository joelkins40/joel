import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product';
import { DepartamentRepositoryService } from '../model/departament-repository.service';
import { Cart } from '../model/cart';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {
  public selectedCategory=null;
  public selectedvendor=null;
  public selectedscale=null;
public productPerPage=12;

public selectedPage=1;

  constructor(private productRepoService:ProductRepositoryService,private setet:Cart) {
    
    
    
   }

  ngOnInit() {
   
  }

  addlinec(product:Product){
  this.setet.addLine(product);
  }
  
get products():Product[]{
  const pageIndex=(this.selectedPage-1)*this.productPerPage;
  return this.productRepoService.getproducts(this.selectedCategory,this.selectedvendor,this.selectedscale)
.slice(pageIndex, pageIndex+this.productPerPage);

}

get categories():string[]{
  return this.productRepoService.getcategories();
}
get vendor():string[]{
  return this.productRepoService.getvendor();
}
get scale():string[]{
  return this.productRepoService.getScale();
}
changevendor(newvendor?:string){
  this.selectedvendor=newvendor;
  this.selectedPage=1;
}
changescale(newscale?:string){
  this.selectedscale=newscale;
  this.selectedPage=1;
}


changeCategory(newCategory?:string){
    this.selectedCategory=newCategory
    
    this.selectedvendor=null;
    this.selectedscale=null;
    this.selectedPage=1;
}

changePagesize(newnumber:number){
  this.productPerPage=newnumber;
  this.changePage(1);
}
get pageNumbers(): number[]{
  
  
  return Array(Math.ceil(this.productRepoService.getproducts(this.selectedCategory,this.selectedvendor,this.selectedscale).length/this.productPerPage))
.fill(0).map((x,i)=>i + 1);
}

Clean(){
  this.selectedCategory=null;
    
  this.selectedvendor=null;
  this.selectedscale=null;
}
changePage(newNumber:number){
  this.selectedPage=newNumber;
}
}

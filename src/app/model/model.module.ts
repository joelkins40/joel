import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProductDatasourceService } from './product-datasource.service';
import { ProductRepositoryService } from './product-repository.service';
import { DepartamentRepositoryService } from './departament-repository.service';
import { CartsummaryComponent } from '../store/cartsummary/cartsummary.component';

@NgModule({
  declarations: [],
  imports: [
    CommonModule
  ],
  providers:[
    ProductDatasourceService,
    ProductRepositoryService,
    DepartamentRepositoryService

  ]

})
export class ModelModule { }

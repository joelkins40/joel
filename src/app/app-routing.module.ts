import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ɵROUTER_PROVIDERS,RouterModule, Routes } from '@angular/router';
import { CartComponent } from './store/cart/cart.component';
import { CheckoutComponent } from './store/checkout/checkout.component';
import { StoreComponent } from './store/store.component';
import { PageNotFoundComponent } from './store/page-not-found/page-not-found.component';

const routes:Routes=[

  {path:'store',component:StoreComponent},
  {path:'cart',component:CartComponent},
  {path:'checkout',component:CheckoutComponent},
  {path:'',redirectTo:'/store',pathMatch:'full'},
  {path:'**',component:PageNotFoundComponent}
];

@NgModule({
  
  imports: [RouterModule.forRoot(routes)],
    exports:[RouterModule]
  
})
export class AppRoutingModule {
  
 }

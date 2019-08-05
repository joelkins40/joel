import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StoreComponent } from './store.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { CartsummaryComponent } from './cartsummary/cartsummary.component';
import { Cart } from '../model/cart';
import { CartComponent } from './cart/cart.component';
import { CheckoutComponent } from './checkout/checkout.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';


@NgModule({
  declarations: [StoreComponent, NavComponent, FooterComponent,CartsummaryComponent, CartComponent, CheckoutComponent, PageNotFoundComponent],
  imports: [
    CommonModule
  ],
  exports:[
    StoreComponent,
    
  ],
  providers:[
    Cart
  ],
})
export class StoreModule { }

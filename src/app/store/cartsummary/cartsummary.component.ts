import { Component, OnInit } from '@angular/core';
import { Cart } from 'src/app/model/cart';

@Component({
  selector: 'app-cartsummary',
  templateUrl: './cartsummary.component.html',
  styleUrls: ['./cartsummary.component.css']
})
export class CartsummaryComponent implements OnInit {

  constructor(public cart:Cart) { }

  ngOnInit() {
  }

}

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CartsummaryComponent } from './cartsummary.component';

describe('CartsummaryComponent', () => {
  let component: CartsummaryComponent;
  let fixture: ComponentFixture<CartsummaryComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CartsummaryComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CartsummaryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

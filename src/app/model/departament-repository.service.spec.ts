import { TestBed } from '@angular/core/testing';

import { DepartamentRepositoryService } from './departament-repository.service';

describe('DepartamentRepositoryService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: DepartamentRepositoryService = TestBed.get(DepartamentRepositoryService);
    expect(service).toBeTruthy();
  });
});

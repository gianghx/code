package com.example.thirdproject.repo;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.thirdproject.entity.BillItems;

public interface BillItemsRepo extends JpaRepository<BillItems, Integer>{
	@Query("SELECT u FROM BillItems u WHERE u.bill.id = ?1 AND u.product.name LIKE ?2 ")
	Page<BillItems> searchById(int id, String name, Pageable pageable);
	
	@Query("SELECT u FROM BillItems u WHERE u.product.name LIKE ?1")
	Page<BillItems> searchByNoId(String name, Pageable pageable);
	
	@Query("SELECT u FROM BillItems u ")
	Page<BillItems> searchAll(Pageable pageable);
}

package com.example.thirdproject.repo;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.thirdproject.entity.Product;

public interface ProductRepo extends JpaRepository<Product, Integer>{
	@Query("SELECT u FROM Product u WHERE u.id = ?1 AND u.name LIKE ?2")
	Page<Product> searchById(int id, String name, Pageable pageable);
	
	@Query("SELECT u FROM Product u WHERE u.name LIKE ?1")
	Page<Product> searchByNoId(String name, Pageable pageable);
	
	@Query("SELECT u FROM Product u ")
	Page<Product> searchAll(Pageable pageable);
}

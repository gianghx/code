package com.example.thirdproject.repo;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.thirdproject.entity.Category;

public interface CategoryRepo extends JpaRepository<Category, Integer>{ 
	
	@Query("SELECT u FROM Category u WHERE u.id = ?1 AND u.name LIKE ?2")
	Page<Category> searchById(int id, String name, Pageable pageable);
	
	@Query("SELECT u FROM Category u WHERE u.name LIKE ?1")
	Page<Category> searchByNoId(String name, Pageable pageable);
	
	@Query("SELECT u FROM Category u ")
	Page<Category> searchAll(Pageable pageable);
}

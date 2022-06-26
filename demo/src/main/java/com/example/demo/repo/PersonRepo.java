package com.example.demo.repo;

import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.example.demo.dto.Person;

public interface PersonRepo extends JpaRepository<Person, Integer>{
	
	//select where name = s
	List<Person> findByName(String s);
	
	@Query("SELECT u FROM Person u WHERE u.name LIKE :x ")	//
	Page<Person> searchByName(@Param("x") String s, Pageable pageable);
	
	@Query("SELECT u FROM Person u WHERE u.name LIKE :x AND u.age = :age AND u.id = :id")	//
	Page<Person> searchBy(@Param("x") String s, @Param("age") int n, @Param("id") int m , Pageable pageable);
	
//	@Query("SELECT u FROM Person u WHERE u.id = ?1 ")
	Page<Person> findById(int n, Pageable pageable);
	
	Page<Person> findByAge(int n, Pageable pageable);
	
	@Query("SELECT u FROM Person u JOIN u.department d WHERE d.id= ?1 ")
	Page<Person> searchByDepartmentId( int did, Pageable pageable);
}

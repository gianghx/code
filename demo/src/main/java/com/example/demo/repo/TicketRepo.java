package com.example.demo.repo;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.dto.Department;

public interface TicketRepo extends JpaRepository<Department, Integer>{
	
}

package com.example.thirdproject.repo;

import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.thirdproject.entity.User;
import com.example.thirdproject.entity.UserStatistic;

public interface UserRepo extends JpaRepository<User, Integer>{
	@Query("SELECT u FROM User u WHERE u.id = ?1 AND u.name LIKE ?2")
	Page<User> searchById(int id, String name, Pageable pageable);
	
	@Query("SELECT u FROM User u WHERE u.name LIKE ?1")
	Page<User> searchByNoId(String name, Pageable pageable);
	
	@Query("SELECT u FROM User u ")
	Page<User> searchAll(Pageable pageable);
	
	User findByUsername(String s);
	
	/*
	 * @Query("SELECT count(b.id) as sl, MONTH(b.buyDate") List<UserStatistic>
	 * thongKeTheoThang();
	 */
}

package com.example.thirdproject.repo;

import java.util.Date;
import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.thirdproject.entity.Bill;

public interface BillRepo extends JpaRepository<Bill, Integer> {

	@Query("SELECT u FROM Bill u WHERE u.id = ?1 AND u.user.name LIKE ?2")
	Page<Bill> searchById(int id, String name, Pageable pageable);
	
	@Query("SELECT u FROM Bill u WHERE u.user.name LIKE ?1")
	Page<Bill> searchByNoId(String name, Pageable pageable);
	
	@Query("SELECT u FROM Bill u ")
	Page<Bill> searchAll(Pageable pageable);
	
	@Query("SELECT u FROM Bill u WHERE u.buyDate BETWEEN ?1 AND ?2 ")
	Page<Bill> searchBill(Date from, Date to, Pageable pageable);
	
	@Query("SELECT count(u.id) as sl, MONTH(u.buyDate) as thang FROM Bill u GROUP BY MONTH(u.buyDate)")
	List<Object[]> thongKeTheoThang();
	
	@Query("SELECT u.name as name, count(b.id) as sl FROM User u INNER JOIN Bill b ON u.id = b.user.id GROUP BY u.name")
	List<Object[]> thongKeTheoUser();
	
	@Query("SELECT c.couponCode as code, count(b.id) as sl FROM Coupon c INNER JOIN Bill b ON c.couponCode = b.couponCode GROUP BY c.couponCode")
	List<Object[]> thongKeTheoCoupon();
}

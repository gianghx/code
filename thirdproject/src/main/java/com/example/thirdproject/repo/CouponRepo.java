package com.example.thirdproject.repo;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.thirdproject.entity.Coupon;

public interface CouponRepo extends JpaRepository<Coupon, Integer>{
	
	@Query("SELECT c FROM Coupon c WHERE c.couponCode = ?1 ")
	Coupon findByCoupon(String code);
}

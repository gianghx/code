package com.example.thirdproject.entity;



import java.util.Date;
import java.util.List;

import javax.persistence.*;

import org.springframework.format.annotation.DateTimeFormat;

import lombok.Data;

@Data
@Entity
@Table
public class Bill {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private int id;
	
	@Temporal(TemporalType.DATE)
	@DateTimeFormat(pattern = "yyyy-MM-dd")
	private Date buyDate;
	
	@Column(unique = true)
	private String couponCode;
	
	private double discount;
	
	@ManyToOne
	@JoinColumn(name="user_id")
	private User user;

	@OneToMany(mappedBy = "bill")
	List<BillItems> billitems;
	
//	@ManyToOne
//	@JoinColumn(name="coupon_id")
//	private Coupon coupon;


	
}

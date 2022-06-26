package com.example.demo.dto;

import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import lombok.Data;

@Data
@Entity
@Table
public class Ticket {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private int idTicket;
	
	@ManyToOne
	@JoinColumn(name="id_dpm")
	private Department department;		//mapp sang Department
	
	private String numberPhoneKH;
	
	private String requestKH;
	
	private Date receiveDate;
	
	private String responseKH;
	
	private String status;

}

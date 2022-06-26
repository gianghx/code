package com.example.demo.dto;

import java.util.Date;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import lombok.Data;

@Data
@Entity
@Table
public class Department {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)	//tu dong gen ra id theo thu tu tang dan, neu ko truyen vao id
	private int idDpm;
	
	private String name;
	
	private Date dpmDate;
	
	//ko bat buoc
	@OneToMany(mappedBy = "department")
	List<Person> person;
	
	@OneToMany(mappedBy = "department")
	List<Ticket> ticket;
}

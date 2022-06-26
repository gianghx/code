package com.example.demo.dto;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.validation.constraints.Min;
import javax.validation.constraints.NotEmpty;

import lombok.Data;

//@Setter
//@Getter
@Data
@Entity
@Table(name = "person")
public class Person {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)	//tu dong gen ra id theo thu tu tang dan, neu ko truyen vao id
	private int id;
	
	@Min(value = 0, message = "{positive.number}")
	private int age;
	
	@NotEmpty(message = "{not.empty}")
	private String name;
	
	private String country;
	
	//ten cot o db la home_address
	@Column(name = "home_address")
	private String homeAddress;
	
	private String fileURL;
	
	private Date birthDate;
	
	@ManyToOne //bat buoc
	//optional: ko can join coloumn cung duoc
	@JoinColumn(name="id_dpm")
	private Department department;
	
}
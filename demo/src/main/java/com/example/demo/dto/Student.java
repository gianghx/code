package com.example.demo.dto;

import javax.validation.constraints.NotEmpty;

import lombok.Data;

@Data
public class Student {
	private int id;
	
	@NotEmpty(message = "Khong duoc de trong")
	private String name;
	
	private int age;
	
	private String school;
	
}

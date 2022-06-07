package com.example.demo.dto;

import javax.validation.constraints.NotBlank;
import javax.validation.constraints.NotEmpty;

import lombok.Data;
import lombok.Getter;
import lombok.Setter;

//@Setter
//@Getter
@Data
public class Person {
	
	private int id;
	private int age;
	
	@NotEmpty(message = "Khong duoc de trong")
	private String name;
	
	private String country;
	
}
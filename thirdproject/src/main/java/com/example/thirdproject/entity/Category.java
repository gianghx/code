package com.example.thirdproject.entity;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.validation.constraints.NotEmpty;

import lombok.Data;


@Data
@Entity
@Table
public class Category {
	@Id
	@GeneratedValue( strategy = GenerationType.IDENTITY)
	private int id;
	
	@NotEmpty(message = "{not.empty}")
	private String name;

	@OneToMany(mappedBy="category")
	List<Product> products;
}	

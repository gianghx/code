package com.example.thirdproject.entity;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.Transient;

import org.springframework.web.multipart.MultipartFile;

import com.fasterxml.jackson.annotation.JsonIgnore;

import lombok.Data;


@Data
@Entity
@Table
public class Product {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private int id;
	
	private String name;
	
	private double price;
	
	private String description;
	
	@JsonIgnore
	@Transient	//bo qua luu o DB
	private MultipartFile image;
	
	private String imageURL;

	@ManyToOne
	@JoinColumn(name="category_id")
	private Category category;

	@OneToMany(mappedBy = "product")
	List<BillItems> billitems;
}

package com.example.demo.controller;


import java.io.IOException;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.dto.Department;
import com.example.demo.repo.DepartmentRepo;

@Controller
public class DepartmentController {
	
	@Autowired
	DepartmentRepo departmentRepo;
	
	@GetMapping("/department/add")
	public String addGet() {
		return "department/add.html";
	}
	
	@PostMapping("/department/add")
	public String addPost(@ModelAttribute Department d,
							@RequestParam("dDate") String dDate) {
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
		try {
			d.setDpmDate(sdf.parse(dDate));
		} catch (ParseException e) {
			e.printStackTrace();
		}
		departmentRepo.save(d);
		return "redirect:/department/search";
	} 
	
	@GetMapping("/department/search")
	public String searchGet(Model model) {
		model.addAttribute("dpmList", departmentRepo.findAll());
		return "department/search.html";
	}
	
	@GetMapping("/department/get/{idDpm}")
	public String get(@PathVariable("idDpm") int id, Model model) {
		model.addAttribute("department", departmentRepo.findById(id).orElse(null));
		return "department/detail.html";
	}
	
	@GetMapping("/department/delete")
	public String get(@RequestParam("idDpm") int id) {
		departmentRepo.deleteById(id);
		return "redirect:/department/search";
	}
	
	@GetMapping("/department/edit")
	public String editGet(@RequestParam("idDpm") int id, Model model) {
		model.addAttribute("department", departmentRepo.findById(id).orElse(null));
		return "department/edit.html";
	}
	
	@PostMapping("/department/edit")
	public String editPost(@ModelAttribute Department d,
							@RequestParam("dDate") String dDate ){
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
		try {
			d.setDpmDate(sdf.parse(dDate));
		} catch (ParseException e) {
			e.printStackTrace();
		}
		departmentRepo.save(d);
		return "redirect:/department/search";
	}
}

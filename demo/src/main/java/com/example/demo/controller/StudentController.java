package com.example.demo.controller;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.dto.Person;
import com.example.demo.dto.Student;
import com.example.demo.dto.StudentDao;

@Controller
public class StudentController {
	
	@GetMapping("/student/add")
	public String add() {
		return "student/add";
	}

	@PostMapping("/student/add")
	public String addStudent(@ModelAttribute Student s) throws SQLException {
		StudentDao stDao = new StudentDao();
		stDao.add(s);
		
		return "redirect:/student/search";
	}

	@GetMapping("/student/search")
	public String searchStudent(Model model) throws SQLException {
		StudentDao stDao = new StudentDao();
		List<Student> list;
		list = stDao.findAll();
		model.addAttribute("pList", list);
		
		return "student/search";
	}

	@GetMapping("/student/detail")
	public String detailStudent(@RequestParam("id") int id, Model model) throws SQLException {
		StudentDao stDao = new StudentDao();
		stDao.findAll().forEach(p -> {
			if (p.getId() == id) {
				model.addAttribute("student", p);
			}
		});
		
		return "student/detail";
	}

	@GetMapping("/student/delete")
	public String deleteStudent(@RequestParam("id") int id, Model model) throws SQLException {
		StudentDao stDao = new StudentDao();
		stDao.delete(id);
		
		return "redirect:/student/search";
	}

	@GetMapping("/student/edit")
	public String editStudent(@RequestParam("id") int id, Model model) throws SQLException {
		StudentDao stDao = new StudentDao();
		stDao.findAll().forEach(p -> {
			if (p.getId() == id) {
				model.addAttribute("student", p);
			}
		});
		
		return "student/edit";
	}

	@PostMapping("/student/edit")
	public String edit(@ModelAttribute("student") @Validated Student student) throws SQLException {
		StudentDao stDao = new StudentDao();
		stDao.update(student);
		
		return "redirect:/student/search";
	}

}

package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.example.demo.dto.Person;

@Controller
public class HelloController {
	
//	@RequestMapping(value = "/hii", method = RequestMethod.GET) //phuong thuc old
	@GetMapping("/hii")
	public String hello(Model model) {
		model.addAttribute("data", "SPRING BOOT");
		return "hi.html"; //view , co the bo duoi .html vi mac dinh la file html
	}
	
	@GetMapping("/welcome")
	public String welcome(Model model) {
		Person p = new Person();
		p.setId(1);
		p.setName("Test");
		
		model.addAttribute("u", p);
		return "user/welcome.html";
	}
}
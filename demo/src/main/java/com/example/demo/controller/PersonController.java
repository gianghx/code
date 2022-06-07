package com.example.demo.controller;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import javax.naming.Binding;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.dto.Person;

@Controller
public class PersonController {
	List<Person> list = new ArrayList<Person>();

	@GetMapping("/person/add")
	public String add() {
		return "person/add.html";
	}

	@PostMapping("/person/add")
	public String addPerson(@ModelAttribute Person p) {
		list.add(p);
		return "redirect:/person/search";
	}

	@GetMapping("/person/get/{id}")	//	id/?
	public String get(@PathVariable("id") int id, Model model) { 
		list.forEach(p -> {
			if (p.getId() == id) {
				model.addAttribute("person", p);
				return;
			}
		});
		return "person/detail.html";
	}

	@GetMapping("/person/delete") // ?id=1
	public String delete(@RequestParam("id") int id) {
		Iterator<Person> itr = list.iterator();
		while (itr.hasNext()) {
			Person p = itr.next();
			if (p.getId() == id) {
				itr.remove();
			}
		}
		return "redirect:/person/search";
	}

	@GetMapping("/person/edit")
	public String edit(@RequestParam("id") int id, Model model) {
		list.forEach(p -> {
			if (p.getId() == id) {
				model.addAttribute("person", p);
				return;
			}
		});
		return "person/edit.html";
	}
	@PostMapping("/person/edit")
	public String edit(@ModelAttribute("person") @Validated Person person, BindingResult bindingResult) {
		
		if(bindingResult.hasErrors()) {
			return "person/edit.html";
		}
		list.forEach(p -> {
			if (p.getId() == person.getId()) {
				p.setName(person.getName());
				p.setAge(person.getAge());
				p.setCountry(person.getCountry());
			}
		});
		return "redirect:/person/search";
	}

	@GetMapping("/person/search")
	public String search(Model model) {
		model.addAttribute("pList", list);
		return "person/search.html";
	}
}

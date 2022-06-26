 package com.example.demo.controller;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.text.ParseException;
import java.text.SimpleDateFormat;

import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.lang.Nullable;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.util.StringUtils;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestHeader;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import com.example.demo.dto.Person;
import com.example.demo.repo.DepartmentRepo;
import com.example.demo.repo.PersonRepo;

@Controller
public class PersonController {
	@Autowired
	PersonRepo personRepo;
	
	@Autowired
	DepartmentRepo departmentRepo;

	@GetMapping("/person/add")
	public String add() {
		return "person/add.html";
	}

	@PostMapping("/person/add")
	public String addPerson(@ModelAttribute Person p,
			@RequestParam(name = "file", required = false) MultipartFile file,
			@RequestParam(name = "bDate", required = false) String bDate) {
		if (file != null && file.getSize() > 0) {
			// co luu lai file vao folder
			final String FOLDER = "D:/";
			String filename = file.getOriginalFilename();
			File outputFile = new File(FOLDER + filename);
			try {
				file.transferTo(outputFile);
			} catch (IOException e) {
				e.printStackTrace();
			}
			p.setFileURL("/person/download?filename=" + filename);
		}
		
		SimpleDateFormat sdf = new SimpleDateFormat("dd-MM-yyyy");
		try {
			p.setBirthDate(sdf.parse(bDate));
		} catch (ParseException e) {
			e.printStackTrace();
		}
		personRepo.save(p);
		return "redirect:/person/search";
	}

	@GetMapping("/person/download")
	public void search(@RequestParam("filename") String filename, HttpServletResponse response) throws IOException {
		final String FOLDER = "D:/";
		File file = new File(FOLDER + filename);
		if (file.exists()) {

			response.setHeader("Content-Disposition", "inline; filename=\"" + filename + "\"");
			response.setContentType("application/msword; name=\"" + filename + "\"");

			Files.copy(file.toPath(), response.getOutputStream());
		}

	}

	// thay doi ngon ngu, chuyen sang change-lang roi doi ve trang refer chinh la
	// trang truoc do
	@GetMapping("/change-lang")
	public void changeLang(HttpServletResponse response, @RequestHeader("Referer") String refer) throws Exception {
		System.out.println(refer);
		response.sendRedirect(refer);
	}

	//view detail 1 person
	@GetMapping("/person/get/{id}") // id/?
	public String get(@PathVariable("id") int id, Model model) {
		model.addAttribute("person", personRepo.findById(id).orElse(null));
		return "person/detail.html";
	}
	
	
	///xoa 1 person
	@GetMapping("/person/delete") // ?id=1
	public String delete(@RequestParam("id") int id) {
		personRepo.deleteById(id);
		return "redirect:/person/search";
	}
	
	//edit 1 person
	@GetMapping("/person/edit")
	public String edit(@RequestParam("id") int id, Model model) {
		model.addAttribute("person", personRepo.findById(id).orElse(null));
		return "person/edit.html";
	}

	@PostMapping("/person/edit")
	public String edit(@ModelAttribute("person") @Validated Person person, BindingResult bindingResult) {

		if (bindingResult.hasErrors()) {
			return "person/edit.html";
		}
		personRepo.save(person);
		return "redirect:/person/search";
	}

	
	//tim kiem persons
	@GetMapping("/person/search")
	public String search(Model model) {
		model.addAttribute("pList", personRepo.findAll());
		model.addAttribute("departmentList", departmentRepo.findAll());

		return "person/search.html";
	}

	@PostMapping("/person/search")
	public String search(@RequestParam(name = "name") @Nullable String name, Model model,
						@RequestParam(name = "id", required = false) String id,
						@RequestParam(name = "age", required = false) String age,
						@RequestParam(name = "size", required = false) String size,
						@RequestParam(name = "page", required = false) String page) {
		// phan trang
		int currentSize = 5;
		int currentPage = 0;
		if (StringUtils.hasText(size)) {
			currentSize = Integer.parseInt(size);
		}
		if (StringUtils.hasText(page)) {
			currentPage = Integer.parseInt(page);
		}
		Pageable pageable = PageRequest.of(currentPage, currentSize);

		if (name != null && !name.isEmpty() && age != null && !age.isEmpty() && id != null && !id.isEmpty()) {
			Page<Person> pagePerson = personRepo.searchBy("%" + name + "%", Integer.parseInt(age), Integer.parseInt(id), pageable);
			model.addAttribute("totalPage", pagePerson.getTotalPages());
			model.addAttribute("pList", pagePerson.getContent());
		} else if (name != null && !name.isEmpty() && (age == null || age.isEmpty()) && (id == null || id.isEmpty())) {
			Page<Person> pagePerson = personRepo.searchByName("%" + name + "%", pageable);
			model.addAttribute("totalPage", pagePerson.getTotalPages());
			model.addAttribute("pList", pagePerson.getContent());
		} else if (age != null && !age.isEmpty() && (name == null || name.isEmpty()) && (id == null || id.isEmpty())) {
			Page<Person> pagePerson = personRepo.findByAge(Integer.parseInt(age), pageable);
			model.addAttribute("totalPage", pagePerson.getTotalPages());
			model.addAttribute("pList", pagePerson.getContent());
		} else if (id != null && !id.isEmpty() && (name == null || name.isEmpty()) && (age == null || age.isEmpty())) {
			Page<Person> pagePerson = personRepo.findById(Integer.parseInt(id), pageable);
			model.addAttribute("totalPage", pagePerson.getTotalPages());
			model.addAttribute("pList", pagePerson.getContent());
		} else {
			Page<Person> pagePerson = personRepo.findAll(pageable);
			model.addAttribute("totalPage", pagePerson.getTotalPages());
			model.addAttribute("pList", pagePerson.getContent());
		}
		model.addAttribute("name", name);
		model.addAttribute("id", id);
		model.addAttribute("age", age);
		model.addAttribute("page", page);
		model.addAttribute("size", size);
		model.addAttribute("departmentList", departmentRepo.findAll());
		
		
		return "person/search.html";
	}

//	@GetMapping("/person/searchh")
//	public ResponseEntity<Person> search1() {
//		return new ResponseEntity<Person>(personRepo.searchId(2), HttpStatus.OK);
//	}
}

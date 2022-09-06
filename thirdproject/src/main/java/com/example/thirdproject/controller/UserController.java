package com.example.thirdproject.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.lang.Nullable;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.util.StringUtils;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.thirdproject.entity.User;
import com.example.thirdproject.repo.UserRepo;
import com.example.thirdproject.service.MailService;


@Controller
public class UserController {
	@Autowired
	UserRepo userRepo;
	
	@Autowired
	MailService mailService;
	
	@GetMapping("/dang-nhap")
	public String login() {
		return "login.html";
	}
	
	@GetMapping("/deny")
	public String deny() {
		return "deny.html";
	}

	@PreAuthorize("hasRole('ROLE_ADMIN')")
	@GetMapping("/user/add")
	public String addGet() {
		return "user/add.html";
	}
	
	@PreAuthorize("hasRole('ROLE_ADMIN')")
	@PostMapping("/user/add")
	public String addPost(@ModelAttribute @Validated User user ) {
		user.setPassword(new BCryptPasswordEncoder().encode(user.getPassword()));
		userRepo.save(user);
		//gui mail khi tao moi 1 user
		new Thread() {
			@Override
			public void run() {
				mailService.sendEmail("xuangiang98bg@gmail.com", "Them moi user", "Da them moi 1 User");
			}
		}.start();
		return "redirect:/user/search";
	}
	
	@PreAuthorize("hasRole('ROLE_ADMIN')")
	@GetMapping("/user/delete")
	public String delete(@RequestParam("id") int id) {
		userRepo.deleteById(id);
		return "redirect:/user/search";
	}
	
	@PreAuthorize("hasRole('ROLE_ADMIN')")
	@GetMapping("/user/update")
	public String updateGet(@RequestParam("id") int id ,Model model) {
		 model.addAttribute("user", userRepo.findById(id));
		 return "user/update.html";
	}
	
	@PreAuthorize("hasRole('ROLE_ADMIN')")
	@PostMapping("/user/update")
	public String updatePost(@ModelAttribute @Validated User user, BindingResult bindingResult) {
		if(bindingResult.hasErrors()) {
			System.out.println(bindingResult);
			return "user/update.html";
		}
		user.setPassword(new BCryptPasswordEncoder().encode(user.getPassword()));
		userRepo.save(user);
		return "redirect:/user/search";
}
	
	
	@GetMapping("/user/search")
	public String searchGet(Model model) {
		int currentSize = 5;
		int currentPage = 0;
		Pageable pageable = PageRequest.of(currentPage, currentSize);
		Page<User> pageUser = userRepo.findAll(pageable);
		model.addAttribute("totalPage", pageUser.getTotalPages());
		model.addAttribute("userList", pageUser.getContent());
		return "user/search.html";
	}
	
	@PostMapping("/user/search")
	public String searchPost(@RequestParam(name = "name") @Nullable String name, Model model,
							@RequestParam(name = "id", required = false) String id,
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
		
		if(id != null && !id.isEmpty()) {
			Page<User> pageCategory = userRepo.searchById(Integer.parseInt(id),"%" + name + "%", pageable);
			model.addAttribute("totalPage", pageCategory.getTotalPages());
			model.addAttribute("userList", pageCategory.getContent());
		} else {
			Page<User> pageCategory = userRepo.searchByNoId("%" + name + "%", pageable);
			model.addAttribute("totalPage", pageCategory.getTotalPages());
			model.addAttribute("userList", pageCategory.getContent());
		}
		
		return "user/search.html";
	}
	
	
	
}

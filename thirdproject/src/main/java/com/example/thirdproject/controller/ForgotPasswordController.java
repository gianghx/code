package com.example.thirdproject.controller;

import org.apache.commons.lang3.RandomStringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.thirdproject.entity.User;
import com.example.thirdproject.repo.UserRepo;
import com.example.thirdproject.service.MailService;

@Controller
public class ForgotPasswordController {

	@Autowired
	MailService mailService;
	
	@Autowired
	UserRepo userRepo;
	
	@GetMapping("/forgetpassword")
	public String forgetGet() {
		return "forgetPassword.html";
	}
	
	@PostMapping("/forgetpassword")
	public String forgetPost(@RequestParam("username") String name) {
		User user = userRepo.findByUsername(name);
		if(user != null) {
			String password = RandomStringUtils.randomAlphabetic(6);
			System.out.println("------------------------" + password);
			user.setPassword(new BCryptPasswordEncoder().encode(password));
			new Thread() {
				@Override
				public void run() {
					mailService.sendEmail(user.getEmail(), "Update Password Success", password);
				}
			}.start();
			userRepo.save(user);
		} else {
			System.out.println("ERROR !!!");
		}
		return "redirect:/dang-nhap";
	}
}

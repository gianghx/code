package com.example.demo.controller;


import org.springframework.ui.Model;
import org.springframework.validation.BindException;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;

@ControllerAdvice
public class ExceptionHandlerController {
	
	@ExceptionHandler(BindException.class)
	public String hello(Exception ex, Model model) {
		ex.printStackTrace();
		return "hi";	//view
	}
}

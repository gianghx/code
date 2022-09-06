package com.example.thirdproject.entity;

import org.springframework.validation.BindException;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;



@ControllerAdvice
public class ExceptionHandlerController {

	@ExceptionHandler(BindException.class) 
	 public String hello(Exception ex) { 
		ex.printStackTrace(); 
		return "hi.html"; //view
	}
	 
}

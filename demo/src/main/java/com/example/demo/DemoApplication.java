package com.example.demo;

import java.util.Locale;

import javax.validation.OverridesAttribute;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.web.servlet.LocaleResolver;
import org.springframework.web.servlet.config.annotation.InterceptorRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;
import org.springframework.web.servlet.i18n.LocaleChangeInterceptor;
import org.springframework.web.servlet.i18n.SessionLocaleResolver;

@SpringBootApplication
public class DemoApplication implements WebMvcConfigurer{

	public static void main(String[] args) {
		SpringApplication.run(DemoApplication.class, args);
	}
	
	//dich ra nhieu ngon ngu ( da ngon ngu )
	@Bean
	public LocaleResolver localeResolver() {
		SessionLocaleResolver slr = new SessionLocaleResolver(); 	//khoi tao Locale trong session
		slr.setDefaultLocale(new Locale("en")); //set default la ngon ngu English
		return slr;
	}
	@Bean
	public LocaleChangeInterceptor localeChangeInterceptor() {
		LocaleChangeInterceptor lci = new LocaleChangeInterceptor();
		lci.setParamName("lang"); 	//truyen bien lang vao Param
		return lci;
	}	
	@Override
	public void addInterceptors(InterceptorRegistry registry) {
		registry.addInterceptor(localeChangeInterceptor());	
		//add Interceptor language vao de moi lan gui request len check duong dan co Param lang ko de chuyen ngon ngu
	}
//	
}

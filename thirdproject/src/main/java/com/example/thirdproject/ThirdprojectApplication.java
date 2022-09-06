package com.example.thirdproject;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.scheduling.annotation.EnableScheduling;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

@SpringBootApplication
@EnableScheduling  //tu dong len lich shedule
public class ThirdprojectApplication implements WebMvcConfigurer{

	public static void main(String[] args) {
		SpringApplication.run(ThirdprojectApplication.class, args);
	}
	
	//dich ra nhieu ngon ngu ( da ngon ngu )
//		@Bean
//		public LocaleResolver localeResolver() {
//			SessionLocaleResolver slr = new SessionLocaleResolver(); 	//khoi tao Locale trong session
//			slr.setDefaultLocale(new Locale("en")); //set default la ngon ngu English
//			return slr;
//		}
//		@Bean
//		public LocaleChangeInterceptor localeChangeInterceptor() {
//			LocaleChangeInterceptor lci = new LocaleChangeInterceptor();
//			lci.setParamName("lang"); 	//truyen bien lang vao Param
//			return lci;
//		}	
//		@Override
//		public void addInterceptors(InterceptorRegistry registry) {
//			registry.addInterceptor(localeChangeInterceptor());	
//			//add Interceptor language vao de moi lan gui request len check duong dan co Param lang ko de chuyen ngon ngu
//		}
}

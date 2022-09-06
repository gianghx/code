package com.example.thirdproject;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.method.configuration.EnableGlobalMethodSecurity;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;

@SuppressWarnings("deprecation")
@Configuration
@EnableWebSecurity
@EnableGlobalMethodSecurity(securedEnabled = true, prePostEnabled = true, jsr250Enabled = true)
public class SecurityConfig extends WebSecurityConfigurerAdapter{
	
	@Autowired	//tim Bean co cung kieu UserDetailsService de autowired, o day chi co class LoginService implements UserDetailsService nen se dung Bean nay
	UserDetailsService userDetailsService;
	
	@Override
	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
		auth.userDetailsService(userDetailsService).passwordEncoder(new BCryptPasswordEncoder());
	}
	
	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http.authorizeHttpRequests()
					.antMatchers("/user/**")
					.hasAnyRole("ADMIN","SUBADMIN") //ROLE_
					//.hasAnyAuthority("ROLE_ADMIN")
					.antMatchers("/product/**").authenticated()
					.anyRequest()
					.permitAll().and().csrf().disable()
					.formLogin()
					.loginPage("/dang-nhap")	//duong dan nay dan den form dang nhap cua minh tao ra
					.loginProcessingUrl("/login")	//khi submit se goi den /login theo phuong thuc post
					.failureUrl("/dang-nhap?err")	//neu fail thi quay tro lai /dang-nhap
					.defaultSuccessUrl("/user/search", false)	//neu success thi truy cap vao /user/search
					.and().exceptionHandling()
					.accessDeniedPage("/deny");		//khi ko du quyen vao duong dan se bi deny
	}
}

















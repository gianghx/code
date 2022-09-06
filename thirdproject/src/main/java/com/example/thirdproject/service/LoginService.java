package com.example.thirdproject.service;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

import com.example.thirdproject.entity.User;
import com.example.thirdproject.repo.UserRepo;

@Service
public class LoginService implements UserDetailsService {
	
	@Autowired
	UserRepo userRepo; 
	
	@Override
	public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
		User st = userRepo.findByUsername(username);
		
		if(st == null) {
			throw new UsernameNotFoundException("Not Found"); 
		}
		
		///convert roles cua entity sang roles cua security
		List<SimpleGrantedAuthority> list = new ArrayList<SimpleGrantedAuthority>();
		list.add(new SimpleGrantedAuthority(st.getRoles()));
		
		//tao user security
		org.springframework.security.core.userdetails.User currentUser 
			= new org.springframework.security.core.userdetails.User(username, st.getPassword(), list);
		
		return currentUser;
	}
}

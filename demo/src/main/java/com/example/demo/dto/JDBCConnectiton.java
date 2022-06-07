package com.example.demo.dto;

import java.sql.Connection;
import java.sql.DriverManager;

public class JDBCConnectiton {
	public static Connection getConn() {
		final String username = "root";
		final String password = "123456789";
		final String url = "jdbc:mysql://localhost:3306/baitap17";
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			return DriverManager.getConnection(url, username, password);
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("Loi ket noi DB");
		}
		return null;
	}	
//	public static void main(String[] args) {
//		getConn();
//	}
}

package com.example.demo.dto;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;



public class StudentDao {
	public void add(Student p) throws SQLException {
		String sql = "INSERT INTO student(id, name, age, school) VALUES (?, ?, ?, ?)";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setInt(1, p.getId());
		ps.setString(2, p.getName());
		ps.setInt(3, p.getAge());
		ps.setString(4, p.getSchool());
		ps.executeUpdate();		//thuc thi lenh sql den MySQL Server
	}
	
	public void delete(int id) throws SQLException {
		String sql = "DELETE FROM student WHERE id = ?";
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setInt(1, id);
		ps.executeUpdate();	
	}
	
	public void update(Student p) throws SQLException {
		String sql = "UPDATE student SET name = ?, age = ?, school = ? WHERE id = ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getName());
		ps.setInt(2, p.getAge());
		ps.setString(3, p.getSchool());
		ps.setInt(4, p.getId());
		
		ps.executeUpdate();	
	}
	
	public List<Student> findAll() throws SQLException {
		List<Student> list = new ArrayList<>();
		String sql = "SELECT id, name, age, school FROM student";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ResultSet result = ps.executeQuery();
		while(result.next()) {
			Student p = new Student();
			p.setId(result.getInt("id"));
			p.setName(result.getString("name"));
			p.setAge(result.getInt("age"));
			p.setSchool(result.getString("school"));
			
			list.add(p);
		}
		return list;
	}
	
	public List<Student> find(String s) throws SQLException {
		List<Student> list = new ArrayList<>();
		String sql = "SELECT id, name, age, school FROM student WHERE name LIKE ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, "%" + s + "%");
		ResultSet result = ps.executeQuery();
		
		while(result.next()) {
			Student p = new Student();
			p.setId(result.getInt("id"));
			p.setName(result.getString("name"));
			p.setAge(result.getInt("age"));
			p.setSchool(result.getString("school"));
			
			list.add(p);
		}
		return list;
	}

}

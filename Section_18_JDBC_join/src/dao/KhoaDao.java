package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import model.Khoa;

public class KhoaDao {
	public void add(Khoa p) throws SQLException {
		String sql = "INSERT INTO khoa(makhoa, tenkhoa) VALUES (?, ?)";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getMaKhoa());
		ps.setString(2, p.getTenKhoa());
		ps.executeUpdate();		//thuc thi lenh sql den MySQL Server
	}
	
	public void delete(String s) throws SQLException {
		String sql = "DELETE FROM khoa WHERE makhoa = ?";
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, s);
		ps.executeUpdate();	
	}
	
	public void update(Khoa p) throws SQLException {
		String sql = "UPDATE khoa SET tenkhoa = ? WHERE makhoa = ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getTenKhoa());
		ps.setString(2, p.getMaKhoa());
		ps.executeUpdate();	
	}
	
	public List<Khoa> findAll() throws SQLException {
		List<Khoa> list = new ArrayList<>();
		String sql = "SELECT makhoa, tenkhoa FROM khoa";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ResultSet result = ps.executeQuery();
		while(result.next()) {
			Khoa p = new Khoa();
			p.setMaKhoa(result.getString("makhoa"));
			p.setTenKhoa(result.getString("tenkhoa"));
			
			list.add(p);
		}
		return list;
	}
	
	public List<Khoa> find(String s) throws SQLException {
		List<Khoa> list = new ArrayList<>();
		String sql = "SELECT makhoa, tenkhoa FROM khoa WHERE makhoa LIKE ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, "%" + s + "%");
		ResultSet result = ps.executeQuery();
		
		while(result.next()) {
			Khoa p = new Khoa();
			p.setMaKhoa(result.getString("makhoa"));
			p.setTenKhoa(result.getString("tenkhoa"));
			
			list.add(p);
		}
		return list;
	}

}

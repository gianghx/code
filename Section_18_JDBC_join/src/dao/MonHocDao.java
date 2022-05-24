package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import model.MonHoc;

public class MonHocDao {
	public void add(MonHoc p) throws SQLException {
		String sql = "INSERT INTO monhoc(mamh, tenmh, sotiet) VALUES (?, ?, ?)";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getMaMH());
		ps.setString(2, p.getTenMH());
		ps.setInt(3, p.getSoTiet());
		ps.executeUpdate();		//thuc thi lenh sql den MySQL Server
	}
	
	public void delete(String s) throws SQLException {
		String sql = "DELETE FROM monhoc WHERE mamh = ?";
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, s);
		ps.executeUpdate();	
	}
	
	public void update(MonHoc p) throws SQLException {
		String sql = "UPDATE monhoc SET tenmh = ?, sotiet = ? WHERE mamh = ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getTenMH());
		ps.setInt(2, p.getSoTiet());
		ps.setString(3, p.getMaMH());
		ps.executeUpdate();	
	}
	
	public List<MonHoc> findAll() throws SQLException {
		List<MonHoc> list = new ArrayList<>();
		String sql = "SELECT mamh, tenmh, sotiet FROM monhoc";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ResultSet result = ps.executeQuery();
		while(result.next()) {
			MonHoc p = new MonHoc();
			p.setMaMH(result.getString("mamh"));
			p.setTenMH(result.getString("tenmh"));
			p.setSoTiet(result.getInt("sotiet"));
			
			list.add(p);
		}
		return list;
	}
	
	public List<MonHoc> find(String s) throws SQLException {
		List<MonHoc> list = new ArrayList<>();
		String sql = "SELECT mamh, tenmh, sotiet FROM monhoc WHERE mamh LIKE ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, "%" + s + "%");
		ResultSet result = ps.executeQuery();
		
		while(result.next()) {
			MonHoc p = new MonHoc();
			p.setMaMH(result.getString("mamh"));
			p.setTenMH(result.getString("tenmh"));
			p.setSoTiet(result.getInt("sotiet"));
			
			list.add(p);
		}
		return list;
	}

}

package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import model.Khoa;
import model.Lop;

public class LopDao {
	public void add(Lop p) throws SQLException {
		String sql = "INSERT INTO lop(ma_lop, tenlop, makhoa) VALUES (?, ?, ?)";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getMaLop());
		ps.setString(2, p.getTenLop());
		ps.setString(3, p.getKhoa().getMaKhoa());
		ps.executeUpdate();		//thuc thi lenh sql den MySQL Server
	}
	
	public void delete(String s) throws SQLException {
		String sql = "DELETE FROM lop WHERE ma_lop = ?";
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, s );
		ps.executeUpdate();	
	}
	
	public void update(Lop p) throws SQLException {
		String sql = "UPDATE lop SET tenlop = ?, makhoa = ? WHERE ma_lop = ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getTenLop());
		ps.setString(2, p.getKhoa().getMaKhoa());
		ps.setString(3, p.getMaLop());
		
		ps.executeUpdate();	
	}
	
	public List<Lop> findAll() throws SQLException {
		List<Lop> list = new ArrayList<>();
		String sql = "SELECT lop.* , khoa.tenkhoa FROM lop INNER JOIN khoa ON lop.MaKhoa = khoa.MaKhoa";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ResultSet result = ps.executeQuery();
		while(result.next()) {
			Lop p = new Lop();
			p.setMaLop(result.getString("ma_lop"));
			p.setTenLop(result.getString("tenlop"));
			
			Khoa k = new Khoa();
			k.setMaKhoa(result.getString("makhoa"));
			k.setTenKhoa(result.getString("tenkhoa"));
			p.setKhoa(k);
			list.add(p);
		}
		return list;
	}
	
	public List<Lop> find(String s) throws SQLException {
		List<Lop> list = new ArrayList<>();
		String sql = "SELECT lop.* , khoa.tenkhoa FROM lop INNER JOIN khoa ON lop.MaKhoa = khoa.MaKhoa WHERE ma_lop LIKE ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, "%" + s + "%");
		ResultSet result = ps.executeQuery();
		
		while(result.next()) {
			Lop p = new Lop();
			p.setMaLop(result.getString("ma_lop"));
			p.setTenLop(result.getString("tenlop"));

			Khoa k = new Khoa();
			k.setMaKhoa(result.getString("makhoa"));
			k.setTenKhoa(result.getString("tenkhoa"));
			p.setKhoa(k);
			list.add(p);
		}
		return list;
	}

}

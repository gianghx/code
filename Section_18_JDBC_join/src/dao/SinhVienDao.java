package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import model.Lop;
import model.SinhVien;

public class SinhVienDao {
	public void add(SinhVien p) throws SQLException {
		String sql = "INSERT INTO sinhvien(masv, hoten , gioitinh, ngaysinh, malop, hocbong) VALUES (?, ?, ?, ?, ?, ?)";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setInt(1, p.getMaSV());
		ps.setString(2, p.getHoTen());
		ps.setString(3, p.getGioiTinh());
		ps.setString(4, p.getNgaySinh());
		ps.setString(5, p.getMaLop().getMaLop());
		ps.setString(6, p.getHocBong());
		
		ps.executeUpdate();		//thuc thi lenh sql den MySQL Server
	}
	
	public void delete(int id) throws SQLException {
		String sql = "DELETE FROM sinhvien WHERE maSV = ?";
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setInt(1, id);
		ps.executeUpdate();	
	}
	
	public void update(SinhVien p) throws SQLException {
		String sql = "UPDATE sinhvien SET hoten = ?, gioitinh = ?, ngaysinh = ?, malop = ?, hocbong = ? WHERE maSV = ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getHoTen());
		ps.setString(2, p.getGioiTinh());
		ps.setString(3, p.getNgaySinh());
		ps.setString(4, p.getMaLop().getMaLop());
		ps.setString(5, p.getHocBong());
		ps.setInt(6, p.getMaSV());
		
		ps.executeUpdate();	
	}
	
	public List<SinhVien> findAll() throws SQLException {
		List<SinhVien> listSV = new ArrayList<>();
		String sql = "SELECT sinhvien.* , lop.tenlop FROM sinhvien INNER JOIN lop ON sinhvien.MaLop = lop.Ma_Lop";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ResultSet result = ps.executeQuery();
		while(result.next()) {
			SinhVien p = new SinhVien();
			p.setMaSV(result.getInt("masv"));
			p.setHoTen(result.getString("hoten"));
			p.setGioiTinh(result.getString("gioitinh"));
			p.setNgaySinh(result.getString("ngaysinh"));
			p.setHocBong(result.getString("hocbong"));
			
			Lop k = new Lop();
			k.setMaLop(result.getString("malop"));
			k.setTenLop(result.getString("tenlop"));
			p.setMaLop(k);
			listSV.add(p);
		}
		return listSV;
	}
	
	public List<SinhVien> find(String s) throws SQLException {
		List<SinhVien> listSV = new ArrayList<>();
		String sql = "SELECT sinhvien.* , lop.tenlop FROM sinhvien INNER JOIN lop ON sinhvien.MaLop = lop.Ma_Lop WHERE hoten LIKE ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, "%" + s + "%");
		ResultSet result = ps.executeQuery();
		
		while(result.next()) {
			SinhVien p = new SinhVien();
			p.setMaSV(result.getInt("masv"));
			p.setHoTen(result.getString("hoten"));
			p.setGioiTinh(result.getString("gioitinh"));
			p.setNgaySinh(result.getString("ngaysinh"));
			p.setHocBong(result.getString("hocbong"));

			Lop k = new Lop();
			k.setMaLop(result.getString("malop"));
			k.setTenLop(result.getString("tenlop"));
			p.setMaLop(k);
			listSV.add(p);
		}
		return listSV;
	}

}

package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import model.KetQua;
import model.MonHoc;
import model.SinhVien;


public class KetQuaDao {
	public void add(KetQua p) throws SQLException {
		String sql = "INSERT INTO ketqua(masv, mamh, diemthi) VALUES (?, ?, ?)";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setInt(1, p.getSinhVien().getMaSV());
		ps.setString(2, p.getMonHoc().getMaMH());
		ps.setDouble(3, p.getDiemThi());
		ps.executeUpdate();		//thuc thi lenh sql den MySQL Server
	}
	
	public void delete(int s) throws SQLException {
		String sql = "DELETE FROM ketqua WHERE masv = ?";
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setInt(1, s );
		ps.executeUpdate();	
	}
	
	public void update(KetQua p) throws SQLException {
		String sql = "UPDATE ketqua SET mamh = ?, diemthi = ? WHERE masv = ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, p.getMonHoc().getMaMH());
		ps.setDouble(2, p.getDiemThi());
		ps.setInt(3, p.getSinhVien().getMaSV());
		
		ps.executeUpdate();	
	}
	
	public List<KetQua> findAll() throws SQLException {
		List<KetQua> list = new ArrayList<>();
		String sql = "SELECT ketqua.masv, sinhvien.hoten, ketqua.mamh, monhoc.tenmh, ketqua.diemthi FROM ketqua INNER JOIN sinhvien ON sinhvien.MaSV = ketqua.MaSV INNER JOIN monhoc ON monhoc.mamh = ketqua.mamh";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ResultSet result = ps.executeQuery();
		while(result.next()) {
			KetQua p = new KetQua();
			SinhVien sv = new SinhVien();
			MonHoc mh = new MonHoc();
			//set maSV va maMH
			sv.setMaSV(result.getInt("masv"));
			mh.setMaMH(result.getString("tenmh"));
			p.setSinhVien(sv);
			p.setMonHoc(mh);
			//set diemthi
			p.setDiemThi(result.getDouble("diemthi"));
			//add vao list
			list.add(p);
		}
		return list;
	}
	
	public List<KetQua> find(String s) throws SQLException {
		List<KetQua> list = new ArrayList<>();
		String sql = "SELECT ketqua.masv, sinhvien.hoten, ketqua.mamh, monhoc.tenmh, ketqua.diemthi FROM ketqua INNER JOIN sinhvien ON sinhvien.MaSV = ketqua.MaSV INNER JOIN monhoc ON monhoc.mamh = ketqua.mamhWHERE hoten LIKE ?";
		
		PreparedStatement ps = JDBCConnectiton.getConn().prepareStatement(sql);
		ps.setString(1, "%" + s + "%");
		ResultSet result = ps.executeQuery(); 
		
		while(result.next()) {
			KetQua p = new KetQua();
			SinhVien sv = new SinhVien();
			MonHoc mh = new MonHoc();
			//set maSV va maMH
			sv.setMaSV(result.getInt("masv"));
			mh.setMaMH(result.getString("tenmh"));
			p.setSinhVien(sv);
			p.setMonHoc(mh);
			//set diemthi
			p.setDiemThi(result.getDouble("diemthi"));
			//add vao list
			list.add(p);
		}
		return list;
	}

}

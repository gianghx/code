package service;

import java.util.Scanner;

import model.Lop;
import model.SinhVien;

public class SinhVienServiceImpl implements SinhVienService {

	@Override
	public void input(SinhVien sv) {
		System.out.println("Nhap maSV: ");
		sv.setMaSV(new Scanner(System.in).nextInt());
		System.out.println("Nhap hoTen: ");
		sv.setHoTen(new Scanner(System.in).nextLine());
		System.out.println("Nhap gioiTinh: ");
		sv.setGioiTinh(new Scanner(System.in).nextLine());
		System.out.println("Nhap ngaySinh: ");
		sv.setNgaySinh(new Scanner(System.in).nextLine());
		
		//nhap maLop
		Lop lop = new Lop();
		System.out.println("Nhap ma_lop: ");
		lop.setMaLop(new Scanner(System.in).nextLine());
		System.out.println("Nhap tenLop: ");
		lop.setTenLop(new Scanner(System.in).nextLine());
		sv.setMaLop(lop);
		
		System.out.println("Nhap hocBong: ");
		sv.setHocBong(new Scanner(System.in).nextLine());
		
		
		
	}

	@Override
	public void info(SinhVien sv) {
		System.out.println("MaSV: "+sv.getMaSV() + 
				" /HoTen: " +sv.getHoTen()+ 
				" /GioiTinh: " +sv.getGioiTinh()+
				" /NgaySinh: " +sv.getNgaySinh()+
				" /MaLop: " +sv.getMaLop().getMaLop()+
				" /HocBong: " +sv.getHocBong());
	}
	
}

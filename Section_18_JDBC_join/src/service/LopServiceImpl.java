package service;

import java.util.Scanner;

import model.Khoa;
import model.Lop;

public class LopServiceImpl implements LopService {

	@Override
	public void input(Lop lop) {
		System.out.println("Nhap ma_lop: ");
		lop.setMaLop(new Scanner(System.in).nextLine());
		System.out.println("Nhap ten_lop: ");
		lop.setTenLop(new Scanner(System.in).nextLine());
		
		Khoa khoa = new Khoa();
		System.out.println("Nhap ma_khoa: ");
		khoa.setMaKhoa(new Scanner(System.in).nextLine());
		System.out.println("Nhap ten_khoa: ");
		khoa.setTenKhoa(new Scanner(System.in).nextLine());
		lop.setKhoa(khoa);
	}

	@Override
	public void info(Lop lop) {
		System.out.println("Ma_Lop: "+lop.getMaLop() + " /Ten_Lop: " +lop.getTenLop()+ " /Ma_khoa: " +lop.getKhoa().getMaKhoa()+
				" /Ten_khoa: " +lop.getKhoa().getTenKhoa());
	}
	
}

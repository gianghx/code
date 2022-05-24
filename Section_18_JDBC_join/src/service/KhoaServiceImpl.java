package service;

import java.util.Scanner;

import model.Khoa;

public class KhoaServiceImpl implements KhoaService {

	@Override
	public void input(Khoa khoa) {
		System.out.println("Nhap ma_khoa: ");
		khoa.setMaKhoa(new Scanner(System.in).nextLine());
		System.out.println("Nhap ten_khoa: ");
		khoa.setTenKhoa(new Scanner(System.in).nextLine());
	}

	@Override
	public void info(Khoa khoa) {
		System.out.println("Ma_Khoa: "+khoa.getMaKhoa() + " /Ten_Khoa: " +khoa.getTenKhoa());
	}
	
}

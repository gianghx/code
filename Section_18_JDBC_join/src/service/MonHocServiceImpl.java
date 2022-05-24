package service;

import java.util.Scanner;

import model.MonHoc;


public class MonHocServiceImpl implements MonHocService {

	@Override
	public void input(MonHoc monHoc) {
		System.out.println("Nhap maMH: ");
		monHoc.setMaMH(new Scanner(System.in).nextLine());
		System.out.println("Nhap tenMH: ");
		monHoc.setTenMH(new Scanner(System.in).nextLine());
		System.out.println("Nhap soTiet: ");
		monHoc.setSoTiet(new Scanner(System.in).nextInt());
	}

	@Override
	public void info(MonHoc monHoc) {
		System.out.println("MaMH: "+monHoc.getMaMH() + 
				" /TenMH: " +monHoc.getTenMH()+ 
				" /SoTiet: " +monHoc.getSoTiet());
	}
}

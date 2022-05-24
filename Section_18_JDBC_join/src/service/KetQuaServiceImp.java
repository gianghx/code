package service;

import java.util.Scanner;

import model.KetQua;
import model.MonHoc;
import model.SinhVien;

public class KetQuaServiceImp implements KetQuaService {

	@Override
	public void input(KetQua kq) {
		SinhVien sv = new SinhVien();
		System.out.println("Nhap maSV: ");
		sv.setMaSV(new Scanner(System.in).nextInt());
		kq.setSinhVien(sv);
		
		MonHoc mh = new MonHoc();
		System.out.println("Nhap maMH: ");
		mh.setMaMH(new Scanner(System.in).nextLine());
		kq.setMonHoc(mh);
		
		System.out.println("Nhap diemThi: ");
		kq.setDiemThi(new Scanner(System.in).nextDouble());
		
	}

	@Override
	public void info(KetQua kq) {
		System.out.println("MaSV: " +kq.getSinhVien().getMaSV() + 
				" /MaMH: " +kq.getMonHoc().getMaMH()+ 
				" /SoTiet: " +kq.getDiemThi());
	}
	
}

package main;

import java.sql.SQLException;
import java.util.List;
import java.util.Scanner;

import dao.KetQuaDao;
import model.KetQua;
import model.Lop;
import service.KetQuaService;
import service.KetQuaServiceImp;
import service.LopService;
import service.LopServiceImpl;

public class MainKetQua {
	public static void main(String[] args) {
		boolean check = true;
		while(check) {
			System.out.println("__MENU__");
			System.out.println("0. Exit");
			System.out.println("1. Create");
			System.out.println("2. Delete");
			System.out.println("3. Update");
			System.out.println("4. FindAll");
			System.out.println("5. Find");
			System.out.println("Please select!");
			try {
				int c = new Scanner(System.in).nextInt();
				switch (c) {
					case 0: {
						check = false;
						break;
					}
					case 1: {
						addKetQua();
						break;
					}
					case 2: {
						deleteKetQua();
						break;
					}
					case 3: {
						updateKetQua();
						break;
					}
					case 4: {
						findAllKetQua();
						break;
					}
					case 5: {
						findKetQua();
						break;
					}
					default:
						System.out.println("Please select correct number !!!");
				}
			} catch (Exception e) {
				System.out.println("Please select number !!!");
			}
			
		}
	}
	
	public static void addKetQua() {
		KetQuaService kqService = new KetQuaServiceImp();
		KetQuaDao kqDao = new KetQuaDao();
		KetQua kq = new KetQua();
		kqService.input(kq);
		try {
			kqDao.add(kq);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void deleteKetQua() {
		System.out.println("Please input ID MaSV to delete: ");
		KetQuaDao kqDao = new KetQuaDao();
		int s = new Scanner(System.in).nextInt();
		try {
			kqDao.delete(s);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void updateKetQua() {
		KetQuaService kqService = new KetQuaServiceImp();
		KetQuaDao kqDao = new KetQuaDao();
		KetQua st = new KetQua();
		kqService.input(st);
		try {
			kqDao.update(st);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findAllKetQua() {
		List<KetQua> listKQ;
		KetQuaService kqService = new KetQuaServiceImp();
		KetQuaDao kqDao = new KetQuaDao();
		try {
			listKQ = kqDao.findAll();
			for(KetQua kq : listKQ) {
				kqService.info(kq);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findKetQua() {
		List<KetQua> listKQ;
		KetQuaService kqService = new KetQuaServiceImp();
		KetQuaDao kqDao = new KetQuaDao();
		System.out.println("Please input String maMH to find: ");
		String s = new Scanner(System.in).nextLine();
		try {
			listKQ = kqDao.find(s);
			for(KetQua kq : listKQ) {
				kqService.info(kq);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}

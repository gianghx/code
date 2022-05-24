package main;

import java.sql.SQLException;
import java.util.List;
import java.util.Scanner;

import dao.LopDao;
import dao.MonHocDao;
import dao.SinhVienDao;
import model.Lop;
import model.MonHoc;
import model.SinhVien;
import service.LopService;
import service.LopServiceImpl;
import service.MonHocService;
import service.MonHocServiceImpl;
import service.SinhVienService;
import service.SinhVienServiceImpl;

public class MainMonHoc {
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
						addMonHoc();
						break;
					}
					case 2: {
						deleteMonHoc();
						break;
					}
					case 3: {
						updateMonHoc();
						break;
					}
					case 4: {
						findAllMonHoc();
						break;
					}
					case 5: {
						findMonHoc();
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
	
	public static void addMonHoc() {
		MonHocService mhService = new MonHocServiceImpl();
		MonHocDao mhDao = new MonHocDao();
		MonHoc mh = new MonHoc();
		mhService.input(mh);
		try {
			mhDao.add(mh);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void deleteMonHoc() {
		System.out.println("Please input string maMH to delete: ");
		MonHocDao mhDao = new MonHocDao();
		String s = new Scanner(System.in).nextLine();
		try {
			mhDao.delete(s);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void updateMonHoc() {
		MonHocService mhService = new MonHocServiceImpl();
		MonHocDao mhDao = new MonHocDao();
		MonHoc mh = new MonHoc();
		mhService.input(mh);
		try {
			mhDao.update(mh);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findAllMonHoc() {
		List<MonHoc> listMH;
		MonHocService mhService = new MonHocServiceImpl();
		MonHocDao mhDao = new MonHocDao();
		try {
			listMH = mhDao.findAll();
			for(MonHoc mh : listMH) {
				mhService.info(mh);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findMonHoc() {
		List<MonHoc> listMH;
		MonHocService mhService = new MonHocServiceImpl();
		MonHocDao mhDao = new MonHocDao();
		System.out.println("Please input string maMH to find: ");
		String s = new Scanner(System.in).nextLine();
		try {
			listMH = mhDao.find(s);
			for(MonHoc mh : listMH) {
				mhService.info(mh);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}

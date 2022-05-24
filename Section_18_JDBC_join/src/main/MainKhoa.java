package main;

import java.sql.SQLException;
import java.util.List;
import java.util.Scanner;

import dao.KhoaDao;
import dao.LopDao;
import model.Khoa;
import model.Lop;
import service.KhoaService;
import service.KhoaServiceImpl;
import service.LopService;
import service.LopServiceImpl;

public class MainKhoa {
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
						addKhoa();
						break;
					}
					case 2: {
						deleteKhoa();
						break;
					}
					case 3: {
						updateKhoa();
						break;
					}
					case 4: {
						findAllKhoa();
						break;
					}
					case 5: {
						findKhoa();
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
	
	public static void addKhoa() {
		KhoaService khoaService = new KhoaServiceImpl();
		KhoaDao khoaDao = new KhoaDao();
		Khoa khoa = new Khoa();
		khoaService.input(khoa);
		try {
			khoaDao.add(khoa);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void deleteKhoa() {
		System.out.println("Please input MaKhoa to delete: ");
		KhoaDao khoaDao = new KhoaDao();
		String s = new Scanner(System.in).nextLine();
		try {
			khoaDao.delete(s);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void updateKhoa() {
		KhoaService khoaService = new KhoaServiceImpl();
		KhoaDao khoaDao = new KhoaDao();
		Khoa st = new Khoa();
		khoaService.input(st);
		try {
			khoaDao.update(st);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findAllKhoa() {
		List<Khoa> listKhoa;
		KhoaService khoaService = new KhoaServiceImpl();
		KhoaDao khoaDao = new KhoaDao();
		try {
			listKhoa = khoaDao.findAll();
			for(Khoa khoa : listKhoa) {
				khoaService.info(khoa);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findKhoa() {
		List<Khoa> listKhoa;
		KhoaService khoaService = new KhoaServiceImpl();
		KhoaDao khoaDao = new KhoaDao();
		System.out.println("Please input string ma_khoa to find: ");
		String s = new Scanner(System.in).nextLine();
		try {
			listKhoa = khoaDao.find(s);
			for(Khoa khoa : listKhoa) {
				khoaService.info(khoa);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}


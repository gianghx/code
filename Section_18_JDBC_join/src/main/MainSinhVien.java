package main;

import java.sql.SQLException;
import java.util.List;
import java.util.Scanner;

import dao.LopDao;
import dao.SinhVienDao;
import model.Lop;
import model.SinhVien;
import service.LopService;
import service.LopServiceImpl;
import service.SinhVienService;
import service.SinhVienServiceImpl;

public class MainSinhVien {
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
						addSinhVien();
						break;
					}
					case 2: {
						deleteSinhVien();
						break;
					}
					case 3: {
						updateSinhVien();
						break;
					}
					case 4: {
						findAllSinhVien();
						break;
					}
					case 5: {
						findSinhVien();
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
	
	public static void addSinhVien() {
		SinhVienService svService = new SinhVienServiceImpl();
		SinhVienDao svDao = new SinhVienDao();
		SinhVien sv = new SinhVien();
		svService.input(sv);
		try {
			svDao.add(sv);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void deleteSinhVien() {
		System.out.println("Please input string to delete: ");
		SinhVienDao svDao = new SinhVienDao();
		int s = new Scanner(System.in).nextInt();
		try {
			svDao.delete(s);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void updateSinhVien() {
		SinhVienService svService = new SinhVienServiceImpl();
		SinhVienDao svDao = new SinhVienDao();
		SinhVien sv = new SinhVien();
		svService.input(sv);
		try {
			svDao.update(sv);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findAllSinhVien() {
		List<SinhVien> listSV;
		SinhVienService svService = new SinhVienServiceImpl();
		SinhVienDao svDao = new SinhVienDao();
		try {
			listSV = svDao.findAll();
			for(SinhVien sv : listSV) {
				svService.info(sv);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findSinhVien() {
		List<SinhVien> listSV;
		SinhVienService svService = new SinhVienServiceImpl();
		SinhVienDao svDao = new SinhVienDao();
		System.out.println("Please input string hoTen to find: ");
		String s = new Scanner(System.in).nextLine();
		try {
			listSV = svDao.find(s);
			for(SinhVien sv : listSV) {
				svService.info(sv);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}

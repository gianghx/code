package main;

import java.sql.SQLException;
import java.util.List;
import java.util.Scanner;

import dao.LopDao;
import model.Lop;
import service.LopService;
import service.LopServiceImpl;

public class MainLop {
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
						addLop();
						break;
					}
					case 2: {
						deleteLop();
						break;
					}
					case 3: {
						updateLop();
						break;
					}
					case 4: {
						findAllLop();
						break;
					}
					case 5: {
						findLop();
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
	
	public static void addLop() {
		LopService lopService = new LopServiceImpl();
		LopDao lopDao = new LopDao();
		Lop lop = new Lop();
		lopService.input(lop);
		try {
			lopDao.add(lop);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void deleteLop() {
		System.out.println("Please input string to delete: ");
		LopDao lopDao = new LopDao();
		String s = new Scanner(System.in).nextLine();
		try {
			lopDao.delete(s);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void updateLop() {
		LopService lopService = new LopServiceImpl();
		LopDao lopDao = new LopDao();
		Lop st = new Lop();
		lopService.input(st);
		try {
			lopDao.update(st);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findAllLop() {
		List<Lop> listLop;
		LopService lopService = new LopServiceImpl();
		LopDao lopDao = new LopDao();
		try {
			listLop = lopDao.findAll();
			for(Lop lop : listLop) {
				lopService.info(lop);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public static void findLop() {
		List<Lop> listLop;
		LopService lopService = new LopServiceImpl();
		LopDao lopDao = new LopDao();
		System.out.println("Please input string ma_lop to find: ");
		String s = new Scanner(System.in).nextLine();
		try {
			listLop = lopDao.find(s);
			for(Lop lop : listLop) {
				lopService.info(lop);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}

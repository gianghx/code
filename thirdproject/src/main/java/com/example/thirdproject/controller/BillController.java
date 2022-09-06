package com.example.thirdproject.controller;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.lang.Nullable;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.util.StringUtils;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.thirdproject.dto.CouponStatistic;
import com.example.thirdproject.dto.MonthStatistic;
import com.example.thirdproject.dto.UserStatistic;
import com.example.thirdproject.entity.Bill;
import com.example.thirdproject.entity.Coupon;
import com.example.thirdproject.repo.BillRepo;
import com.example.thirdproject.repo.CouponRepo;
import com.example.thirdproject.repo.UserRepo;
import com.example.thirdproject.service.MailService;

@Controller
public class BillController {
	@Autowired
	UserRepo userRepo;

	@Autowired
	BillRepo billRepo;
	
	@Autowired
	CouponRepo couponRepo;
	
	@Autowired
	MailService mailService;

	@GetMapping("/bill/add")
	public String addGet(Model model) {
		model.addAttribute("userList", userRepo.findAll());
		return "bill/add.html";
	}
 
	@PostMapping("/bill/add")
	public String addPost(@ModelAttribute Bill bill,
						@RequestParam(name= "coupon") String couponCode,
						@RequestParam(name = "bDate", required = true) String buyDate) {
		// set ngay thang
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
		try {
			bill.setBuyDate(sdf.parse(buyDate));
		} catch (ParseException e) {
			e.printStackTrace();
		}
		//check coupon
		if(couponCode != null) {
			Coupon coupon = couponRepo.findByCoupon(couponCode);
			if(coupon != null) {
				Date currentDate = new Date();
//				System.out.println("--------------------" + currentDate + "------------------------");
				if(currentDate.before(coupon.getExpireDate())) {
					bill.setCouponCode(coupon.getCouponCode());
					bill.setDiscount(coupon.getDiscountAmount());
				}
			}
		}
		billRepo.save(bill);
		// gui mail khi tao moi Bill
		new Thread() {
			@Override
			public void run() {
				mailService.sendEmail(bill.getUser().getEmail(), "Them Bill", "Ban co them 1 bill");
			}
		}.start();
		return "redirect:/bill/search";
	}

	@GetMapping("/bill/delete")
	public String delete(@RequestParam("id") int id) {
		billRepo.deleteById(id);
		return "redirect:/bill/search";
	}

	@GetMapping("/bill/update")
	public String updateGet(@RequestParam("id") int id, Model model) {
		model.addAttribute("bill", billRepo.findById(id));
		model.addAttribute("userList", userRepo.findAll());
		return "bill/update.html";
	}

	@PostMapping("/bill/update")
	public String updatePost(@ModelAttribute @Validated Bill bill, BindingResult bindingResult) {
		if (bindingResult.hasErrors()) {
			System.out.println(bindingResult);
			return "bill/update.html";
		}
		billRepo.save(bill);
		return "redirect:/bill/search";
	}

	@GetMapping("/bill/search")
	public String searchGet(Model model) {
		int currentSize = 5;
		int currentPage = 0;
		Pageable pageable = PageRequest.of(currentPage, currentSize);
		Page<Bill> pageBill = billRepo.searchAll(pageable);
		model.addAttribute("totalPage", pageBill.getTotalPages());
		model.addAttribute("billList", pageBill.getContent());
		return "bill/search.html";
	}

	@PostMapping("/bill/search")
	public String searchPost(@RequestParam(name = "name") @Nullable String name,Model model, 
			@RequestParam(name = "id", required = false) String id,
			@RequestParam(name = "from", required = false) String fromDate,
			@RequestParam(name = "to", required = false) String toDate,
			@RequestParam(name = "size", required = false) String size,
			@RequestParam(name = "page", required = false) String page) throws ParseException {
		
		// phan trang
		int currentSize = 5;
		int currentPage = 0;
		if (StringUtils.hasText(size)) {
			currentSize = Integer.parseInt(size);
		}
		if (StringUtils.hasText(page)) {
			currentPage = Integer.parseInt(page);
		}
		Pageable pageable = PageRequest.of(currentPage, currentSize);

		if (id != null && !id.isEmpty()) {
			Page<Bill> pageBill = billRepo.searchById(Integer.parseInt(id),"%" + name + "%", pageable);
			model.addAttribute("totalPage", pageBill.getTotalPages());
			model.addAttribute("billList", pageBill.getContent());
		} else if (fromDate != null && !fromDate.isEmpty() && toDate != null && !toDate.isEmpty()) {
			SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
			Page<Bill> pageBill = billRepo.searchBill(sdf.parse(fromDate), sdf.parse(toDate), pageable);
			model.addAttribute("totalPage", pageBill.getTotalPages());
			model.addAttribute("billList", pageBill.getContent());
		} else {
			Page<Bill> pageBill = billRepo.searchByNoId("%" + name + "%", pageable);
			model.addAttribute("totalPage", pageBill.getTotalPages());
			model.addAttribute("billList", pageBill.getContent());
		}

		return "bill/search.html";
	}
	
	
	@GetMapping("/bill/thongketheothang")
	public String thongke1(Model model) {
		List<Object[]> list = billRepo.thongKeTheoThang();
		
		List<MonthStatistic> monStatistics = new ArrayList<MonthStatistic>();
		if(list != null && !list.isEmpty()) {
			for(Object[] object : list) {
				MonthStatistic monthStatistic = new MonthStatistic();
				monthStatistic.setSl(Long.parseLong(object[0].toString()));
				monthStatistic.setThang(Integer.parseInt(object[1].toString()));
				monStatistics.add(monthStatistic);
			}		
		}
		
		model.addAttribute("listBill", monStatistics);
		
		return "thongke/billmonth.html";
	}
	
	@GetMapping("/bill/thongketheouser")
	public String thongke2(Model model) {
		List<Object[]> list = billRepo.thongKeTheoUser();
		
		List<UserStatistic> userStatistics = new ArrayList<UserStatistic>();
		if(list != null && !list.isEmpty()) {
			for(Object[] object : list) {
				UserStatistic userStatistic = new UserStatistic();
				userStatistic.setName(object[0].toString());
				userStatistic.setSl(Integer.parseInt(object[1].toString()));
				userStatistics.add(userStatistic);
			}		
		}
		
		model.addAttribute("listBill", userStatistics);
		
		return "thongke/billuser.html";
	}
	
	@GetMapping("/bill/thongketheocoupon")
	public String thongke3(Model model) {
		List<Object[]> list = billRepo.thongKeTheoCoupon();
		
		List<CouponStatistic> couponStatistics = new ArrayList<CouponStatistic>();
		if(list != null && !list.isEmpty()) {
			for(Object[] object : list) {
				CouponStatistic couponStatistic = new CouponStatistic();
				couponStatistic.setCode(object[0].toString());
				couponStatistic.setSl(Long.parseLong(object[1].toString()));
				couponStatistics.add(couponStatistic);
			}		
		}
		
		model.addAttribute("listBill", couponStatistics);
		
		return "thongke/billcoupon.html";
	}

}

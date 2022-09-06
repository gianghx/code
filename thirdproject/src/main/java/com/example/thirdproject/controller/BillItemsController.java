package com.example.thirdproject.controller;

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

import com.example.thirdproject.entity.BillItems;
import com.example.thirdproject.repo.BillItemsRepo;
import com.example.thirdproject.repo.BillRepo;
import com.example.thirdproject.repo.ProductRepo;

@Controller
public class BillItemsController {
	@Autowired
	BillRepo billRepo;

	@Autowired
	ProductRepo productRepo;
	
	@Autowired
	BillItemsRepo billItemsRepo;

	@GetMapping("/billitems/add")
	public String addGet(Model model) {
		model.addAttribute("billItemsList", billItemsRepo.findAll());
		model.addAttribute("billList", billRepo.findAll());
		model.addAttribute("productList", productRepo.findAll());
		return "billitems/add.html";
	}

	@PostMapping("/billitems/add")
	public String addPost(@ModelAttribute BillItems billItems,
						@RequestParam("quantity") String quantity) {
		billItems.setQuantity(Integer.parseInt(quantity));
		billItemsRepo.save(billItems);
		return "redirect:/billitems/search";
	}
	
	@GetMapping("/billitems/delete")
	public String delete(@RequestParam("id") int id) {
		billItemsRepo.deleteById(id);
		return "redirect:/billitems/search";
	}
	
	@GetMapping("/billitems/update")
	public String updateGet(@RequestParam("id") int id, Model model) {
		model.addAttribute("billItems", billItemsRepo.findById(id));
		model.addAttribute("billList", billRepo.findAll());
		model.addAttribute("productList", productRepo.findAll());
		return "billitems/update.html";
	}
	
	@PostMapping("/billitems/update")
	public String updatePost(@ModelAttribute @Validated BillItems billItems, BindingResult bindingResult) {
		if (bindingResult.hasErrors()) {
			System.out.println(bindingResult);
			return "bill/update.html";
		}
		billItemsRepo.save(billItems);
		return "redirect:/billitems/search";
	}
	
	@GetMapping("/billitems/search")
	public String searchGet(Model model) {
		int currentSize = 5;
		int currentPage = 0;
		Pageable pageable = PageRequest.of(currentPage, currentSize);
		Page<BillItems> pageBillItems = billItemsRepo.searchAll(pageable);
		model.addAttribute("totalPage", pageBillItems.getTotalPages());
		model.addAttribute("billItemsList", pageBillItems.getContent());
		return "billitems/search.html";
	}
	
	@PostMapping("/billitems/search")
	public String searchPost(@RequestParam(name = "namePro") @Nullable String namePro ,Model model, 
			@RequestParam(name = "idBill", required = false) String idBill,
			@RequestParam(name = "size", required = false) String size,
			@RequestParam(name = "page", required = false) String page) {
		
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

		if (idBill != null && !idBill.isEmpty()) {
			Page<BillItems> pageBillItems = billItemsRepo.searchById(Integer.parseInt(idBill),"%" + namePro + "%", pageable);
			model.addAttribute("totalPage", pageBillItems.getTotalPages());
			model.addAttribute("billItemsList", pageBillItems.getContent());
		} else if(namePro!= null && !namePro.isEmpty()) {
			Page<BillItems> pageBillItems = billItemsRepo.searchByNoId("%" + namePro + "%", pageable);
			model.addAttribute("totalPage", pageBillItems.getTotalPages());
			model.addAttribute("billItemsList", pageBillItems.getContent());
		} else {
			Page<BillItems> pageBillItems = billItemsRepo.searchAll(pageable);
			model.addAttribute("totalPage", pageBillItems.getTotalPages());
			model.addAttribute("billItemsList", pageBillItems.getContent());
		}

		return "billitems/search.html";
	}
	
}

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

import com.example.thirdproject.entity.Category;
import com.example.thirdproject.repo.CategoryRepo;

@Controller
public class CategoryController {

	@Autowired
	CategoryRepo categoryRepo;

	@GetMapping("/category/add")
	public String addGet() {
		return "category/add.html";
	}

	@PostMapping("/category/add")
	public String addPost(@ModelAttribute @Validated Category category) {
		categoryRepo.save(category);
		return "redirect:/category/search";
	}

	@GetMapping("/category/delete")
	public String delete(@RequestParam("id") int id) {
		categoryRepo.deleteById(id);
		return "redirect:/category/search";
	}

	@GetMapping("/category/update")
	public String updateGet(@RequestParam("id") int id, Model model) {
		model.addAttribute("category", categoryRepo.findById(id));
		return "category/update.html";
	}

	@PostMapping("/category/update")
	public String updatePost(@ModelAttribute @Validated Category category, BindingResult bindingResult) {
		if (bindingResult.hasErrors()) {
			System.out.println(bindingResult);
			return "category/update.html";
		}
		categoryRepo.save(category);
		return "redirect:/category/search";
	}

	@GetMapping("/category/search")
	public String searchGet(Model model) {
		int currentSize = 5;
		int currentPage = 0;
		Pageable pageable = PageRequest.of(currentPage, currentSize);
		Page<Category> pageCategory = categoryRepo.searchAll(pageable);
		model.addAttribute("totalPage", pageCategory.getTotalPages());
		model.addAttribute("caList", pageCategory.getContent());
		return "category/search.html";
	}

	@PostMapping("/category/search")
	public String searchPost(@RequestParam(name = "name") @Nullable String name, Model model,
							@RequestParam(name = "id", required = false) String id,
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
		
		if(id != null && !id.isEmpty()) {
			Page<Category> pageCategory = categoryRepo.searchById(Integer.parseInt(id),"%" + name + "%", pageable);
			model.addAttribute("totalPage", pageCategory.getTotalPages());
			model.addAttribute("caList", pageCategory.getContent());
		} else {
			Page<Category> pageCategory = categoryRepo.searchByNoId("%" + name + "%", pageable);
			model.addAttribute("totalPage", pageCategory.getTotalPages());
			model.addAttribute("caList", pageCategory.getContent());
		}
		
		return "category/search.html";
	}

}

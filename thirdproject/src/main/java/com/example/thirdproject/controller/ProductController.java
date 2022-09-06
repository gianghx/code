package com.example.thirdproject.controller;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;

import javax.servlet.http.HttpServletResponse;

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
import org.springframework.web.multipart.MultipartFile;

import com.example.thirdproject.entity.Product;
import com.example.thirdproject.repo.CategoryRepo;
import com.example.thirdproject.repo.ProductRepo;


@Controller
public class ProductController {
	
	@Autowired
	ProductRepo productRepo;
	@Autowired
	CategoryRepo categoryRepo;

	@GetMapping("/product/add")
	public String addGet(Model model) {
		model.addAttribute("categoryList", categoryRepo.findAll());
		return "product/add.html";
	}

	@PostMapping("/product/add")
	public String addPost(@ModelAttribute @Validated Product product,
						@RequestParam("image") MultipartFile file) {
		if(file != null && file.getSize() > 0) {
			final String FOLDER = "C:/Users/Admin/Pictures/project3/" ;
			String filename = file.getOriginalFilename();
			File outputFile = new File(FOLDER + filename);
			try {
				file.transferTo(outputFile);
			} catch (IOException e) {
				e.printStackTrace();
			}
			product.setImageURL("/product/download?filename=" + filename);
		}
		productRepo.save(product);
		return "redirect:/product/search";
	}

	@GetMapping("/product/download")
	public void download(@RequestParam("filename") String filename, HttpServletResponse response) throws IOException {
		final String FOLDER = "C:/Users/Admin/Pictures/project3/";
		File file = new File(FOLDER + filename);
		if (file.exists()) {
			Files.copy(file.toPath(), response.getOutputStream());
		}

	}
	
	@GetMapping("/product/delete")
	public String delete(@RequestParam("id") int id) {
		productRepo.deleteById(id);
		return "redirect:/product/search";
	}
	
	@GetMapping("/product/update")
	public String updateGet(@RequestParam("id") int id ,Model model) {
		 model.addAttribute("product", productRepo.findById(id));
		 model.addAttribute("categoryList", categoryRepo.findAll());
		 return "product/update.html";
	}
	
	@PostMapping("/product/update")
	public String updatePost(@ModelAttribute @Validated Product p, BindingResult bindingResult) {
		if(bindingResult.hasErrors()) {
			System.out.println(bindingResult);
			return "product/update.html";
		}
		MultipartFile file = p.getImage();
		System.out.println(file);
		if (file != null && (file.getSize() > 0)) {
			final String FOLDER = "C:/Users/Admin/Pictures/project3/";
			String filename = file.getOriginalFilename();
			File outputFile = new File(FOLDER + filename);
			try {
				file.transferTo(outputFile);
			} catch (IOException e) {
				e.printStackTrace();
			}
			p.setImageURL("/product/download?filename=" + filename);
		}
		productRepo.save(p);
		return "redirect:/product/search";
}
	
	
	@GetMapping("/product/search")
	public String searchGet(Model model) {
		int currentSize = 5;
		int currentPage = 0;
		Pageable pageable = PageRequest.of(currentPage, currentSize);
		Page<Product> pageProduct = productRepo.findAll(pageable);
		model.addAttribute("totalPage", pageProduct.getTotalPages());
		model.addAttribute("productList", pageProduct.getContent());
		return "product/search.html";
	}
	
	@PostMapping("/product/search")
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
			Page<Product> pageCategory = productRepo.searchById(Integer.parseInt(id),"%" + name + "%", pageable);
			model.addAttribute("totalPage", pageCategory.getTotalPages());
			model.addAttribute("productList", pageCategory.getContent());
		} else {
			Page<Product> pageCategory = productRepo.searchByNoId("%" + name + "%", pageable);
			model.addAttribute("totalPage", pageCategory.getTotalPages());
			model.addAttribute("productList", pageCategory.getContent());
		}
		
		return "product/search.html";
	}
}

//Responsive Home Page Navigation


try {

	const resMenu = document.querySelector('.ext-menu-res');
	const menuIcon = document.querySelector('.menu-icon-res');
	var resNum = 0;

    menuIcon.addEventListener('click',function(){
		if(resMenu.className == "ext-menu-res") {
			resMenu.className += " ext-menu-res-responsive";
		}
		else
			resMenu.className = "ext-menu-res";
	});
} catch (e) {
    // Some appropriate handling of the exception
}

//Lang Toggle Nav

try {

	const langToggle = document.querySelector('.nav-lang-toggle');

	langToggle.addEventListener('click',function(){
		if(langToggle.className == "nav-lang-toggle") {
			langToggle.className += " nav-lang-toggle-hover";
		}
		else
			langToggle.className = "nav-lang-toggle";
	});
} catch (e) {
	// Some appropriate handling of the exception
}

//Responsive Home Page Language


try {

	const extMenuLang = document.querySelector('.ext-menu-res-lang');
	const extMenuLangSelect = document.querySelector('.ext-menu-res-lang-select');


    extMenuLang.addEventListener('click',function(){
		if(extMenuLangSelect.className == "ext-menu-res-lang-select") {
			extMenuLangSelect.className += " ext-menu-res-lang-select-res";
		}
		else
			extMenuLangSelect.className = "ext-menu-res-lang-select";
	});
} catch (e) {
    // Some appropriate handling of the exception
}

//Brands Home



try {

	const brandsRow = document.querySelector('.brands-home-row-class');
	const brandsImg = document.querySelectorAll('.brands-home-col');
	brandsRowSize = brandsRow.clientWidth;
	brandsColSize = brandsImg[0].clientWidth;
	sizeUp = 0;
	sizeNum = -brandsImg.length*brandsColSize;


	leftArrow = document.querySelector('.brands-home-left');
	rightArrow = document.querySelector('.brands-home-right');


	document.getElementsByTagName("body")[0].onresize = function(){
		brandsRow.style.transform = 'translateX('+ 0 +'px)';
		brandsColSize = brandsImg[0].clientWidth;
		brandsRowSize = brandsRow.clientWidth;
		sizeUp = 0;
		sizeNum = -brandsImg.length*brandsColSize;
	};

	leftArrow.addEventListener('click',function(){
		if(sizeUp<0) {
			sizeUp += brandsRowSize;
			brandsRow.style.transform = 'translateX(' + (sizeUp) + 'px)';
			//alert("sizeup"+sizeUp+"sizenum"+sizeNum);
		}
		else {

		}
	});

	rightArrow.addEventListener('click',function(){
		sizeUp -= brandsRowSize;
		if(sizeUp-brandsColSize>sizeNum) {
			brandsRow.style.transform = 'translateX(' + (sizeUp) + 'px)';
			//alert("sizeup"+sizeUp+"sizenum"+sizeNum);
		}
		else {
			sizeUp += brandsRowSize;
		}
	});
} catch(e) {}


//Product Slider




try {

	const productSlide = document.querySelector('.product-main-slider');
	const productImage = document.querySelectorAll('.product-main-slider img');
	const productOtherImage = document.querySelectorAll('.product-other-images-item');

	let counter = 1;
	let counter2 = 1;
	const otherBorder = "2px solid orange";
	productOtherImage[0].style.border = otherBorder;
	size = productImage[0].clientWidth;


	document.getElementsByTagName("body")[0].onresize = function(){
		productSlide.style.transform = 'translateX('+ 0 +'px)';
		for(var j=0;j<productOtherImage.length;j++)
			productOtherImage[j].style.border = "none";
		productOtherImage[0].style.border = otherBorder;
		size = productImage[0].clientWidth;
	};

	productOtherImage.forEach(function(img,num){
		img.addEventListener('click',function(){
			for(var j=0;j<productOtherImage.length;j++)
				productOtherImage[j].style.border = "none";
			img.style.border = otherBorder;
			productSlide.style.transform = 'translateX(' + (-size*num) + 'px)';
		});
	});

} catch(e) {}

//Interval Slider
/*
setInterval(function(){
	productSlide.style.transform = 'translateX(' + (-size*counter) + 'px)';
	for(var i=0;i<productOtherImage.length;i++)
		productOtherImage[i].style.border = "none";
	productOtherImage[counter2].style.border = otherBorder;
	counter++;
	if(counter2==productOtherImage.length-1)
		counter2 = 0;
	else counter2++;
},3000
);
*/

//Filter-page-show

try {

	const filterRes = document.querySelector('.catalog-left-side-filter-res-button');
	const filterFull = document.querySelector('.catalog-left-side-filter');

	filterRes.addEventListener('click',function(){
		if(filterFull.className == "catalog-left-side-filter")
			filterFull.className += " catalog-left-side-filter-res";
		else
			filterFull.className = "catalog-left-side-filter";
	});

}
catch(e){}


//Admin Page Buttons

try {

	const adminBrandSelector = document.querySelector('#admin-brand-selector');
	const adminBrandButton = document.querySelector('#admin-brand-button');
	const adminBrandInput = document.querySelector('.admin-brand-input');

	const adminCatSelector = document.querySelector('#admin-category-selector');
	const adminCatButton = document.querySelector('#admin-category-button');
	const adminCatInput = document.querySelector('.admin-category-inputs');

	adminBrandButton.addEventListener('click',function () {
		if(adminBrandInput.className == "form-control admin-brand-input") {
			adminBrandSelector.value = "";
			adminBrandSelector.disabled = true;
			adminBrandInput.className += " admin-brand-input-display";
		}
		else {
			adminBrandSelector.disabled = false;
			adminBrandInput.className = "form-control admin-brand-input";
		}
	});

	adminCatButton.addEventListener('click',function () {
		if(adminCatInput.className == "admin-category-inputs") {
			adminCatSelector.value = "";
			adminCatSelector.disabled = true;
			adminCatInput.className += " admin-category-inputs-display";
		}
		else {
			adminCatSelector.disabled = false;
			adminCatInput.className = "admin-category-inputs";
		}
	});

}
catch(e) {}

//Admin Add Features

try {

	const featureAddButton = document.querySelector('#add-feature-button');
	let i=0;
	
	featureAddButton.addEventListener('click',function () {
		let original = document.getElementById('features-clone' + i);
		let clone = original.cloneNode(true); // "deep" clone
		clone.id = "features-clone" + ++i; // there can only be one element with an ID
		//clone.onclick = duplicate; // event handlers are not cloned
		original.parentNode.appendChild(clone);
	});

}
catch (e) {
	
}


//Product Order Modal

try {

	const productRequestButton = document.querySelector('#product-request-button');
	const modalCloser = document.querySelector('#product-request-modal-closer');
	const productRequestModal = document.querySelector('#product-request-modal');
	const productRequestQuantity = document.querySelector('#product-request-quantity');
	const productRequestModalQuantity = document.querySelector('#product-request-modal-quantity');
	const productRequestModalInputQuantity = document.querySelector('#product-request-modal-input-quantity');


	productRequestButton.addEventListener('click',function () {
		productRequestModalQuantity.innerHTML = productRequestQuantity.value;
		productRequestModalInputQuantity.value = productRequestQuantity.value;
		productRequestModal.style.display = "block";
	});

	modalCloser.addEventListener('click',function () {
		productRequestModal.style.display = "none";
	});

}
catch (e) {

}
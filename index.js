const form = document.getElementById('form');
const tenThuoc = document.getElementById('tenThuoc');
const ngayHetHan = document.getElementById('ngayHetHan');
const nhomThuoc = document.getElementById('nhomThuoc');
const soLuong = document.getElementById('soLuong');
const ghiChu = document.getElementById('ghiChu');

form.addEventListener('Submit1', e => {
	e.preventDefault();

	checkTenThuoc();
	checkNgayHetHan();
	checkNhomThuoc();
	checkSoLuong();
	checkGhiChu();
});


	// trim to remove the whitespaces
function checkTenThuoc(){
	const usernameValue = tenThuoc.value.trim();
	if(usernameValue === '') {
		setErrorFor(tenThuoc, 'tenThuoc cannot be blank');
	} else {
		setSuccessFor(tenThuoc);
	}
}

function checkNgayHetHan(){
  const namValue = ngayHetHan.value.trim();
	var today = new Date();
	currentYear = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
  if(namValue === '') {
		setErrorFor(ngayHetHan, 'ngayHetHan cannot be blank');
	}else if(nam.value < currentYear){
    setErrorFor(nam,'retype the year');
  }else {
    setSuccessFor(ngayHetHan);
  }
}

function checkSoLuong(){
  const soLuongValue = soLuong.value.trim();
	if(soLuongValue === '') {
		setErrorFor(soLuong, 'soLuong cannot be blank');
  }else if (soLuong<0) {
    setErrorFor(soLuong, 'retype the soLuong');
	} else {
		setSuccessFor(soLuong);
	}
}

function checkGhiChu(){
  const noteValue = ghiChu.value.trim();
	if(noteValue === '') {
		setErrorFor(ghiChu, 'tenThuoc cannot be blank');
	} else {
		setSuccessFor(ghiChu);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
	//alert("Error");
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
	//alert("Success");
}

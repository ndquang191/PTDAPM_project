const closeBtn = document.querySelector(".btn-close-modal");
const editBtn = document.querySelectorAll(".edit");
const formEdit = document.querySelector(".form-changepw");
const overlay = document.querySelector(".overlay");
const saveBtn = document.querySelector(".btn-save");
const formNoti = document.querySelector(".form-noti");
const textNoti = document.querySelector(".form-noti p");
const inputPassword = document.querySelector(".ip-pw");
const inputNewPassword = document.querySelector(".ip-npw");
editBtn.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        formEdit.classList.remove("hidden");
        overlay.classList.remove("hidden");
    });
});
closeBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formEdit.classList.add("hidden");
    overlay.classList.add("hidden");
});
saveBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (
        inputNewPassword.value.length == 0 ||
        (inputPassword == 0 && inputNewPassword.value != inputPassword.value)
    ) {
        textNoti.textContent = "vui lòng nhập đầy đủ thông tin!";
    } else if (
        inputNewPassword.value.length < 6 ||
        (inputPassword < 6 && inputNewPassword.value != inputPassword.value)
    ) {
        textNoti.textContent = "vui lòng nhập trên 6 kí tự!";
    } else if (inputNewPassword.value != inputPassword.value) {
        textNoti.textContent = "mật khẩu cũ và mới phải trùng nhau!";
    } else {
        textNoti.textContent = "sửa mật khẩu nhân viên thành công!";
    }

    console.log(inputPassword.value, inputNewPassword);
    formEdit.classList.add("hidden");
    formNoti.classList.remove("hidden");
    setTimeout(() => {
        overlay.classList.add("hidden");
        formNoti.classList.add("hidden");
        inputNewPassword.value = "";
        inputPassword.value = "";
    }, 2000);
});
// -----------------------------------
function myFunction() {
    var input, filter, table, tr, td, i, txtValue, e, giatri, stt;
    e = document.getElementById("chooseSearch");
    giaTri = e.options[e.selectedIndex].text;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    if (giaTri == "Mã nhân viên") {
        stt = 0;
    }
    if (giaTri == "Họ tên") {
        stt = 1;
    }
    if (giaTri == "Số điện thoại") {
        stt = 2;
    }
    if (giaTri == "Phòng ban") {
        stt = 3;
    }
    if (giaTri == "Chức vụ") {
        stt = 4;
    }
    if (giaTri == "Trạng thái") {
        stt = 5;
    }
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[stt];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

// --------------------------------------------
function saveEmployee() {
    confirm("Bạn có muốn xóa nhân viên không?");
}

//---------------------------------------------
function searchBhxh() {
    var input, filter, table, tr, td, i, txtValue, e, giatri, stt;
    e = document.getElementById("chooseSearch");
    giaTri = e.options[e.selectedIndex].text;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    if (giaTri == "ID") {
        stt = 0;
    }
    if (giaTri == "Ngày bắt đầu") {
        stt = 1;
    }
    if (giaTri == "Mức đóng QDTS") {
        stt = 2;
    }
    if (giaTri == "Mức đóng TNLD") {
        stt = 3;
    }
    if (giaTri == "Mức đóng HT") {
        stt = 4;
    }
    if (giaTri == "Mức đóng BHTN") {
        stt = 5;
    }
    if (giaTri == "Tháng") {
        stt = 6;
    }
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[stt];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
//---------------------------------------
function myHiddenUpdate() {
    document.getElementById("btn-save").style.display = "block";
    document.getElementById("btn-update").style.display = "none";

    document.getElementById("employeeCode").readOnly = false;
    document.getElementById("nation").readOnly = false;
    document.getElementById("religion").readOnly = false;
    document.getElementById("academicLevel").disabled = false;
    document.getElementById("Specialized").disabled = false;
    document.getElementById("status").disabled = false;

    document.getElementById("nameEmployee").readOnly = false;
    document.getElementById("citizenIdentification").readOnly = false;
    document.getElementById("placeOfBirth").readOnly = false;
    document.getElementById("permanentAddress").readOnly = false;
    document.getElementById("position").disabled = false;
    document.getElementById("department").disabled = false;
}
//-----------
// function validateForm() {
//   let employeeCode = document.forms["myForm"]["employeeCode"].value;
//   let nation = document.forms["myForm"]["nation"].value;
//   let religion = document.forms["myForm"]["religion"].value;
//   let academicLevel = document.forms["myForm"]["academicLevel"].value;
//   let Specialized = document.forms["myForm"]["Specialized"].value;
//   let status = document.forms["myForm"]["status"].value;
//   let nameEmployee = document.forms["myForm"]["name"].value;
//   let citizenIdentification = document.forms["myForm"]["citizenIdentification"].value;
//   let placeOfBirth = document.forms["myForm"]["placeOfBirth"].value;
//   let permanentAddress = document.forms["myForm"]["permanentAddress"].value;
//   let position = document.forms["myForm"]["position"].value;
//   let department = document.forms["myForm"]["department"].value;
//   if (employeeCode == "" || nation == "" || religion == "" || academicLevel == "" || Specialized == "" || status == "" || nameEmployee == "" || citizenIdentification == "" || placeOfBirth == "" || permanentAddress == "" || position == "" || department == "") {
//     alert("Chưa điền đầy đủ thông tin!");
//     return false;
//   }
// }
//------------------
function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#image").attr("src", e.target.result);
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
}
//--------------------------------------------
function formShow() {
    document.getElementById("form-update").style.display = "block";
    document.getElementById("container-title-form").style.display = "none";
}
function searchSalary() {
    var input, filter, table, tr, td, i, txtValue, e, giaTri, stt;
    e = document.getElementById("chooseSearch");
    giaTri = e.options[e.selectedIndex].text;
    input = document.querySelector(".input-search");
    filter = input.value.toUpperCase();
    console.log(filter);
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    if (giaTri == "Tên nhân viên") {
        stt = 1;
    }
    if (giaTri == "Chức vụ") {
        stt = 2;
    }
    if (giaTri == "Phòng ban") {
        stt = 3;
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
const signName = document.querySelectorAll(".sign-name");
const nameEmployee = document.querySelectorAll(".nameEmployee");
nameEmployee.forEach((e, index) => {
    signName[index].textContent = e.textContent.slice(0, 2).toUpperCase();
});

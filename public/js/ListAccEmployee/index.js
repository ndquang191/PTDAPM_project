const closeBtn = document.querySelector(".btn-close-modal");
closeBtn.addEventListener("click", (e) => {
    window.location.href = "/listaccemployee";
});

function myFunction() {
    var input, filter, table, tr, td, i, txtValue, e, giatri, stt;
    e = document.getElementById("chooseSearch");
    giaTri = e.options[e.selectedIndex].text;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    if(giaTri == "Mã nhân viên"){
      stt = 0;
    }
    if(giaTri == "Họ tên"){
      stt = 1;
    }
    if(giaTri == "Số điện thoại"){
      stt = 2;
    }
    if(giaTri == "Phòng ban"){
      stt = 3;
    }
    if(giaTri == "Chức vụ"){
      stt = 4;
    }
    if(giaTri == "Trạng thái"){
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

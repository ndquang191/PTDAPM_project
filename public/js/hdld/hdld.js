function myFunction() {
    var input, filter, tr, table,txtValue, td, stt, gtri, e;
    e = document.getElementById('chooseSearch');
    gtri = e.options[e.selectedIndex].text;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('myTable');
    tr = table.getElementsByTagName('tr');
    if(gtri == "Mã nhân viên"){
        stt = 1;
    }
    if(gtri == "Trạng thái"){
        stt = 4;
    }
    for (var i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[stt];
        if(td){
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else{
                tr[i].style.display = "none";
            }
        }
    }
}


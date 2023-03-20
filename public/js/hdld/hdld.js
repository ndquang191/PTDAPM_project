function myFunction() {
    let input, filter, tr, table,txtValue, td;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('myTable');
    tr = table.getElementsByTagName('tr');
    for (let i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1] && tr[i].getElementsByTagName("td")[4];
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

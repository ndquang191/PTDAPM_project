const state = {
    employee: {},
};
const createEmployee = function (data) {
    return {
        name: data.TenNV,
        id: data.MaNV,
    };
};
const errorNoti = document.querySelector(".error");
const inputAdd = document.querySelector(".input-id");
const inputName = document.querySelector(".input-name");
inputAdd.addEventListener("blur", (e) => {
    fetch(`http://127.0.0.1:8000/api/getEmployeeInfo/${inputAdd.value}`)
        .then((response) => response.json())
        .then((data) => {
            state.employee = createEmployee(data);
            console.log(state);
            inputName.value = state.employee?.name;
        })
        .catch((err) => {
            errorNoti.classList.remove("hidden");
            setTimeout(() => errorNoti.classList.add("hidden"), 2000);
            inputAdd.value = ''
        });
});

function danhgia_Timkiem() {
    var input, filter, tr, table,txtValue, td;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('myTable');
    tr = table.getElementsByTagName('tr');
    for (var i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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


const state = {
    employee: {},
};
const createEmployee = function (data) {
    return {
        name: data.TenNV,
        id: data.MaNV,
    };
};
fetch("http://127.0.0.1:8000/api/getEmployeeInfo/10001")
    .then((response) => response.json())
    .then((data) => {
        state.employee = createEmployee(data);
    });
console.log(state);
const inputAdd = document.querySelector(".input-id");
const inputName = document.querySelector(".input-name");
inpuAdd.addEventListener("blur", (e) => {
    console.log(inputAdd.value);
});

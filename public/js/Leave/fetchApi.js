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
        });
});
errorNoti.classList;

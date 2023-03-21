// import { domain } from "../config"

const month = document.querySelector('.month-nav')

const backBtn = document.querySelector('.btn-back')
const nextBtn = document.querySelector('.btn-next')

let today = new Date();


function updateStr(){
     const str = "Tháng " + (today.getMonth()+1) + " năm " + (1900 + today.getYear()) ; 
     month.innerHTML = str;

}

backBtn.addEventListener('click' , () => {
     today = new Date(today.setMonth(today.getMonth() - 1 ));

     updateStr()
})


nextBtn.addEventListener('click' , () => {
     today = new Date(today.setMonth(today.getMonth() + 1 ));

     updateStr()
})

updateStr()


//
const domain = 'http://127.0.0.1:8000'

fetch(`${domain}/api/getEmployeeLeave/10002`)
.then((response) => response.json())
.then((data) => console.log(data));

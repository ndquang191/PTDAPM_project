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


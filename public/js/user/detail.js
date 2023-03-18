const firstBtn = document.querySelector('.tab_1');
const secondBtn = document.querySelector('.tab_2');


const firstTab = document.querySelector('.detail_info');
const secondTab = document.querySelector('.detail_degree');



firstBtn.addEventListener('click' , (e) => {
     firstBtn.classList.add('active');
     secondBtn.classList.remove('active');

     
     firstTab.classList.add('show')
     secondTab.classList.remove('show')

     console.log("HI");
})




secondBtn.addEventListener('click' , (e) => {
     secondBtn.classList.add('active');
     firstBtn.classList.remove('active');

     secondTab.classList.add('show')
     firstTab.classList.remove('show')
})


console.log(1)
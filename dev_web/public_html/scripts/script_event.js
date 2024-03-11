document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            // Remove 'active-nav' class from all nav links
            navLinks.forEach(function (navLink) {
                navLink.classList.remove('active');
            });

            // Add 'active-nav' class to the clicked nav link
            this.classList.add('active');
        });
    });
});
// document.addEventListener('DOMContentLoaded', function() {
//     const showMoreButtons = document.querySelectorAll('.show-more');
//     const hiddenButtons = document.querySelectorAll('.hidden');
//     const cards = document.querySelectorAll('.card');
//     const hiddenText = document.querySelectorAll('.card-text');
//     const hiddenHeaders = document.querySelectorAll('h3');

//     showMoreButtons.forEach((button, index) => {
//         button.addEventListener('click', () => {
//             cards.forEach((card, i) => {
//                 if (i !== index) {
//                     card.style.display = 'none';
//                 }
//             });
//             button.style.display = 'none';
//             hiddenButtons[index].style.display = 'inline-block';
//             cards[index].classList.add('expanded-card');
            
//             // Show text without "active" class and hide text with "active" class
//             hiddenText.forEach((text, i) => {
//                 if (!text.classList.contains('active')) {
//                     text.style.display = 'block';
//                 } else {
//                     text.style.display = 'none';
//                 }
//             });
            
//             hiddenHeaders[index * 2].style.display = 'block';
//             hiddenHeaders[index * 2 + 1].style.display = 'block';
//         });
//     });

//     hiddenButtons.forEach((button, index) => {
//         button.addEventListener('click', () => {
//             cards.forEach((card) => {
//                 card.style.display = 'block';
//             });
//             button.style.display = 'none';
//             showMoreButtons[index].style.display = 'inline-block';
//             cards[index].classList.remove('expanded-card');
            
//             // Show text with "active" class when hiding
//             hiddenText.forEach((text) => {
//                 if (text.classList.contains('active')) {
//                     text.style.display = 'block';
//                 } else {
//                     text.style.display = 'none';
//                 }
//             });
            
//             hiddenHeaders[index * 2].style.display = 'none';
//             hiddenHeaders[index * 2 + 1].style.display = 'none';
//         });
//     });
// });
//step 1: get DOM
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');

let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
let thumbnailBorderDom = document.querySelector('.carousel .thumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carousel .time');

thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
let timeRunning = 3000;
let timeAutoNext = 10000;

nextDom.onclick = function(){
    showSlider('next');    
}

prevDom.onclick = function(){
    showSlider('prev');    
}
let runTimeOut;
let runNextAuto = setTimeout(() => {
    next.click();
}, timeAutoNext)
function showSlider(type){
    let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');
    
    if(type === 'next'){
        SliderDom.appendChild(SliderItemsDom[0]);
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        carouselDom.classList.add('next');
    }else{
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
        carouselDom.classList.add('prev');
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext)
}

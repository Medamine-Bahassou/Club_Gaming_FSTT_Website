const showMoreBtn = document.querySelector('.activeBtn');
const hideBtn = document.querySelector('.hideBtn');
const textToShow = document.querySelectorAll('.card-text.text.text-white.hide');
const headingsToShow = document.querySelectorAll('.card-title.text.text-warning.hide');
const image = document.querySelector('.image');
const box = document.querySelector('.box');

showMoreBtn.addEventListener('click', function(event) {
  event.preventDefault();
  box.style.transition = 'all 1s ease';
  box.style.width = '100%';
  textToShow.forEach(function(element) {
    element.style.transition = 'opacity 1s ease';
    element.style.opacity = '1';
    element.style.display = 'block';
  });
  headingsToShow.forEach(function(element) {
    element.style.transition = 'opacity 1s ease';
    element.style.opacity = '1';
    element.style.display = 'block';
  });
  showMoreBtn.style.display = 'none';
  hideBtn.style.display = 'block';
  image.style.transition = 'opacity 1s ease';
  image.style.opacity = '0';
  setTimeout(function() {
    image.style.display = 'none';
  }, 1000);
});

hideBtn.addEventListener('click', function(event) {
  event.preventDefault();
  box.style.transition = 'all 1s ease';
  box.style.width = '50%';
  textToShow.forEach(function(element) {
    element.style.transition = 'opacity 1s ease';
    element.style.opacity = '0';
    setTimeout(function() {
      element.style.display = 'none';
    }, 500);
  });
  headingsToShow.forEach(function(element) {
    element.style.transition = 'opacity 1s ease';
    element.style.opacity = '0';
    setTimeout(function() {
      element.style.display = 'none';
    }, 500);
  });
  showMoreBtn.style.display = 'block';
  hideBtn.style.display = 'none';
  image.style.display = 'block';
  setTimeout(function() {
    image.style.transition = 'opacity 1s ease';
    image.style.opacity = '1';
  }, 1000);
});
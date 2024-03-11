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
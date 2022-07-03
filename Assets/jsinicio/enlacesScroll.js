window.addEventListener("scroll", function() {
    var header = document.querySelector("header");

    // var alink = document.querySelectorAll(".menu__link");
    var alink = document.querySelectorAll("a");
    header.classList.toggle('down', window.scrollY > 0);

    for (let i = 0; i < alink.length; i++) {
        alink[i].classList.toggle('enlacesDown', window.scrollY > 0);
    }

    //change logo
    var logo = document.querySelector("img");

    for (let i = 0; i < alink.length; i++) {
        alink[i].classList.toggle('enlacesDown', window.scrollY > 0);
    }

    // if (window.scrollY > 0) {
    //     logo.setAttribute('src', 'Assets/img/logoUse.png');
    // } else {
    //     logo.setAttribute('src', 'Assets/img/uselogoazul.jpg');
    // }

});


// $(document).on('click', 'a', function() {
//     $("a").removeClass("select");
//     $(this).addClass('select').siblings().removeClass('select');

// });
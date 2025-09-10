    const signinLink = document.getElementById("signin-link");
    const signinImg = document.querySelector(".signin-img");
    const rightArrow = document.querySelector(".rightarr-img");
    const leftArrow = document.querySelector(".leftarr-img");

    signinLink.addEventListener("click", function(e) {
        e.preventDefault(); // prevent instant navigation

        // add fade-out class
        signinImg.classList.add("fade-out");
        rightArrow.classList.add("fade-out");
        leftArrow.classList.add("fade-out");

        // delay navigation until fade-out completes
        setTimeout(() => {
            window.location.href = signinLink.href;
        }, 800); // match CSS transition time
    });
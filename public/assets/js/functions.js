/*--—————————————————————————————SLIDER———————————————————————————————————————*/

export function sliderAnimation(direction) {
    document.querySelectorAll(".slider-products .previous, .slider-products .current, .slider-products .next")
        .forEach(el => el.animate([
            { opacity: 0, transform: `translateX(${direction ? 10 : -10}px)` },
            { opacity: 0.75, transform: "translateX(0)" }
        ], { duration: 200 }));
}

export function slide(direction) {
    const images = document.querySelectorAll(".slider-products a img");
    const links = document.querySelectorAll(".slider-products a");

    sliderAnimation(direction);

    const imgSources = [...images].map(img => img.src);
    const linkHrefs = [...links].map(link => link.href);

    if (direction) {
        imgSources.push(imgSources.shift());  // img to the left
        linkHrefs.push(linkHrefs.shift());    // link to the left
    } else {
        imgSources.unshift(imgSources.pop()); // img to the right
        linkHrefs.unshift(linkHrefs.pop());   // link to the right
    }

    images.forEach((img, i) => img.src = imgSources[i]);
    links.forEach((link, i) => link.href = linkHrefs[i]);
}

export function initSlider() {
    const arrows = document.querySelectorAll(".slider-products .slider-nav span.arrow");
    if (arrows.length !== 2) return;

    const [sliderLeft, sliderRight] = arrows;
    sliderRight.addEventListener("click", () => slide(true));
    sliderLeft.addEventListener("click", () => slide(false));
}

/*--—————————————————————————————END SLIDER———————————————————————————————————————*/


/*--—————————————————————————————product details input submit———————————————————————————————————————*/

export function handleProductInput() {
    const submitBtn = document.querySelector("#product-details .btn");
    const howManyInput = document.querySelector("#product-details #how-many");

    if (!submitBtn || !howManyInput) return;

    howManyInput.addEventListener("input", () => {
        if (howManyInput.value && howManyInput.value != 0) {
            submitBtn.removeAttribute("disabled");
        } else {
            submitBtn.setAttribute("disabled", "");
        }
    });
}

/*--—————————————————————————————end———————————————————————————————————————*/


/*-——————————————————————-admin view password-————————————————————*/

export function toggleAdminPassword() {
    const viewPasswordEl = document.getElementById("view-password");
    const passwordAdminEl = document.querySelector("#admin-password input");

    if (!viewPasswordEl || !passwordAdminEl) return;

    viewPasswordEl.addEventListener("click", () => {
        console.log("hello");
        passwordAdminEl.type = passwordAdminEl.type === "password" ? "text" : "password";
    });
}

/*-——————————————————————-end-————————————————————*/




/*-——————————————————————-header-————————————————————*/


export function toggleMobileMenu() {
    const burgerEl = document.getElementById("burger-menu");
    const crossEl = document.querySelector("#cross");
    const rightLinks = document.querySelector("#header .right");

    if (!burgerEl || !crossEl || !rightLinks) return;

    crossEl.addEventListener("click", () => {
        rightLinks.classList.add("display-none");
    });

    burgerEl.addEventListener("click", () => {
        rightLinks.classList.remove("display-none");
    });
}

/*-———————————————————————end—————————————————————*/
const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");

sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

sidebarClose.addEventListener("click", () => {
    sidebar.classList.add("close", "hoverable");
    var elements = document.getElementsByClassName("wrapper");
    var firstElement = elements[0];
    firstElement.style.maxWidth = "calc(100vw - 95px)";
    firstElement.style.left = "87px";
    if (window.matchMedia("(max-width: 768px)").matches) {
        var firstElement = elements[0];
        firstElement.style.maxWidth = "calc(100vw - 5px)";
        firstElement.style.left = "5px";
    }
});
sidebarExpand.addEventListener("click", () => {
    sidebar.classList.remove("close", "hoverable");
    var elements = document.getElementsByClassName("wrapper");
    var firstElement = elements[0];
    firstElement.style.maxWidth = "calc(100vw - 270px)";
    firstElement.style.left = "265px";
});

sidebar.addEventListener("mouseenter", () => {
    if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.remove("close");
    }
});
sidebar.addEventListener("mouseleave", () => {
    if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.add("close");
    }
});

darkLight.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        document.setI
        darkLight.classList.replace("bx-sun", "bx-moon");
    } else {
        darkLight.classList.replace("bx-moon", "bx-sun");
    }
});

submenuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
        item.classList.toggle("show_submenu");
        submenuItems.forEach((item2, index2) => {
            if (index !== index2) {
                item2.classList.remove("show_submenu");
            }
        });
    });
});

if (window.innerWidth < 768) {
    sidebar.classList.add("close");
} else {
    sidebar.classList.remove("close");
}



const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".step-forms");
const progressSteps = document.querySelectorAll(".progress-step");


let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        if (!checkFormFill(formStepsNum)) {
            event.preventDefault();
        } else {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        }
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();

    });
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("step-forms-active") &&
            formStep.classList.remove("step-forms-active");
    });

    formSteps[formStepsNum].classList.add("step-forms-active");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");

        } else {
            progressStep.classList.remove("progress-step-active");

        }
    });

    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum) {

            progressStep.classList.add("progress-step-check");
        } else {

            progressStep.classList.remove("progress-step-check");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

function checkFormFill(number) {
    switch (number) {
        case 0:
            var flag = true;
            var missionNumInput = document.getElementById("missionNum");
            var commanderInput = document.getElementById("commander");
            var domInput = document.getElementById("dom");
            if (missionNumInput.value === "") {
                missionNumInput.style.border = "1px solid #cb0000";
                flag = false
            } else {
                missionNumInput.style.border = "1px solid #ccc";
            }

            if (commanderInput.value === "") {
                commanderInput.style.border = "1px solid #cb0000";
                flag = false

            } else {
                commanderInput.style.border = "1px solid #ccc";
            }

            if (domInput.value === "") {
                domInput.style.border = "1px solid #cb0000";
                flag = false

            } else {
                domInput.style.border = "1px solid #ccc";
            }
            if(flag == true)
            return true;
            if(flag == false)
            return false;
        case 1:
            var flag = true;
            var contNameInput = document.getElementById("contName");
            var contLnameInput = document.getElementById("contLname");
            var contNumberInput = document.getElementById("contNumber");
            if (contNameInput.value === "") {
                contNameInput.style.border = "1px solid #cb0000";
                flag = false
            } else {
                contNameInput.style.border = "1px solid #ccc";
            }

            if (contLnameInput.value === "") {
                contLnameInput.style.border = "1px solid #cb0000";
                flag = false
            } else {
                contLnameInput.style.border = "1px solid #ccc";
            }

            if (contNumberInput.value === "") {
                contNumberInput.style.border = "1px solid #cb0000";
                flag = false
            } else {
                contNumberInput.style.border = "1px solid #ccc";
            }

            if (flag == true)
                return true;
            if (flag == false)
                return false;
        default:
            return true;
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const dateInput = document.getElementById("dom");
    const currentDate = new Date().toISOString().split("T")[0];
    dateInput.value = currentDate;

document.getElementById("submit-form").addEventListener("click", function (event) {
    var flag = true;
    var safeCityInput = document.getElementById("safeCountry");
    var safeCityInput = document.getElementById("safeCity");
    var safeAddressInput = document.getElementById("safeAddress");
    var safeDescInput = document.getElementById("safeDesc");

    // Check for empty fields
    if (safeCityInput.value === "") {
        safeCityInput.style.border = "1px solid #cb0000";
        flag = false;
    } else {
        safeCityInput.style.border = "1px solid #ccc";
    }
    if (safeAddressInput.value === "") {
        safeAddressInput.style.border = "1px solid #cb0000";
        flag = false;
    } else {
        safeAddressInput.style.border = "1px solid #ccc";
    }
    if (safeDescInput.value === "") {
        safeDescInput.style.border = "1px solid #cb0000";
        flag = false;
    } else {
        safeDescInput.style.border = "1px solid #ccc";
    }
    if (safeCountry.value === "") {
        safeCountry.style.border = "1px solid #cb0000";
        flag = false;
    } else {
        safeCountry.style.border = "1px solid #ccc";
    }

    if (flag == false) {
        event.preventDefault();
        return false;
    }
    progressSteps.forEach((progressStep, idx) => {
        if (idx <= formStepsNum) {
            progressStep.classList.add("progress-step-check");
        } else {
            progressStep.classList.remove("progress-step-check");
        }
    });
    var forms = document.getElementById("forms");
    forms.submit();
    forms.classList.remove("form");
    forms.innerHTML =
    '<div class="welcome"><div class="content"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg><span><h2>System Self Test Succeeded!</h2></span><span>Mission Created Successfully</span><span>Your Mission Will Start</span></div></div>';
});


});


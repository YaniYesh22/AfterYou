


document.getElementById("editSpot").addEventListener("click", function () {
    var card = document.getElementById("safeSpotCard");
    var hide = document.getElementById("profCard");
    hide.style.display = "none"
    card.style.display = "block";
});

document.getElementById("editContact").addEventListener("click", function () {
    var card = document.getElementById("contactCard");
    var hide = document.getElementById("profCard");
    hide.style.display = "none"
    card.style.display = "block";
});
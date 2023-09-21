var selectMenu = document.querySelector(".input-select");

selectMenu.addEventListener("change", () => {
    var cardTable = document.querySelector(".card-table-bahan");
    if (selectMenu.value == "#") {
        cardTable.style.display = "none";
    } else {
        cardTable.style.display = "block";
    }
});

let inputDelete = document.getElementById("btnDelete");
let deleteButton = document.getElementById("delete");
inputDelete.addEventListener("click", (e) => {
    e.preventDefault();
    deleteButton.classList.remove("boxDelete");
    deleteButton.classList.add("deleteCare");
});
let cancelPoop = document.getElementById("cancelPo-op");
cancelPoop.addEventListener("click", (e) => {
    e.preventDefault();
    deleteButton.classList.remove("deleteCare");
    deleteButton.classList.add("boxDelete");
});
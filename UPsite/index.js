const serviceCard = document.getElementsByClassName("service-card");
const tarifCard = document.getElementsByClassName("tarif-card");

for(let i = 0; i < 3; i++){
    serviceCard[i].addEventListener("click", () => window.location.href = "http://UPsite/Services/services.php");
    tarifCard[i].addEventListener("click", () => window.location.href = "http://UPsite/Tariffs/tariffs.php");
}
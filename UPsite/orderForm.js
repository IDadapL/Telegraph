const orderForm = document.getElementsByClassName("order-form");

for(let i = 0; i < orderForm.length; i++) orderForm[i].addEventListener("click", () => window.location.href = "http://UPsite/Order/order.php");
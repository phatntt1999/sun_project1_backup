function updateCost(count, price) {
    document.getElementById("total").innerHTML = '$' + price * count;
    document.getElementById("totalPrice").value = count * price;
}

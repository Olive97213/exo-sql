<
    function updateElements(selectedName) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);


    document.getElementById("customerName").innerHTML = data.name;
    document.getElementById("customerEmail").innerHTML = data.email;
    document.getElementById("invoiceNumber").innerHTML = "idOrder # " + data.idOrder;
        }
    };
    xmlhttp.open("GET", "database.php?name=" + selectedName, true);
    xmlhttp.send();
}

    // Appel de la fonction updateElements lorsque vous sélectionnez un nom dans la liste déroulante
    document.getElementById("nom").addEventListener("change", function() {
    
    var selectedName = this.value;
    updateElements(selectedName);
});


var drzava_select = document.getElementsByClassName("drzava-select")[0];
var table = document.getElementsByClassName("table-container")[0].getElementsByTagName("tbody")[0];
var count = document.getElementsByClassName("count-container")[0];

drzava_select.addEventListener("change", updateTable);

function updateTable() {
    var drzava = drzava_select.options[drzava_select.selectedIndex].value;
    var xhr = new XMLHttpRequest();
    var url = "../PHP/updateTable.php?drzava=" + drzava;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            table.innerHTML = xhr.response;
            addListeners();
        }
    }
    xhr.open("POST", url, true);
    xhr.send();

    //Azuriranje ukupnog broja zarazenih
    var xhr2 = new XMLHttpRequest();
    url2="../PHP/count?drzava="+drzava;
    console.log(url2);
    xhr2.onreadystatechange = function () {
        if (xhr2.readyState == 4 && xhr2.status == 200) {
            count.innerHTML = xhr2.response;
            console.log(xhr2.response);
        }
    }
    xhr2.open("GET", url2, true);
    xhr2.send();
}

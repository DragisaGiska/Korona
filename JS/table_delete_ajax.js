//Funkcija ce se morati opet pozvati kada se tabela azurira preko AJAX-a jer ce se tabela zapravo isprazniti i zamijeniti novom,
//pa je potrebno opet zakaciti listenere na "DELETE"
//Obratiti paznju da je potrebno dodati klasu na redove da bi ih dohvatili ovdje
function addListeners() {
    var rows = document.getElementsByClassName("data-row");
    for (var i = 0; i < rows.length; i++) {
        var delete_col = rows[i].childNodes[5];
        delete_col.addEventListener("click", delete_patient);
    }
}

addListeners();

function delete_patient(sender) {
    //Zahtijevati potvrdu od korisnika
    var confirm = window.confirm("Are you sure you want to delete this patient?“");
    if (!confirm)
        return;

    var row = sender.target.parentNode;
    var id = row.childNodes[0].innerText;
    var xhr = new XMLHttpRequest();

    var url = "../PHP/delete-patient.php?id=" + id;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //Ukoliko je unos uspjesno obrisan iz baze mozemo red da sakrijemo,
            //svakako ga nece biti kada se stranica opet ucita jer ne postoji u bazi.
            row.style.display = "none";
            console.log(xhr.response);
        }
    }
    xhr.open("POST", url, true);
    xhr.send();
};
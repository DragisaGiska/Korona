var firstname = document.getElementsByName("firstname")[0];
var lastname = document.getElementsByName("lastname")[0];
var date = document.getElementsByName("date")[0];
var radio = document.getElementsByName("radio");

var add = document.getElementById("add");
var yes_radio = document.getElementById("yes");
var no_radio = document.getElementById("no");

function validate() {
    if (firstname.value.length <= 0 || lastname.value.length <= 0 || date.value == "" || (radio[0].checked == false && radio[1].checked == false)) {
        window.alert("Niste popunili sva polja!!!");
        return false;
    }

    return true;
}
document.getElementById('reset').addEventListener("click", function () {
    firstname.value = "";
    lastname.value = "";
    document.getElementsByClassName("drzava-select")[0].selectedIndex = 0;
    document.getElementsByName("date")[0].value = "";
    yes_radio.checked = false;
    no_radio.checked = false;
    add.style.backgroundColor="gray";   //Za slucaj da je bilo izabrano yes treba boju dugmeta vratiti na sivu

});

yes_radio.addEventListener("change", function () {
    if (yes_radio.checked)
        add.style.backgroundColor = 'red';
})

no_radio.addEventListener("change", function () {
    if (no_radio.checked)
        add.style.backgroundColor = 'gray';
})
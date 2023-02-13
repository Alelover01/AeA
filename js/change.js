function changeFoto() {
    let newFoto = document.getElementById('btnFile').files[0];
    let foto = newFoto.name; 
    let action = 1;
    let url = '../php/api-editProfile.php?foto=' + foto + '&action='+ action;
    window.location.href = url;
}
function changeCity() {
    let newCity = document.getElementById('lbCity').value;
    let action = 2;
    let url = '../php/api-editProfile.php?city=' + newCity + '&action='+ action;
    window.location.href = url;
}
function changePassword() {
    let newPass = document.getElementById('lbPass').value;
    let action = 3;
    let url = '../php/api-editProfile.php?pass=' + newPass + '&action=' + action;
    window.location.href = url;
}
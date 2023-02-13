function change() {
    let newFoto = document.getElementById('btnFile');
    let newCity = document.getElementById('lbCity');
    let newPass = document.getElementById('lbPass');

    let url = '../php/api-editProfile.php?foto=' + newFoto + '&city=' + newCity + 'pass=' + newPass;
    window.location.href = url;
}
function edit(){
    let action = document.getElementById('cbCategoria');

    if (action != 0) {
        let url = '../php/editProfile.php?action=' + action;
        window.location.href = url;
    }
    else {
        alert("You didn't choose anything");
    }
}
axios.get('php/api-logout.php').then(response => {
    if(response.data["logouteseguito"]){
        window.location.replace("./login.php");   
    }else{
        //?
    }
});
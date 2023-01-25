axios.get('php/login.php').then(response => {
    if(response.data["logineseguito"]){
        window.location.replace("./home.php");   
    }else{
        window.location.reload;  
    }
});
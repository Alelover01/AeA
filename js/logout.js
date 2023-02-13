
const btn_logout = document.getElementById("btn_logout");
btn_logout.addEventListener("click", function(event) {
    event.preventDefault();
	axios.get('../php/api-logout.php').then(response => {
        console.log(response.data);
        if(response.data){
            window.location.pathname = './AeA-main/php/login.php'; 
        }else{
            alert("Loguot NON eseguito");
            window.location.reload;
        }
    });
}

);


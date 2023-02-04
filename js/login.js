function myFunction() {
    alert("Password o Username sbagliati!");
};

axios.get('php/api-login.php').then(response => {
    
    let btn_submit = document.getElementById("btn_submit");
    btn_submit.addEventListener("click", () => {
        console.log(response);
        if(response.data["logineseguito"]){
            window.location.replace("./home.php");   
        }else{
            alert("Password o Username sbagliati!");
            //myFunction();
            window.location.reload;  
        }
    });
});

axios.get('../php/api-login.php').then(response => {
    visiblePassw();
    let btn_submit = document.getElementById("btn_submit");
    btn_submit.addEventListener("click", () => {
        console.log(response.data);
        if(response.data["logineseguito"]){
            window.location.replace("../php/home.php");   
        }else{
            alert("Password o Username sbagliati!");
            window.location.reload;  
        }
    });
}).catch((err) => console.log(err));

function visiblePassw(){
    document.getElementById('showPass').onclick = function() {
        if ( !this.checked ) {
           document.getElementById('Password').type = "password";
        } else {
           document.getElementById('Password').type = "text";
        }
    }; 
}
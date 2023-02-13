
const btn_like = document.getElementById("btn_like");
btn_like.addEventListener("click", function(event){
        event.preventDefault();
        axios.get('../php/api-like.php').then(function (response) {
                console.log(response.data);
                if(!response.data) {
                    alert("ERRORE RILEVATO!");
                    window.location.reload();   
                }else{
                    window.location.reload();   
                }
            }).catch(function (error) {
                console.log(error);
            });
});
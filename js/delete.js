const btn_delete = document.getElementById("btn_delete");
btn_delete.addEventListener("click", function(event){
        event.preventDefault();
        axios.get('../php/api-delete.php').then(function (response) {
                console.log(response.data);
                if(!response.data) {
                    alert("ERRORE! RIPROVA!");
                   window.location.reload();   
                }else{
                    //alert("ERRORE! RIPROVA!");
                window.location.pathname = './AeA-main/php/index_user_profile.php';  
                }
            }).catch(function (error) {
                console.log(error);
            });
});
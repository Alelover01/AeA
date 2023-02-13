/*const btn_like = document.getElementById("btn_like");
btn_like.addEventListener("click", function(event){
        event.preventDefault();
        const postId = this.dataset.postId;
        like(postId);
});

function like(postId){
    const formData = new FormData();
    formData.append('postId', postId);
    axios.post('../php/api-like.php',formData).then(response => {
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
}*/
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
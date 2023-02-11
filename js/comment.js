const btn_comment = document.getElementById("btn_comment");
btn_comment.addEventListener("click", function(event){
        event.preventDefault();
        const comment = document.querySelector("#comment").value;
        cerca(comment);
    });

function cerca(comment) {
    const formData = new FormData();
    formData.append('comment', comment);
    axios.post('../php/api-comment.php', formData).then(response => {
        console.log(response.data);
		if(!response.data) {
            alert("ERRORE RILEVATO!");
            window.location.reload();   
		}else{
            window.location.reload();   
        }
    });
}
const btn_pubblica = document.getElementById("btn_pubblica");
    btn_pubblica.addEventListener("click", function(event){
        event.preventDefault();
        const btnFile = document.getElementById("btnFile").files[0];
        const txtDidascalia = document.querySelector("#txtDidascalia").value;
        const cbCategoria = document.querySelector("#cbCategoria").value;
        pubblica(btnFile, txtDidascalia, cbCategoria );
    });

function pubblica(btnFile, txtDidascalia, cbCategoria) {
    const formData = new FormData();
    formData.append('btnFile', btnFile);
    formData.append('txtDidascalia', txtDidascalia);
    formData.append('cbCategoria', cbCategoria);
    axios.post('../php/api-post.php', formData).then(response => {
        console.log(response.data);
		if(response.data) {
			window.location.pathname = './AeA-main/php/index_user_profile.php';
		}else{
            alert("Errore, Riprova!");
            window.location.reload();
        }
    });
}
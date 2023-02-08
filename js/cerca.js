const btn_search = document.getElementById("btn_search");
    btn_search.addEventListener("click", function(event){
        event.preventDefault();
        const usrSearch = document.querySelector("#usrSearch").value;
        cerca(usrSearch);
    });

function cerca(usrSearch) {
    const formData = new FormData();
    formData.append('usrSearch', usrSearch);
    axios.post('../php/api-cerca.php', formData).then(response => {
        console.log(response.data);
		if(response.data["searchSuccess"]) {
			window.location.pathname = './AeA-main/php/index_someone_profile.php';
		}else{
            alert("Utente inesistente \n o Username sbagliato!");
            window.location.reload();
             
        }
    });
}
const btn_check = document.getElementById('showPass').onclick = function() {
    if ( !this.checked ) {
        document.getElementById('Password').type = "password";
    } else {
        document.getElementById('Password').type = "text";
    }
}; 

const btn_submit = document.getElementById("btn_submit");
   btn_submit.addEventListener("click", function (event) {
	event.preventDefault();
	const username = document.querySelector("#Username").value;
	const password = document.querySelector("#Password").value;
	login(username, password);
});

function login(username, password) {
    const formData = new FormData();
    formData.append('Username', username);
    formData.append('Password', password);
    axios.post('../php/api-login.php', formData).then(response => {
        console.log(response.data);
		if(response.data["logineseguito"]) {
			window.location.pathname = './AeA-main/php/home.php';
		}else{
            alert("Password e/o Username sbagliati!");
            window.location.reload();
             
        }
    });
}
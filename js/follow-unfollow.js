const btn_follow = document.getElementById("btn_follow");
btn_follow.addEventListener("click", function (event) {
    event.preventDefault();
	const follow = document.querySelector("#btn_follow");
    const unfollow = document.querySelector("#btn_unfollow");
    action(follow, unfollow);
});

function action(follow, unfollow) {
    const formData = new FormData();
    formData.append('follow', follow);
    formData.append('unfollow', unfollow);
    axios.post('../php/api-follow.php', formData).then(response => {
        console.log(response.data);
		if(response.data["success"]) {
            window.location.reload();
			//window.location.pathname = './AeA-main/php/profile.php';
		}else{
            alert("Qualcosa è andato storto! \n Riprova!");
            window.location.reload();
             
        }
    });
}
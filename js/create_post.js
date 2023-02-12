window.onload = function () {
    const btn_create_post = document.querySelector(".btn_create_post");
    btn_create_post.addEventListener("click", function (event) {
        event.preventDefault();
        const btn_create_post = document.querySelector("btn_create_post");
        btn_create_post.classList.toggle("is-active");
        create_post(post)
    })
};

function create_post(post) {
    const formData = new FormData();
    formData.append('post', post);
    axios.post('../php/api-post.php', formData).then(response => {
        console.log(response.data);
		if(!response.data) {
            alert("Qualcosa è andato storto! \n Riprova!");
            window.location.reload();
		}else{
            window.location.pathname = './AeA-main/php/home.php'; //dove voglio che mi riporti una volta  creto il post
        }
    });
}


const url = "https://dog.ceo/api/breeds/image/random"
//const url = "https://api-dhel.herokuapp.com" 
const loadingElement = document.querySelector("#loading");
const postsContainer = document.querySelector("#posts-container");
const campoImagem = document.querySelector("#imagem");

async function getAllPosts(){
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    campoImagem.src = data.message
    //campoImagem.src = data.image_url
}
getAllPosts();
setInterval(getAllPosts, 3000);
var ticketsButton = document.querySelector("#tickets-button");
var commentButton = document.querySelector("#comments-button");
var divForPosts = document.querySelector("#tickets-list");
var divEditPost = document.querySelector("#edit-post");
var buttonStopEdit = document.querySelector("#btn-stop-update");

ticketsButton.addEventListener("click", function(){
	try{
		divEditPost.style.display = "none";
	}
	catch(e){
		console.log(e + " : La div n'a pas était chargé");
	}
	divForPosts.style.display = "block";
})

commentButton.addEventListener("click", function(){
	try{
		divEditPost.style.display = "none";
	}
	catch(e){
		console.log(e + " : La div n'a pas était chargé");
	}
	divForPosts.style.display = "none";
})

buttonStopEdit.addEventListener("click",function(){
	divEditPost.style.display = "none";
	divForPosts.style.display = "block";
})
const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

const border = document.querySelector('.select');
function changeMe(sel){
	sel.style.color = "var(--medium-blue)";
	border.style.borderBottom  = "2px solid var(--light-blue)";
}
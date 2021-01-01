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

function changeMe(sel){
	sel.style.color = "var(--medium-blue)";
	sel.parentNode.style.borderBottom  = "2px solid var(--light-blue)";
}

// Content
function checkNew(){
	const val = document.querySelectorAll(".slct-content");
	const newDocument = document.querySelector(".select-new");
	const newInput = document.querySelector(".new-input");

	if (val[0].value === "new"){
		newDocument.style.display = "flex";
		newInput.style.display = "block";
	}

	else{
		newDocument.style.display = "none";
		newInput.style.display = "none";
	}
}
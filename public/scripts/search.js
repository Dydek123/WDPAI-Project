const search = document.querySelector('input[placeholder="Szukaj..."]');
const contentContainer = document.querySelector('#nav__sticky');

function loadContents(contents) {
    contents.forEach(content => {
        console.log(content);
        createContent(content);
    });
}


function createContent(searchContent) {
    const template = document.querySelector('#content-template');
    const clone = template.content.cloneNode(true);

    const button = clone.querySelector("button");
    console.log(searchContent);
    button.innerHTML = searchContent.title;
    console.log(searchContent.title);
    button.value = searchContent.name+";"+searchContent.title;

    contentContainer.appendChild(clone);
}

search.addEventListener('keyup', function (event){
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};
        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (contents) {
            contentContainer.innerHTML = "";
            loadContents(contents)
        });
    }
})
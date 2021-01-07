const search = document.querySelector('input[placeholder="Szukaj..."]');
const contentContainer = document.querySelector('#nav__sticky');

let existCategory = [];

function getUniqueCategories(contents){
    contents.forEach(content=> {
        if (!existCategory.includes(content.name)){
            existCategory.push(content.name)
        }
    });
}

function loadContents(contents) {
    getUniqueCategories(contents)
    existCategory.forEach(category => {
        createContent(contents, category);
    });
    collapseMenu()
}


function createContent(searchContent, category) {
    const template = document.querySelector('#content-template');
    const clone = template.content.cloneNode(true);

    const templateCategory = clone.querySelector("span");
    templateCategory.innerHTML = category;
    searchContent.forEach(content =>{
        if (content.name === category){
            const buttonTemplate = document.querySelector('#content-template-list-element');
            const cloneButton = buttonTemplate.content.cloneNode(true);

            const button = cloneButton.querySelector("button");
            button.innerHTML = content.title;
            button.value = content.name+";"+content.title;
            const menuContainer = clone.querySelector('.collapse__menu')
            menuContainer.appendChild(cloneButton);
        }
    });

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
const formatString = (input) => {
    return input
        .split('_')                     // Divide a string em um array por "_"
        .map(word => word.charAt(0).toUpperCase() + word.slice(1)) // Capitaliza cada palavra
        .join(' ');                     // Junta as palavras com um espaço
}

/*
deletBtn.addEventListener('click', (e) => {

    console.log(e);

    fetch(`/remove`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Adiciona o token CSRF
        },
        body: JSON.stringify({
            id: v
        })
    }).then((r) => {
        return r.json()
    }).then((res) => {
        location.reload();
    })


})
*/


const newButton = {

    edit: (data) => {
        // Cria o elemento <a>
        const button = document.createElement("button");
        button.className = "btn edit-item-btn text-secondary";

        button.setAttribute('data-book-id', data.id)

        button.setAttribute('data-bs-toggle', 'modal')
        button.setAttribute('data-bs-target', '#editBookModal')

        button.setAttribute('data-book-title', data.title)
        button.setAttribute('data-book-genre', formatString(data.genre))
        button.setAttribute('data-book-author', data.author)
        button.setAttribute('data-book-height', data.b_height)

        // Cria o elemento <svg>
        const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        svg.setAttribute("width", "1em");
        svg.setAttribute("height", "1em");
        svg.setAttribute("viewBox", "0 0 8 8");

        // Cria o elemento <path> para o ícone
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("fill", "currentColor");
        path.setAttribute("d", "M6 0L5 1l2 2l1-1zM4 2L0 6v2h2l4-4z");

        // Anexa o <path> ao <svg>
        svg.appendChild(path);


        // Anexa o <svg> ao botão
        button.appendChild(svg);

        // retorna o elemento
        return button
    },


    delete: (data) => {

        // Cria o elemento <a>
        const button = document.createElement("button");
        button.className = "btn delete-item-btn text-danger";

        button.setAttribute('type', "button")


        button.setAttribute('id', 'delete-book')

        button.setAttribute('data-book-id', data.id)

        button.setAttribute('data-bs-toggle', 'modal')
        button.setAttribute('data-bs-target', '#deleteBookModal')




        // Cria o elemento <svg>
        const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        svg.setAttribute("width", "1em");
        svg.setAttribute("height", "1em");
        svg.setAttribute("viewBox", "0 0 8 8");

        // Cria o elemento <path> para o ícone
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("fill", "currentColor");
        path.setAttribute("d", "M3 0c-.55 0-1 .45-1 1H1c-.55 0-1 .45-1 1h7c0-.55-.45-1-1-1H5c0-.55-.45-1-1-1zM1 3v4.81c0 .11.08.19.19.19h4.63c.11 0 .19-.08.19-.19V3h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V3h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V3h-1z");

        // Anexa o <path> ao <svg>
        svg.appendChild(path);

        // Anexa o <svg> ao botão
        button.appendChild(svg);

        // retorna o elemento
        return button

    }



}

// Converter FormData para um objeto
const formToObject = (form) => {
    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    return data
}

const consentDialog = async (accpet, refuse) => {

    console.log("ENTROOU");

    const deletBtn = document.querySelector(accpet);
    
    return new Promise((resolve, reject) => {

        // Evento de remoção de livro
        deletBtn.addEventListener(
            "click",
            () => {

                resolve(true)

            },
            { once: true } // Garante que o evento seja adicionado uma única vez
        );

    })
}



export { newButton, formatString, formToObject, consentDialog }
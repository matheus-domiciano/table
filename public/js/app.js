import { newButton, formatString, formToObject, consentDialog } from "../js/components.js";
import { findBooks, removeBook, updateBook, createBook } from "./api.js";

let bookList = []

// Seletores principais
const sIpt = document.getElementById("search-input");
const tbody = document.getElementsByTagName("tbody")[0]; // Seleção direta do elemento tbody

// Função principal pra construir a lista de livros
async function construcList(query) {

    const res = await findBooks(query);
    bookList = []
    bookList.push(res.books)

    if (bookList[0].length === 0) {
        tbody.innerHTML = "<tr class='mt-5 ml-50'><td colspan='5'>Nenhum Produto Encontrado</td></tr>";
        return;
    }

    tbody.innerHTML = ""; // Limpa a tabela

    // Popula a lista de livros
    bookList[0].slice(0, 10).forEach(book => {
        const tr = document.createElement("tr");

        // Colunas da tabela
        tr.appendChild(createTableCell(book.title));
        tr.appendChild(createTableCell(book.author));
        tr.appendChild(createTableCell(formatString(book.genre)));
        tr.appendChild(createTableCell(book.b_height));

        // Coluna de ações
        const tdActions = document.createElement("td");

        let editBtn = null
        editBtn = newButton.edit(book)

        let deleteBtn = null
        deleteBtn = newButton.delete(book)

        

        tdActions.appendChild(editBtn);
        tdActions.appendChild(deleteBtn);
        tr.appendChild(tdActions);

        tbody.appendChild(tr);

    });


        eachList()
   


}

// Função pra criar uma celula de tabela
function createTableCell(content) {
    const td = document.createElement("td");
    td.innerHTML = content;
    return td;
}

// Evento ao carregar o DOM
document.addEventListener("DOMContentLoaded", async () => {


    const newBook = document.querySelector('#new-book');

    newBook.addEventListener('click', () => {

        document.querySelector('#create-book-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const addBookForm = document.querySelector('#create-book-form')

            await createBook(formToObject(addBookForm));

            construcList();

        })

    })


    eachList()



});


// Evento pra busca dinâmica
sIpt.addEventListener("keyup", e => {
    const query = e.target.value;
    construcList(query);
});





function eachList() {


    const deleteButtonList = document.querySelectorAll(".delete-item-btn")

    deleteButtonList.forEach((btn, i) => {

        // Adiciona o event listener de clique para o botão de exclusão
        btn.addEventListener("click", async() => {

            const getId = document.getElementById("delete-book-id");
            const consent = await consentDialog('#confirm-delete-book')
            
            if (consent) {
                removeBook(getId.value);
                construcList();
            }
        });

    });


    const editListBTN = document.querySelectorAll(".edit-item-btn");


    editListBTN.forEach(btn => {

        btn.addEventListener("click", () => {

            const formEdit = document.getElementById("form-edit-book");


            console.log(formToObject(formEdit));

            // Evento de remoção de livro
            formEdit.addEventListener(
                "submit",
                async (event) => {

                    event.preventDefault();


                    await updateBook(formToObject(formEdit));
                    construcList();


                },
                { once: true } // Garante que o evento seja adicionado uma única vez
            );

        });
    });


    
}





// Configuração do modal de edição
$("#editBookModal").on("show.bs.modal", event => {
    const button = $(event.relatedTarget);
    const modal = $(event.currentTarget);

    modal.find(".modal-body #book-title").val(button.data("book-title"));
    modal.find(".modal-body #book-genre").val(button.data("book-genre"));
    modal.find(".modal-body #book-author").val(button.data("book-author"));
    modal.find(".modal-body #book-height").val(button.data("book-height"));

    modal.find(".modal-body #edit-book-id").val(button.data("book-id"));

});



// Configuração do modal de exclusão
$("#deleteBookModal").on("show.bs.modal", event => {
    const button = $(event.relatedTarget);
    const modal = $(event.currentTarget);

    modal.find(".modal-body #delete-book-id").val(button.data("book-id"));
});











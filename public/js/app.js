import { newButton, formatString, formToObject } from "../js/components.js";
import { findBooks, removeBook, updateBook, createBook } from "./api.js";

// Seletores principais
const sIpt = document.getElementById("search-input");
const tbody = document.getElementsByTagName("tbody")[0]; // Seleção direta do elemento tbody

// Função principal pra construir a lista de livros
async function construcList(res) {
    if (res.books.length === 0) {
        tbody.innerHTML = "<tr><td colspan='5'>Nenhum Produto Encontrado</td></tr>";
        return;
    }

    tbody.innerHTML = ""; // Limpa a tabela

    // Popula a lista de livros
    res.books.slice(0, 10).forEach(book => {
        const tr = document.createElement("tr");

        // Colunas da tabela
        tr.appendChild(createTableCell(book.title));
        tr.appendChild(createTableCell(book.author));
        tr.appendChild(createTableCell(formatString(book.genre)));
        tr.appendChild(createTableCell(book.b_height));

        // Coluna de ações
        const tdActions = document.createElement("td");
        tdActions.appendChild(newButton.edit(book));
        tdActions.appendChild(newButton.delete(book));
        tr.appendChild(tdActions);

        tbody.appendChild(tr);
    });
}

// Função pra criar uma celula de tabela
function createTableCell(content) {
    const td = document.createElement("td");
    td.innerHTML = content;
    return td;
}

// Evento ao carregar o DOM
document.addEventListener("DOMContentLoaded", async () => {

    const deleteListBTN = document.querySelectorAll(".delete-item-btn");

    const editListBTN = document.querySelectorAll(".edit-item-btn");

    const newBook = document.querySelector('#new-book');


    newBook.addEventListener('click',  () => {

        document.querySelector('#create-book-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const addBookForm = document.querySelector('#create-book-form')

            await createBook(formToObject(addBookForm));
            const res = await findBooks();
            construcList(res);



        })



    })



    deleteListBTN.forEach(btn => {
        btn.addEventListener("click", () => {
            const getId = document.getElementById("book-id");
            const deletBtn = document.getElementById("delete-book");

            // Evento de remoção de livro
            deletBtn.addEventListener(
                "click",
                async () => {
                    await removeBook(getId.value);
                    const res = await findBooks();
                    construcList(res);
                },
                { once: true } // Garante que o evento seja adicionado uma única vez
            );
        });
    });


    editListBTN.forEach(btn => {
        btn.addEventListener("click", () => {
            const getId = document.getElementById("edit-book-id");

            const formEdit = document.getElementById("form-edit-book");



            // Evento de remoção de livro
            formEdit.addEventListener(
                "submit",
                async (event) => {

                    event.preventDefault();


                    await updateBook(formToObject(formEdit));
                    const res = await findBooks();
                    construcList(res);


                },
                { once: true } // Garante que o evento seja adicionado uma única vez
            );
        });
    });




});

// Evento pra busca dinâmica
sIpt.addEventListener("keyup", async e => {
    const query = e.target.value;
    const res = await findBooks(query);
    construcList(res);
});

// Configuração do modal de edição
$("#editBookModal").on("show.bs.modal", event => {
    const button = $(event.relatedTarget);
    const modal = $(event.currentTarget);

    modal.find(".modal-body #book-title").val(button.data("book-title"));
    modal.find(".modal-body #book-genre").val(button.data("book-genre"));
    modal.find(".modal-body #book-author").val(button.data("book-author"));
    modal.find(".modal-body #book-height").val(button.data("book-height"));

    modal.find(".modal-body #edit-book-id").val(button.data("edit-book-id"));

});



// Configuração do modal de exclusão
$("#deleteBookModal").on("show.bs.modal", event => {
    const button = $(event.relatedTarget);
    const modal = $(event.currentTarget);

    modal.find(".modal-body #book-id").val(button.data("book-id"));
});



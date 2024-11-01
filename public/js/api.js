// Captura o token CSRF da tag <meta>
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const findBooks = (v) => {

    return new Promise((resolve, reject) => {
        fetch(`api/search`, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // Adiciona o token CSRF
            },
            body: JSON.stringify({
                name: v
            })
        }).then((r) => {

            return r.json()
        }).then((res) => {

            resolve(res)

        }).catch((err) => {

            reject(err)

        })

    })
}


const removeBook = (v) => {

    return new Promise((resolve, reject) => {
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
            resolve(res)
        }).catch((err) => {
            reject(err)
        })

    })
}

const updateBook = (data) => {
     
    return new Promise((resolve, reject) => {
        fetch(`/edit/${data.id}`, {
            method: "PUT",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // Adiciona o token CSRF
            },
            body: JSON.stringify({
                id: data.id,
                title: data.title,
                genre: data.genre,
                author: data.author,
                b_height: data.b_height,
            })
        })
        .then(response => response.json())
        .then(res => {
            console.log(res);
        })
        .catch(error => console.log('Error:', error));

    })
}

const createBook = (data) => {
     
    return new Promise((resolve, reject) => {
        fetch(`/add`, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // Adiciona o token CSRF
            },
            body: JSON.stringify({
                title: data.title,
                genre: data.genre,
                author: data.author,
                b_height: data.b_height,
            })
        })
        .then(response => response.json())
        .then(res => {
            console.log(res);
            resolve(res)
        })
        .catch(error => reject(error));

    })
}

export { findBooks, removeBook, updateBook, createBook } 
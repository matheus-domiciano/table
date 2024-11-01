<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/styles.css">

</head>

<body>

  @yield('conteudo')


  <!-- Add Modal -->
  <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBookModalTitle">Add Book</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="create-book-form">

          <div class="modal-body">

            <div class=" form-row row mb-3">
              <div class="col-md-7">
                <label for="book-title">Book Title</label>
                <input id="book-title" name="title" type="text" class="form-control" placeholder="The Shack">
              </div>

              <div class="col">
                <label for="book-genre">Genre</label>
                <input id="book-genre" name="genre" type="text" class="form-control" placeholder="Religious">
              </div>
            </div>


            <div class="row">

              <div class="col-md-8">
                <label for="author-name">Author Name</label>
                <input id="author-name" name="author" type="text" class="form-control" placeholder="William Paul Young">
              </div>

              <div class="col">
                <label for="book-height">Height</label>
                <input id="book-height" name="b_height" type="text" class="form-control" placeholder="256">
              </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secundary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add</button>
            </div>

          </div>

        </form>


      </div>
    </div>
  </div>




  <!-- Edit Modal -->
  <div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editBookModalTitle">Edit Book</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="form-edit-book">
          <div class="modal-body">

            <div class=" form-row row mb-3">
              <div class="col-md-7">
                <label for="book-title">Book Title</label>
                <input name="title" id="book-title" type="text" class="form-control" placeholder="The Shack">
              </div>

              <div class="col">
                <label for="book-genre">Genre</label>
                <input id="book-genre" name="genre" type="text" class="form-control" placeholder="Religious">
              </div>
            </div>


            <div class="row">



              <div class="col-md-8">
                <label for="author-name">Author Name</label>
                <input id="book-author" name="author" type="text" class="form-control" placeholder="William Paul Young">
              </div>

              <div class="col">
                <label for="book-height">Height</label>
                <input id="book-height" name="b_height" type="text" class="form-control" placeholder="256">
              </div>
            </div>

            <input type="text" name="id" id="edit-book-id" value="" hidden>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="edit-btn-save" type="submite" class="btn btn-primary" data-bs-dismiss="modal"> Save changes</button>
          </div>

        </form>

      </div>
    </div>
  </div>




  <!-- Delete Modal -->
  <div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-labelledby="deleteBookModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteBookModalTitle">Delete Book</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          Are you sure about this?

          <input type="text" name="id" id="book-id" value="" hidden>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          <button id="delete-book" data-bs-dismiss="modal" class="btn btn-danger">Delete</button>


        </div>

      </div>
    </div>
  </div>



  <script type="module" src="/js/app.js"></script>





</body>

</html>
@extends('layout')

@section('conteudo')




<div class="flex-column w-100 align-items-center d-flex ">

    <br>
    <br>
    <h3> WELCOME TO ZIEVO TEST</h3>
    <br>
    <br>
    <div class="flex-row h-9 w-900 d-flex  justify-content-between">

        <div class="input-group w-80per">

            <input id="search-input" type="text" class="form-control" placeholder="Search book..." aria-label="Search book..." aria-describedby="button-addon2">
            <div class="input-group-append">

            </div>

            <button class="btn btn-outline-secondary " type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8">
                    <path fill="currentColor" d="M3.5 0C1.57 0 0 1.57 0 3.5S1.57 7 3.5 7c.59 0 1.17-.14 1.66-.41a1 1 0 0 0 .13.13l1 1a1.02 1.02 0 1 0 1.44-1.44l-1-1a1 1 0 0 0-.16-.13c.27-.49.44-1.06.44-1.66c0-1.93-1.57-3.5-3.5-3.5zm0 1C4.89 1 6 2.11 6 3.5c0 .66-.24 1.27-.66 1.72l-.03.03a1 1 0 0 0-.13.13c-.44.4-1.04.63-1.69.63c-1.39 0-2.5-1.11-2.5-2.5s1.11-2.5 2.5-2.5z" />
                </svg></button>

        </div>


        <button id="new-book" type="button" class="btn btn-primary w-200" data-bs-toggle="modal" data-bs-target="#addBookModal" aria-pressed="false" autocomplete="off">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8">
                <path fill="currentColor" d="M3 0v3H0v2h3v3h2V5h3V3H5V0z" />
            </svg> Add Book
        </button>



    </div>

    <hr>


    <div class="table-container table-responsive-md">


        <table class="table table-hover" height="600px">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Height</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($livros as $livro)


                <tr>



                    <td>{{ $livro->title }}</td>
                    <td>{{ $livro->author }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $livro->genre)) }}</td>
                    <td>{{ $livro->b_height }}</td>
                    <td><button type="button" class="btn edit-item-btn text-secondary" data-bs-toggle="modal" data-edit-book-id="{{ $livro->id }}"  data-bs-target="#editBookModal" data-book-title="{{ $livro->title }}" data-book-genre="{{ ucwords(str_replace('_', ' ', $livro->genre)) }}"
                            data-book-author="{{ $livro->author }}"
                            data-book-height="{{ $livro->b_height }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8">
                                <path fill="currentColor" d="M6 0L5 1l2 2l1-1zM4 2L0 6v2h2l4-4z" />
                            </svg>
                        </button>

                        <button type="button" class="btn delete-item-btn text-danger" 
                        data-book-id="{{ $livro->id }}"  data-bs-toggle="modal" data-bs-target="#deleteBookModal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8">
                                <path fill="currentColor" d="M3 0c-.55 0-1 .45-1 1H1c-.55 0-1 .45-1 1h7c0-.55-.45-1-1-1H5c0-.55-.45-1-1-1zM1 3v4.81c0 .11.08.19.19.19h4.63c.11 0 .19-.08.19-.19V3h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V3h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V3h-1z" />
                            </svg></button>
                    </td>


                </tr>





                @endforeach

            </tbody>
        </table>

    </div>



    <div class="row center">
        {{ $livros->links('custom.pagination') }}
    </div>




</div>





@endsection
<!-- Button trigger modal -->
<div class="d-flex align-items-center justify-content-center mb-2">
    <button type="button" class="btn btn-darkBrown rounded-pill" data-bs-toggle="modal" data-bs-target="#addBook">
        ADD A BOOK
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-lightBrown">
            <div class="modal-header">
                <h1 class="modal-title fs-4 text-darkBrown fw-bold" id="exampleModalLabel">Add A Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="formHolder">
                    <form action={{ route('books.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title"  required>
                        </div>
                        <div>
                            <label for="author">author</label>
                            <input type="text" name="author" id="author" placeholder="Author" required>
                        </div>
                        <div>
                            <label for="summary">summary</label>
                            <textarea type="text" name="summary" id="summary" rows="1" placeholder="Book Summary" required></textarea>
                        </div>
                        <div>
                            <div class="d-flex align-items-center flex-column p-1">

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="btn btn-darkBrown rounded-pill ps-2 pe-2 active"
                                            id="pills-file-tab" data-bs-toggle="pill" data-bs-target="#pills-file"
                                            type="button" role="tab" aria-controls="pills-file"
                                            aria-selected="true">file</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="btn btn-darkBrown rounded-pill ps-2 pe-2 ms-2" id="pills-url-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-url" type="button"
                                            role="tab" aria-controls="pills-url" aria-selected="false">url</button>
                                    </li>

                                </ul>
                                <div class="tab-content text-center" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-file" role="tabpanel"
                                        aria-labelledby="pills-file-tab" tabindex="0">
                                        <div class="container">
                                            <label for="imgFile">Image File: </label>
                                            <input type="file" name="imgFile" id="imgFile" placeholder="Image File">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-url" role="tabpanel"
                                        aria-labelledby="pills-url-tab" tabindex="0">
                                        <div class="container">
                                            <label for="imgUrl">Image Link: </label>
                                            <input type="url" name="imgUrl" id="imgUrl" placeholder="Image Link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="price">price</label>
                            <input type="number" name="price" id="price" placeholder="Price" required>
                        </div>
                        <div>
                            <label for="stock">stock</label>
                            <input type="number" name="stock" id="stock" placeholder="Stock" required>
                        </div>
                        <button class="btn btn-darkBrown rounded-pill mt-2" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-inline-block advanced-searchbar-width">
    <form class="d-lg-flex me-auto justify-content-lg-start search-form float-lg-end" target="_self">
        <div class="d-flex justify-content-lg-end"><input class="border rounded form-control search-field" type="text" id="search-field" name="name">
            <button id="searchbtn" class="btn btn-primary d-flex justify-content-center align-items-center" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn rounded btn-advanced-search" id="btn-advanced-search" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="collapse">Advanced search</button>
        </div>
    </form>
    {{ $articles->appends(request()->except('page'))->links() }}
</div>
<div class="collapse" id="searchCollapse">
    <form target="_self">
        <div class="row m-2 align-items-center">
            <div class="col-2">
                <label for="name">Name:</label>
            </div>
            <div class="col-4">
                <input type="text" id="name" name="name" placeholder="Name" value="{{request('name')}}">
            </div>
        </div>
        <div class="row m-2 align-items-center">
            <div class="col-2">
                <label for="author">Author:</label>
            </div>
            <div class="col-4">
                <input type="text" id="author" name="author" placeholder="Author" value="{{request('author')}}">
            </div>
        </div>
        <div class="row m-2 align-items-center">
            <div class="col-2">
                <label for="date">Date:</label>
            </div>
            <div class="col-4">
                <input type="text" id="date" name="date" value="{{request('date')}}">
            </div>
        </div>
        <div class="row m-2 align-items-center">
            <div class="col-2">
                <label for="category">Categories:</label>
            </div>
            <div class="col-4">
                <input type="text" id="category" name="categories" value="{{request('categories')}}" placeholder="Categories">
            </div>
        </div>
        <div class="m-2">
            <button class="btn btn-primary rounded" type="submit">Filter search</button>
        </div>
    </form>
</div>

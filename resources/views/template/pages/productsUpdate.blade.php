<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{($product->productName)}}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="number" class="form-control" id="category" name="category" value="{{($product->categoryId)}}" required>
                @error('categoryId')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="float" class="form-control" id="price" name="price" value="{{($product->price)}}" required>
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Ldescription" class="form-label">Long</label>
                <input type="text" class="form-control" id="Ldescription" name="Ldescription" value="{{($product->Ldescription)}}" required>
                @error('Ldescription')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Sdescription" class="form-label">Short description</label>
                <input type="float" class="form-control" id="Sdescription" name="Sdescription" value="{{($product->Sdescription)}}" required>
                @error('Sdescription')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image1" class="form-label">image 1</label>
                <input type="file" class="form-control-file" id="image1" name="image1" accept="image/*" value="{{($product->image1)}}" required>
                <span>{{($product->image1)}}</span>
                <img src="{{ asset('images/products/' . $product->image1) }}" alt="Current image" width="50" height="50" class="img-thumbnail">

                @error('image1')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image2" class="form-label">Image 2</label>
                <input type="file" class="form-control-file" id="image2" name="image2" accept="image/*" value="{{($product->image2)}}" required>
                <span>{{($product->image2)}}</span>
                <img src="{{ asset('images/products/' . $product->image2) }}" alt="Current Image" width="50" height="50" class="img-thumbnail">

                @error('image2')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image3" class="form-label">image 3</label>
                <input type="file" class="form-control-file" id="image3" name="image3" accept="image/*" value="{{($product->image3)}}" required>
                <span>{{($product->image3)}}</span>
                <img src="{{ asset('images/products/' . $product->image3) }}" alt="Current image3" width="50" height="50" class="img-thumbnail">

                @error('image3')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

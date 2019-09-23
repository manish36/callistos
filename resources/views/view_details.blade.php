@extends('layout.menu')

@section('datacontent')

  <div class="row">
    <div class="col-sm-5">
      <div class="card">
          <div class="card  card-header">
            
             <form method="get" action="/">
               {{ @csrf_field() }}
               <input type="hidden" name="o"><button class="btn btn-success">Back</button>
             </form>
           </div>
          <div class="card-body">
            @foreach($book_details as $book)
            <form method="post" action="/edit_book" enctype="multipart/form-data">
               {{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Title</label>
                      <div class="col-sm-7">
                        <input type="hidden"  class="form-control" name="id"  value="{{$book->id}}" required>
                      <input type="text"  class="form-control" name="title"  value="{{$book->title}}" required >
                      {{ $errors->first('title') }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Author</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" name="author" placeholder="Author Name" value="{{$book->author}}" required>
                      {{ $errors->first('author') }}
                    
                      
                     </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Description</label>
                      <div class="col-sm-7">

                      <textarea class="form-control" rows="3" name="description" cols="6" required >
                      {{ $book->description }}
                      </textarea>
                       {{ $errors->first('description') }}
                    
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Cover Image</label>
                      <div class="col-sm-7">
                      <input type="hidden" class="form-control"  name="book_cover_old"  value="{{$book->book_cover}}" required>
                      <img src="{{ URL::to('/') }}/images/{{ $book->book_cover }}" class=" img-responsive" height="100" width="100">
                    
                      {{ $errors->first('book_cover') }}
                    </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Price</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" name="price"  value=" {{$book->price}}" required>
                      {{ $errors->first('price') }}
                    
                      </div>
                    </div>
                    </form>
             @endforeach
          </div>
          </div>
          </div>   
</div>
@endsection
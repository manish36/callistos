@extends('layout.menu')

@section('datacontent')
@if(session()->has('name'))

  <div class="row">
    <div class="col-sm-4">
      <div class="card">
          <div class="card  card-header">
             <a class="nav-link"  href="#">Add New</a>
           </div>
          <div class="card-body">
            <form method="post" action="/store_book" enctype="multipart/form-data">
               {{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Title</label>
                      <div class="col-sm-7">
                      <input type="text"  class="form-control" name="title"  value="{{ old('title') }}">
                      {{ $errors->first('title') }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Author</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" name="author" placeholder="Author Name" value="{{ old('author') }}">
                      {{ $errors->first('author') }}
                    
                      
                     </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Description</label>
                      <div class="col-sm-7">
                      <textarea class="form-control" rows="3" name="description" cols="6" value="{{ old('description') }}">
                      </textarea>
                       {{ $errors->first('description') }}
                    
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Cover Image</label>
                      <div class="col-sm-7">
                      <input type="file" class="form-control" name="book_cover"  value="{{ old('book_cover') }}">
                      {{ $errors->first('book_cover') }}
                    </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Price</label>
                      <div class="col-sm-7">
                      <input type="number" class="form-control" name="price"  value="{{ old('price') }}">
                      {{ $errors->first('price') }}
                    
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-4">
                      <button class="btn btn-success">ADD</button>
                      </div>
                    </div>
                    
             </form>
          </div>
          </div>
          </div>
  <div class="col-sm-8">
    <div class="card">
          <div class="card  card-header">
             <a class="nav-link"  href="#">Manage Books</a>
           </div>
           <div class="class-body">
             <table class="table">
              <tr>
               <th>Book Id</th>
               <th>Title</th>
               <th>Author</th>
               <th>Details</th>
             </tr>
              @forelse($book_list as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td> <form method="post" action="view_detail">
              {{ csrf_field() }}
             <input type="hidden" name="o" value="{{$book->id}}">
             <button class="btn btn-primary">
            View Details</button></form></td>
          </tr>
          @empty
          <tr>
            <td colspan="3">
            <p>No Books has  been added</p>
          </td>
          </tr>
           @endforelse
             </table>
           </div>
         </div>
  </div>   
</div>
@endif
@endsection
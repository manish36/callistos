@extends('layout.menu')

@section('datacontent')
<div class="tab-content" >
  <div class="tab-pane  active   " id="pills-home" role="tabpanel" >
    <div class="container-fluid">
      <div class="row" style="margin-top: 4px;">
      <div  class="col-sm-3">
        <div class="card">
          <div class="card  card-header">
            <a class="nav-link"  href="#">ABOUT US</a>
          </div>
          <div class="card-body">
            It is an online book store where you can sell and buy books in profitable prices
          </div>
          <div class="card card-footer">
            Thank you
          </div>
        </div>
        <hr>
        <div class="card">
          <div class="card  card-header">
            TIPS
          </div>
          <div class="card-body">
            Choose Wisely!!
          </div>
          <div class="card card-footer">
            Thank you
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
            <p class="text-success font-weight-normal">Results </p>
          </div>
           <div>
             <form class="form" method="post" action="SearchBook">
              <div class="input-group">

                {{ @csrf_field() }}
              <input type="search" name="o" class="form-control" placeholder="search books">
              <button class=" btn btn-primary input-group-addon">Go</button>
               </div>
             </form>
           </div>
          <div>
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
            <td> <form method="post" action="view_detail_client">
              {{ csrf_field() }}
             <input type="hidden" name="o" value="{{$book->id}}">
             <button class="btn btn-primary">
            View Details</button></form></td>
          </tr>
          @empty
          <tr>
            <td colspan="3">
            <p>No Books has  been Found</p>
          </td>
          </tr>
           @endforelse
             </table>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  </div>
  <div class="tab-pane fade" id="pills-admin" role="tabpanel">
    <div class="container">
      <div class="row">
      <div class="col-sm-4">
        <form action="login" method="post" >
                {{ csrf_field() }} 
                  <label>Username</label>
                <input name="username" class="form-control" type="text" placeholder="Enter Username" required> 
                <label>Password</label>
                <input class="form-control" name="password" type="password" placeholder="Enter Password" required> 
                <input type="submit" class="btn btn-success" value="Login"> 
              </form>
      </div>
       </div>
    </div>
    </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" >h4</div>
</div>
@endsection
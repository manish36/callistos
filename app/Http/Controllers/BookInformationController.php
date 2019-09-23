<?php

namespace App\Http\Controllers;

use App\book_information;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Redirect;
use Session;
use Hash;
use Auth
;
//use Validator;
//use Illuminate\Support\Facades\Input;

class BookInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *


     */
    public function index()
    {
         $book_list = book_information::select(['id','title','author','description','price','book_cover'])->get();
      return view('admin.dashboard', ['book_list' => $book_list]); 
    }

    public function home()
    {
         $book_list = book_information::select(['id','title','author','description','price','book_cover'])->get();
      return view('home', ['book_list' => $book_list]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
          // time().'.'.$request->file('book_cover')->getClientOriginalExtension();

          $book_cover_name = time().'.'.$request->file('book_cover')->getClientOriginalExtension();
  
           $request->file('book_cover')->move(public_path('images'), $book_cover_name);
    
        
           $save =  new book_information ([  
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'description'=> $request->input('description'),
         'price'  => $request->input('price'),
         'book_cover'=> $book_cover_name
               ]);
            $save->save();
                return Redirect::back()->withInput();
            }

            
            

    /**
     * Display the specified resource.
     *
     * @param  \App\book_information  $book_information
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id =  $request->input('o');
      $book_details = book_information::select(['id','title','author','description','price','book_cover'])
      ->where('id','=', $id )
      ->get();
       return view('admin.edit', ['book_details' => $book_details]); 

       
            //
    }
     public function show_client(Request $request)
    {
        $id =  $request->input('o');
      $book_details = book_information::select(['id','title','author','description','price','book_cover'])
      ->where('id','=', $id )
      ->get();
       return view('view_details', ['book_details' => $book_details]); 

       
            //
    }
     public function SearchBook(Request $request)
     {
              $title =  $request->input('o');
      $book_details = book_information::select(['id','title','author','description','price','book_cover'])
      ->where('title','like', '%'.$title.'%' )
      ->get();
       return view('search_result', ['book_list' => $book_details]); 
  
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book_information  $book_information
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
         if(empty($request->file('book_cover')))
         {
            $book_cover_name = $request->input('book_cover_old'); 
         }
         else
         {
          $book_cover_name = time().'.'.$request->file('book_cover')->getClientOriginalExtension();
  
           $request->file('book_cover')->move(public_path('images'), $book_cover_name);
       }

  $update_book = book_information::where('id',$request->input('id'))
            ->update([  
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'description'=> $request->input('description'),
         'price'  => $request->input('price'),
         'book_cover'=> $book_cover_name
               ]);

                return Redirect::to('dashboard')
                ->with('success','Data has been Updated');
            }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book_information  $book_information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book_information $book_information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book_information  $book_information
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $delete_book = book_information::where('id',$request->input('o'))
            ->delete();
                Session::flash ( 'message', "Book has been deleted");
                return Redirect::to('dashboard');
                
            }

     public function login(Request $request) {
       
            if (Auth::attempt ( array (
                    
            'username' => $request->input( 'username' ),
            'password' => $request->input ('password' ) 
            ) )) 
            {
                session([ 'name' => $request->input( 'username' )]);
                Session::flash ( 'message', "Login Succesfully");

                return  Redirect::to('dashboard');
            } else {
                Session::flash ( 'message', "Invalid Credentials , Please try again." );
                return Redirect::back ();
            }
        }
        public function logout()
        {
        Session::flush ();
        Auth::logout ();
        return Redirect::to('/');
    }
        


        /*public function generate_password()
        {
            $password = Hash::make ('manish');
            echo $password;

        }
    */
    
}

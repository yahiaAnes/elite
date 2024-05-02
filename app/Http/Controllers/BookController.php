<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\loanBook;
use App\Models\Book;
use App\Models\review;

class BookController extends Controller
{
    
    public function upload_loanBook(REQUEST $request){
        $request->validate([
            'number'=>['required','string'],
            'title' => ['required', 'string', 'max:255'],
            'author'=>['required','string'],
            'pages'=>['required','string'],
            'category'=>['required','string'],
            'lend_date'=>['required','string'],
            'redemption_date'=>['required','string'],
            'price'=>['required','string'],
            'book_status'=>['required','string'],
            'student_name'=>['required','string'],
            'phone_number'=>['required','string'],
            'card_number'=>['required','string'],
            'observation'=>['required','string'],
        ]);

        $userId = Auth::user()->id;

        loanBook::create([
            'number'=> $request->input('number'),
            'title'=> $request->input('title'),
            'author'=> $request->input('author'),
            'pages'=> $request->input('pages'),
            'category'=> $request->input('category'),
            'lend_date'=> $request->input('lend_date'),
            'redemption_date'=> $request->input('redemption_date'),
            'price'=> $request->input('price'),
            'book_status'=> $request->input('book_status'),
            'student_name'=> $request->input('student_name'),
            'phone_number'=> $request->input('phone_number'),
            'card_number'=> $request->input('card_number'),
            'status'=> 'loaned',
            'observation'=> $request->input('observation'),
            'userId'=>$userId,
        ]);

        $number= $request->number;
        if($book = Book::where('number',$number)->first()){
            
            $book->status = 'non available';
            $book->save();
        }
        return redirect()->back()
        ->with('message','upload successfully');
    }

//____________________________U P L O A D   B O O K _______________________________________________


    public function upload_Book(REQUEST $request){
        $request->validate([
            'number'=>['required','string'],
            'title' => ['required', 'string', 'max:255'],
            'author'=>['required','string'],
            'pages'=>['required','string'],
            'category'=>['required','string'],            
            'book_status'=>['required','string'],            
            'observation'=>['required','string'],
        ]);

        $userId = Auth::user()->id;
        Book::create([
            'number'=> $request->input('number'),
            'title'=> $request->input('title'),
            'author'=> $request->input('author'),
            'pages'=> $request->input('pages'),
            'category'=> $request->input('category'),
            'book_status'=> $request->input('book_status'),
            'observation'=> $request->input('observation'),
            'status'=> 'available',
            'userId'=>$userId,
        ]);

        return redirect()->back()
        ->with('message','upload successfully');
    }

    public function loan_books(){

        $books = loanBook::with('user')->get();
        /*foreach($books as $book){
            $userId = $book->userId;

            $u = User::where('id',$userId)->first();
            $a = $u->name;
        }*/
        return view('admin.loan_books',compact('books'));
    }
    public function books(){

        $books = Book::with('user')->get();
        //$number = $books->number;
        //$loanBook= loanBook::where('number',$number)->get();
        
        return view('admin.books',compact('books'));
    }


    //______________________________U P D A T E   LOAN_________________________________________

    public function update_loanBook($id){
        $loanBook = loanBook::find($id);
        return view('admin.update_loanBook',compact('loanBook'));
    }

    public function edit_loanBook(REQUEST $request,$id){
        $request->validate([
            'number'=>['required','string'],
            'title' => ['required', 'string', 'max:255'],
            'author'=>['required','string'],
            'pages'=>['required','string'],
            'category'=>['required','string'],
            'lend_date'=>['required','string'],
            'redemption_date'=>['required','string'],
            'price'=>['required','string'],
            'book_status'=>['required','string'],
            'student_name'=>['required','string'],
            'phone_number'=>['required','string'],
            'card_number'=>['required','string'],
            'observation'=>['required','string'],
        ]);

        $userId = Auth::user()->id;
        loanBook::find($id)
        ->update([
            'number'=> $request->input('number'),
            'title'=> $request->input('title'),
            'author'=> $request->input('author'),
            'pages'=> $request->input('pages'),
            'category'=> $request->input('category'),
            'lend_date'=> $request->input('lend_date'),
            'redemption_date'=> $request->input('redemption_date'),
            'price'=> $request->input('price'),
            'book_status'=> $request->input('book_status'),
            'student_name'=> $request->input('student_name'),
            'phone_number'=> $request->input('phone_number'),
            'card_number'=> $request->input('card_number'),
            'status'=> 'loaned',
            'observation'=> $request->input('observation'),
            'userId'=>$userId,
        ]);

        return redirect()->back()
        ->with('message','upload successfully');
    }

    public function retrieved(REQUEST $request,$id){
        $loanBook = loanBook::findOrFail($id);
        $number = $loanBook->number;
        if($book = Book::where('number',$number)->first()){
            $book->status ='available';
            $book->save();


        }
        
        
        $loanBook->status = 'retrieved';

        $loanBook->save();
        return redirect()->back();
    }

    public function loaned(REQUEST $request,$id){
        $loanBook = loanBook::findOrFail($id);
        $number = $loanBook->number;

        if($book = Book::where('number',$number)->first()){
            $book->status ='non available';
            $book->save();


        }
        $loanBook->status = 'loaned';
        $loanBook->save();
        return redirect()->back();
    }


    //______________________________U P D A T E   BOOK_____________________________

    public function update_Book($id){
        $book = Book::find($id);
        return view('admin.update_Book',compact('book'));
    }

    public function edit_Book(REQUEST $request,$id){
        $request->validate([
            'number'=>['required','string'],
            'title' => ['required', 'string', 'max:255'],
            'author'=>['required','string'],
            'pages'=>['required','string'],
            'category'=>['required','string'],
            'book_status'=>['required','string'],
            'observation'=>['required','string'],
        ]);

        $userId = Auth::user()->id;
        Book::find($id)
        ->update([
            'number'=> $request->input('number'),
            'title'=> $request->input('title'),
            'author'=> $request->input('author'),
            'pages'=> $request->input('pages'),
            'category'=> $request->input('category'),
            'book_status'=> $request->input('book_status'),
            'observation'=> $request->input('observation'),
            'userId'=>$userId,
        ]);

        return redirect()->back()
        ->with('message','upload successfully');
    }


    //____________________________- D E L E T E_________________________________

    public function delete_loanBook($id){
        $loanBook = loanBook::find($id);
        $loanBook->delete();
        return redirect()->back();
    }

    public function delete_Book($id){
        $book = Book::find($id);
        $book_id = $book->id;
        
        $review = review::where('bookId',$id);
        $review->delete();
        $book->delete();

        return redirect()->back();
    }



    //_____________________________S E A R C H_________________________________________________


    public function searchBook(Request $request)
    {
        if ($request->ajax()) {

            $output = "";
            $query = $request->get('query');
            $data = Book::where('id', 'LIKE', "%{$query}%")
                                ->orWhere('number', 'LIKE', "%{$query}%") 
                                ->orWhere('title', 'LIKE', "%{$query}%") 
                                ->orWhere('author', 'LIKE', "%{$query}%") 
                                ->orWhere('pages', 'LIKE', "%{$query}%") 
                                ->orWhere('category', 'LIKE', "%{$query}%") 
                                ->orWhere('book_status', 'LIKE', "%{$query}%") 
                                ->orWhere('observation', 'LIKE', "%{$query}%") 
                                ->orWhere('status', 'LIKE', "%{$query}%")  
                                ->get();

            foreach($data as $book){
                $output .=
                '<tr>
                <td class="text-center">'.$book->id.'</td>
                <td class="text-center">'.$book->title.'</td>
                <td class="text-center">'.$book->author.'</td>
                <td class="text-center">'.$book->pages.'</td>
                <td class="text-center">'.$book->book_status.'</td>
                <td class="text-center">'.$book->observation.'</td>
                <td class="text-center">'.$book->status.'</td>


                ';
                // Checking if the book status is available or not
                if ($book->status === 'available') {
                    $output .= '<td class="text-center text-success">' . $book->status . '</td>';
                } else {
                    $output .= '<td class="text-center text-danger">' . $book->status . '</td>';
                }

                // Adding review related data
                $output .= '<td class="text-center">';

                if ($book->review->count() > 0) {
                    $output .= number_format($book->review->avg('rating'), 1) . '
                                <div class="avgStars">';

                    for ($i = 1; $i <= ceil($book->review->count()); $i++) {
                        $output .= '<i class="fa fa-star i_star"></i>';
                    }

                    $output .= '</div>';
                } else {
                    $output .= 'No reviews yet';
                }

                $output .= '</td>';

                // Adding rate button or login link
                $output .= '<td class="text-center">';
                
                if (Auth::check()) {
                    $userReview = $book->review->where('userId', Auth::user()->id)->first();

                    if ($userReview) {
                        $output .= '<p></p>';
                    } else {
                        $output .= '<button class="btn btn-primary edit-button" data-title="' . $book->id . '">Rate</button>';
                       
                        
                    }
                } else {
                    $output .= '<a href="' . route('login') . '" class="btn btn-primary">Rate</a>';
                }

                $output .= '</td>';

                $output .= '</tr>';

            }
            $output .= '<script>
                // Function to open SweetAlert2 form
                function openForm(bookTitle) {
                    Swal.fire({
                        title: `Make your review`,
                        html:
                            `<form method="POST" action="' . url("rating") . '/${encodeURIComponent(bookTitle)}" id="ratingForm">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <div class="rating-wrapper">
                                    <!-- star 5 -->
                                    <input type="radio" id="5-star-rating" name="rating" value="5">
                                    <label for="5-star-rating" class="star-rating">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>
                                    
                                    <!-- star 4 -->
                                    <input type="radio" id="4-star-rating" name="rating" value="4">
                                    <label for="4-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>
                                    
                                    <!-- star 3 -->
                                    <input type="radio" id="3-star-rating" name="rating" value="3">
                                    <label for="3-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>
                                    
                                    <!-- star 2 -->
                                    <input type="radio" id="2-star-rating" name="rating" value="2">
                                    <label for="2-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>
                                    
                                    <!-- star 1 -->
                                    <input type="radio" id="1-star-rating" name="rating" value="1">
                                    <label for="1-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>
                                </div>
                                
                                <button class="btn btn-success my-3" type="submit">Submit</button>
                            </form>`,
                        showConfirmButton: false
                    });
                }

                // Check if buttons variable is already declared
                if (typeof buttons === "undefined") {
                    // Attach click event to each button in the table
                    const buttons = document.querySelectorAll(".edit-button");
                    buttons.forEach(button => {
                        button.addEventListener("click", function () {
                            const bookTitle = this.dataset.title;
                            openForm(bookTitle);
                        });
                    });
                }
            </script>';
            return response()->json($output);
        }
    }

    public function filterByCategory(Request $request)
    {
        $query = $request->get('query'); 
        if($query === 'all'){
            $books = Book::all();
            return response()->json($books);

        }
        else{
            $books = Book::where('category', $query)->get();
            return response()->json($books);

        }
    }



    //_______________________________--REVIEWS--___________________________________________________


    public function rating(Request $request,$id){

        $request->validate([
            'rating'=>'required',
        ]);
        $user_id=Auth::user()->id;

        $book = Book::where('id',$id)->first();
        $book_id= $book->id;

        $review = new review;

        $review->rating= strip_tags($request->input('rating'));
        $review->userId= $user_id;
        $review->bookId= $book_id;

        $review->save();

        return redirect()->back();
    }

















}


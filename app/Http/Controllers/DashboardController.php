<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use Response;
use Log;
use DB;
use App\Models\Authorbook;

class DashboardController extends Controller
{

    public function loadDashboard()
    {
        //$book_list =  Author::leftJoin('book','book.author_id','=','author.author_id')               
                        //        ->orderBy('author.author_id', 'ASC')
                                //->groupBy('author.author_id')
                          //      ->get(['book.book_name','author.author_name']);
        $procedure = "getAuthorDetails()";
        $book_list = self::callMasterProcedure($procedure);
        return view('list', compact('book_list'));
    }


    public function storeXMLReadData()//cronjon xml API
    {

        $folder_directory=public_path('start');//folder path
        $api_array_data=[];
        foreach(glob($folder_directory.'\*.*') as $file) //loop directory
        {
            $xmlString = file_get_contents($file);
            $xmlObject = simplexml_load_string($xmlString);//read xml data
            $json = json_encode($xmlObject);
            $api_array_data = json_decode($json, true);

          
            
            $flag_insert=1;
            if(isset($api_array_data['book']))
            {
                foreach($api_array_data['book'] as $key=>$loop_value)
                {
                    
                        $author_name=$loop_value['author'];
                        $book_name = $loop_value['name'];

                        $author_check_exists = Author::where('author_name', '=', $author_name)->first();
                        $book_check_exists = Book::where('book_name', '=', $book_name)->first();
                       


                        if($author_check_exists !=NULL && $book_check_exists !=NULL) 
                        {
                            //update author-book table
                            //update isnot neccesarry but becz given in document so we are updating
                            $author_id = $book_check_exists->author_id;
                            if(is_array($book_name))
                            {
                               $book_name=NULL;
                            }

                            Book::where('author_id',$author_id)->update(['book_name'=>$book_name]);
                            $flag_insert=3;

                        }else
                        {
                            //insert to author table

                            $row = new Author;
                            $row->author_name = $author_name;
                            $row->save();

                            //insert to Book table
                            if(is_array($book_name))
                            {
                               $book_name=NULL;
                            }
                            $row1 = new Book;
                            $row1->book_name = $book_name;
                            $row1->author_id=$row->id;
                            $row1->save();
                            $flag_insert=2;

                        }
                    }
                    //die();
                }
            }

            //flasg=2 insert
            if($flag_insert==2)
            {
                //inert message
                Log::notice(array('status'=>200,'success' => 'Data Inserted Successfully'));
                return Response::json(array('status'=>200,'success' => 'Data Inserted Successfully'), 200);
            }else if($flag_insert==3)//flasg=2 update
            {
                //Update message
                Log::notice(array('status'=>200,'success' => 'Data Updated Successfully'));
                return Response::json(array('status'=>200,'success' => 'Data Updated Successfully'), 200);
            }else
            {
                //error message
                Log::error(array('status'=>303,'success' => 'Something Went Wrong'));
                return Response::json(array('status'=>303,'success' => 'Something Went Wrong'), 303);
            }
    }

    public function show(Request $request)
    {
        //search databased on author name
        $author_name=$request->input('author_name');//author name
        if(!empty($author_name))
        {
            $enable_table=2;
            $author_name =$request->input('author_name');
            $procedure = "getAuthorDetailsByName('".$author_name."')";
            $book_list = self::callMasterProcedure($procedure);
        }else
        {
            $enable_table=1;
            $procedure = "getAuthorDetails()";
            $book_list = self::callMasterProcedure($procedure);
        }
        return view('searchUser', array('book_list'=>$book_list,'enable_table'=>$enable_table,'author_name'=>$author_name));
    }


    
    static function callMasterProcedure($procedure)
    {
    	try
    	{
        	return DB::select('call '.$procedure);
    	}
    	catch (Exception $e) {
		     Log::error('Something went wrong while calling procedure '.$e->getMessage());
		}
    }// end of callMasterProcedure


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

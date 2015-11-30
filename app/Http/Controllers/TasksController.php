<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Task;
use App\User;
use Auth;
use DB;

class TasksController extends Controller
{

    //auth test//
    public function __construct(){
        $this->middleware('auth');    
    }
    //end auth test//


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('tasks.index')->withTasks($tasks);
       //eturn $tasks->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

       // return $request->all();
        $input = $request->all();

        $user = Auth::user();
        
        $user->tasks()->create($input);
        //dd($input["title"]);
        //Task::create($input);   

        Session::flash('flash_message', 'Task Added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = Task::findOrFail($id);
        return view('tasks.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit')->withTask($task);

       // return $task;
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
         $task = Task::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $task->fill($input)->save();

        Session::flash('flash_message', 'Task successfully added!');

        return redirect()->back();
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
        $task = Task::findOrFail($id);

        $task->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('tasks.index');    
    }

    public function search(Request $request){
      return view('tasks.search');
      // echo "asdasd";

     // $input = $request->all(); //doesn't work
     // Task::create($input);
     // dd($input); //doesn't work
    }
    public function showSearch(Request $request){
        $this->validate($request, [
            'search' => 'required',
        ]);


      $input = $request->all();
      //dd($input);
      $term = $input["search"];
      $tasks = Task::search("select city from tasks where city = %{$term}%")
      ->with('user')
      ->get();
    //    dd($tasks);
    return view('tasks.results')->with(['tasks' => $tasks]);
    }

    public function userprofile(Request $request){
        $userID = Auth::user()->id;
        //$userPosts = DB::select('select title from tasks inner join users on users.id = tasks.user_id ORDER BY tasks.created_at');
        $userPosts = DB::select('select title from tasks where tasks.user_id=:ta', ['ta'=>$userID]);         
        //dd($userPosts);
        return view('tasks.userprofile')->with(['posts' => $userPosts]);
       //return "asi";
    }



    //function for recommendation
    public function upvoted($postID, Request $request){
       $upvote=DB::select('select upvote from tasks where id= :up', ['up'=>urldecode($postID)]);
       $val=1;
       foreach ($upvote as $key ) {
           $val=$val+$key->upvote;
       }

       $afterVote = DB::update('update tasks set upvote = :vote where id = :up', ['vote'=>$val,'up'=>urldecode($postID)]);

        return redirect()->back();  
    }

    //function for dislikes
    public function downvoted($postID, Request $request){
       $downvote=DB::select('select downvote from tasks where id= :down', ['down'=>urldecode($postID)]);
       $val=1;
       foreach ($downvote as $key ) {
           $val=$val+$key->downvote;
       }

       $afterVote = DB::update('update tasks set downvote = :vote where id = :down', ['vote'=>$val,'down'=>urldecode($postID)]);

        return redirect()->back();  
    }



} //end of class

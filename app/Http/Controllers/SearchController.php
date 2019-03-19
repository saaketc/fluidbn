<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;
use App\Article;
use App\User;
use App\Genre;
use App\Theory;
use App\Studio\StudioStories;
use Auth;



class SearchController extends Controller
{
    public function search(Request $request){
        
         $search = $request->input('search');  
        
        if($search==""){
            return redirect()->back();
        }
        
        $user = Auth::user();
       /*
        $search_result = New Search;
        $search_result->search_keyword = $search;  
        $search_result->save();
        $searched_term = Search::find($search_result->id);
     
        $user->searches()->attach($searched_term);   
        */
        
       $search_article = Article::where('title','like','%'.$search.'%')->where('finished',1)->orWhere('content','like','%'.$search.'%')->where('finished',1)->get();

 if($search_article!=NULL){
           $sa = $search_article;
       }


       $search_user = User::where('fname','like','%'.$search.'%')->orWhere('lname','like','%'.$search.'%')->get();
       
       if($search_user!=NULL){
           $su = $search_user;
       }

       $search_genre = Genre::where('name','like','%'.$search.'%')->get();
        if($search_genre!=NULL){
           $sg = $search_genre;
       }

       $search_fluidbn_story = StudioStories::where('title','like','%'.$search.'%')->orWhere('content','like','%'.$search.'%')->get();
            
             if($search_fluidbn_story!=NULL){
           $sf = $search_fluidbn_story;
       }

                     
       $data = [
           'search_article'=> $sa,
           'search_user' =>$su,
           'search'=>$search,
           'search_genre'=> $sg,
           'search_fluidbn_story'=>$sf
       ];
     
          return view('search')->with($data);
        
   
      
       // dd($search_article);
       
     }

   
public function searchSuggestion(Request $request){
             $query = $request['query'];       

           $nores='';
           $output1 = '<tr><th></th></tr>';
         //  $output2 = '<tr><th style="font-weight:bold;font-size:22px;color:black;">Users</th></tr>';
         //  $output3 = '<tr><th style="font-weight:bold;font-size:22px;color:black;">fluidbN studio stories</th></tr>';
         if($query!=""){
            
            $articles = Article::where('title','like','%'.$query.'%')->where('finished',1)->orWhere('content','like','%'.$query.'%')->where('finished',1)->get();
            $studiostories = StudioStories::where('title','like','%'.$query.'%')->orWhere('content','like','%'.$query.'%')->get();
            $theories = Theory::where('title','like','%'.$query.'%')->orWhere('content','like','%'.$query.'%')->get();
            $users =  User::where('fname','like','%'.$query.'%')->orWhere('lname','like','%'.$query.'%')->get();
            $search_genre = Genre::where('name','like','%'.$query.'%')->get();
            if($articles || $users || $studiostories || $theories || $search_genre)
 
            {
                // for studio stories search results
             foreach ($studiostories as $key => $a) {
             $url5 = route('studio-story',['StudioStories'=>$a,'slug'=>str_slug($a->title)]);
             //$url7 = '/storage/studio_images/'.$a->title_image;        
            $output1.="<tr>".
             
             '<td>'.'<a href="'.$url5.'">'.ucfirst($a->title).'</a>'.'</td>'.
            "</tr>";
             
            }
             
             
             // for stories
            foreach ($articles as $key => $a) {
             $url1 = route('show-article',['article'=>$a,'slug'=>str_slug($a->title)]);
            // $url3 = '/storage/article_images/'.$a->title_image;        
            $output1.="<tr>".
             
             '<td>'.'<a href="'.$url1.'">'.ucfirst($a->title).'</a>'.'</td>'.
            "</tr>";
                }
                // for theories
                foreach ($theories as $key => $a) {
                    $urlT = route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)]); 
                      
                    $output1.="<tr>".

                        '<td>'.'<a href="'.$urlT.'">'. ucfirst($a->title).'</a>'.'</td>'.
              "</tr>"; 
                  
            }
           
            foreach ($users as $key => $u) {
                $url2 = route('profile',['user'=>$u,'slug'=>str_slug($u->fname." ".$u->lname)]);    
             //  $url4 = '/storage/profile_images/'.$u->hasProfile->profile_image; 
               
             /*   if($u->hasProfile->designation!=NULL && $u->hasProfile->company!=NULL )
                $dc = ucfirst($u->hasProfile->designation).' @ '.ucfirst($u->hasProfile->company);
                else
                $dc = '';*/
                
               $output1.="<tr>".
                
                '<td>'.'<a href="'.$url2.'">'.ucfirst($u->fname).' '.ucfirst($u->lname). '<br/></a>'.'</td>'.
               "</tr>";
                
               }
               // for genere stories

               foreach ($search_genre as  $s) {
            
                foreach ($s->hasArticles as  $a) {
                    $url1 = route('show-article',['article'=>$a,'slug'=>str_slug($a->title)]);
            // $url3 = '/storage/article_images/'.$a->title_image;        
            $output1.="<tr>".
             
             '<td>'.'<a href="'.$url1.'">'.ucfirst($a->title).'</a>'.'</td>'.
            "</tr>";
                  
            }
        }
             
            return response()->json(['output1'=>$output1]);
             
                   
                 
         }

     else 
             
     return response()->json(['nores'=>$nores]);
             
  }
}
}


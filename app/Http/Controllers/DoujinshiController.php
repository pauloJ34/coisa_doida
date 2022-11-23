<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doujinshi;

class DoujinshiController extends Controller
{
    //
    public function register(Request $request)
    {
        $validate = $request->validate([
            'name_doujinshi' => 'required',
            'outher_name' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'sinopse' => 'required'
        ]);

        
        /*if($request->arquive){
            foreach($request->arquive as $arquives){
                // dd(array_search($arquives,$request->arquive));  
                if($request->hasFile('arquive.'.array_search($arquives,$request->arquive)) && $request->file('arquive.'.array_search($arquives,$request->arquive))->isValid() && $request->has('arquive.'.array_search($arquives, $request->arquive)))
                {
                    $name= uniqid(date('H-i-s-Y-m-d'));
                    $nameFile = "{$name}.{$arquives->extension()}";
                    $upload= $arquives->storeAs("public/mangas".str_replace(" ","-",$request->name_dojinshi),$nameFile);
        
                    $d=$upload;    
                    if(!$upload)
                    {
                        return back()->with('error', 'Falha ao guardar o arquivo');
                                    // ->withInput();
                    }
                    
                }
            }
        }*/
        // dd($request);
        if($request->id)//edit
        {
            $doujinshi = Doujinshi::find($request->id);
            $doujinshi->name_doujinshi = $request->name_doujinshi;
            $doujinshi->outher_name = $request->outher_name;
            $doujinshi->author = $request->author;
            $doujinshi->publish_date = $request ->publish_date;
            $doujinshi->sinopse =$request->sinopse;
            $doujinshi->code = isset($request->code)? $request->code:NULL;
            $doujinshi->save();
            if($doujinshi)
            {
                return back()->with('success','Salvo com sucesso');
            }
            else
            {
                return back()->with('error','Erro ao armazenar os dados');
            }
        }else{//register
            $doujinshi = Doujinshi::create([
                "name_doujinshi" => $request->name_doujinshi,
                "outher_name" => $request->outher_name,
                "author" => $request->author,
                "publish_date" => $request ->publish_date,
                "views" => 0,
                "sinopse" =>$request->sinopse,
                "path_file" => str_replace(" ","-",$request->name_doujinshi),
                "chapter" => 0,
                "code" => isset($request->code)? $request->code:NULL
            ]);
        }
        if($doujinshi)
        {
            return back()->with('success','Salvo com sucesso');
        }
        else
        {
            return back()->with('error','Erro ao armazenar os dados');
        }
       

    }
    public function updateFile(Request $request)
    {
        if($request->id){
            return view('updateFile')->with('doujinshi',Doujinshi::find($request->id));
        }
        return back()->with('error','identificador não encontrado');

    }
    public function updateFileP(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'arquives'=>'required',
            'num'=> 'required'
        ]);

        if($request->file('arquives') && $request->id){
            // dd($request->file('arquives'));
            // dd($upload);
            if($request->file('arquives')){
                foreach($request->file('arquives') as $arquives){
                    // dd(array_search($arquives,$request->arquive));  
                    if($request->hasFile('arquives.'.array_search($arquives,$request->file('arquives'))) && $request->file('arquives.'.array_search($arquives,$request->file('arquives')))->isValid() && $request->has('arquives.'.array_search($arquives, $request->file('arquives'))))
                    {
                        // $name= uniqid(date('H-i-s-Y-m-d'));
                        $nameFile = "img-".array_search($arquives,$request->file('arquives')).".{$arquives->extension()}";
                        $upload= $arquives->storeAs("public/".(Doujinshi::find($request->id)->path_file)."/cap-".(Doujinshi::find($request->id)->chapter+1),$nameFile);
                        
                        $doujinshi = Doujinshi::find($request->id);
                        $doujinshi->chapter = $doujinshi->chapter+1;
                        $doujinshi->save();
                        // dd($upload);
                        // $d=$upload;    
                        if(!$upload)
                        {
                            return back()->with('error', 'Falha ao guardar o arquivo');
                                        // ->withInput();
                        }else{
                            return back()->with("success", "Salvo com sucesso")
                                         ->with('doujinshi',Doujinshi::find($request->id));
                        }
                        
                    }
                }
                
            }
        } 
        return back()->with('error','identificador não encontrado');
    }
    public function remove(Request $request)
    {
        if($request->type == "remove")
        {
            $doujinshi=Doujinshi::find(intval($request->id));
            $doujinshi->delete();
            return back()->with("success", "Removido com sucesso");
        }
        return back();
    }
    public function view_doujinshi($name){
        $doujinshi = Doujinshi::where("path_file",$name)->get();

        return view("view_project")->with("doujinshi",Doujinshi::find($doujinshi[0]->id));

    }
    public function search(Request $request){
        if($request->name_doujinshi && $request->publish_date){
            $doujinshi = Doujinshi::where("path_file",str_replace(" ","-",$request->name_doujinshi))
                                    ->where("publish_date",$request->publish_date)
                                    ->get();
            // dd(count($doujinshi));
            return view('search')->with("dou",count($doujinshi)==1 ? Doujinshi::find($doujinshi[0]->id):NULL);
        }
        else if($request->name_doujinshi){
            $doujinshi = Doujinshi::where("path_file",str_replace(" ","-",$request->name_doujinshi))
                        ->get();
            // dd(count($doujinshi));
            return view('search')->with("dou",count($doujinshi)==1 ? Doujinshi::find($doujinshi[0]->id):NULL);
        }
        else{
            return view('search');
        }
    }
}

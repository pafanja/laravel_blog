<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $category = Category::all();
        return view('edit.posts.create',compact('category'));
    }
    public function store(Request $request)
    {
        if($request->hasFile('file')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date=date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
            if(!file_exists($root.$date))    {mkdir($root.$date);} // если папка с датой не существует, то создаем ее
            $f_name=$request->file('file')->getClientOriginalName();//определяем имя файла
            $request->file('file')->move($root.$date,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['file']="/images/".$date."/".$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
            Post::create($all); //сохраняем массив в базу
        }
        else
        {
            Post::create($request->all()); // если картинка не передана, то сохраняем запрос, как есть.
        }
        return back()->with('message','Статья добавлена');
    }
    public function index()
    {
        $posts = Post::all();
        return view('edit.posts.posts', compact('posts'));
    }
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        $root=$_SERVER['DOCUMENT_ROOT'];
        if(!empty($post->file))
        {
            unlink($root.$post->file); //удаляем превьюшку
        }
        return back()->with('message','Статья удалена');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('edit.posts.edit', compact('post','categories'));
    }
    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        if($request->hasFile('file')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date=date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
            if(!file_exists($root.$date))    {mkdir($root.$date);} // если папка с датой не существует, то создаем ее
            $f_name=$request->file('file')->getClientOriginalName();//определяем имя файла
            $request->file('file')->move($root.$date,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['file']="/images/".$date."/".$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
            $post->update($all);
        }
        else
        {
            $post->update($request->all());
        }
        return back()->with('message', 'Статья изменена');
    }
}

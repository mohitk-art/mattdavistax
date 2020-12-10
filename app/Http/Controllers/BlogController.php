<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('blogs.index',compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate(
			$request,
			[
				'title' => 'required',
				'description' => 'required',
			],
			[
				'title.required'    => 'The Title field is required.',
				'description.required' => 'The Description field is required',
			]
		);

		$blog= new Blog();
		$blog->title     = $request->title;
        $blog->description  = $request->description;

        if(isset($request->file)){
            $imagename=explode('.',$request->file->getClientOriginalName());
            $file =$imagename[0].time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images'), $file);
            $blog->image = $file;
        }

        // $blog->categoryID = $request->categoryid;
		$blog->save();

        return redirect()->route('blogs.index')
                        ->with('success','blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $id=$blog->id;
        $this->validate(
			$request,
			[
				'title' => 'required',
				'description' => 'required',
			],
			[
				'title.required'    => 'The Title field is required.',
				'description.required' => 'The Description field is required',
			]
		);


        if(isset($request->file)){
            $imagename=explode('.',$request->file->getClientOriginalName());
            $file =$imagename[0].time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images'), $file);
            $image_url = $file;
        }else{
            $blog_data=Blog::where('id',$id)->first();
            if($blog_data->image == null){
                $image_url=null;
            }else{
                $image_url=$blog_data->image;
            }
        }


        $update = [
            'title' => $request->title,
            'description'=> $request->description,
            'image'     =>$image_url,
        ];
        Blog::where('id',$id)->update($update);

        return redirect()->route('blogs.index')
                        ->with('success','blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')
                        ->with('success','blog deleted successfully');
    }

    public function bloglists(Request $request)
    {
        if($request->post()){
            $blogs = Blog::where('title', 'LIKE', '%'.$request->search.'%')->get();
        }else{
            $blogs = Blog::get();
        }

        return view('blogs.blog_lists',compact('blogs'));
    }

    public function blogDetails(Request $request, $id)
    {
        $blog_details = Blog::where('id',$id)->first();
        $blogs = Blog::whereNotIn('id',[$id])->paginate(5);
        return view('blogs.blog_details',compact('blog_details','blogs'));
    }



}

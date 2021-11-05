@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        
            <div class="card">
                @if (!empty($mssg))
                <div class="alert alert-success">
                    {{$mssg}}
                </div>   
                @endif
                
               <div class="card-header">
                   All Categories
               </div>
               <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row ml-1" style="margin-bottom: 10px" >
                                <h6 class="card-text">Category Relations</h6>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                            <div class="col-md-8">
                                <form id="AddCatForm" action="{{ route('tip-categories.store') }}" method="POST">
                                    <input type="text" id="category_name" name="category_name" required style="width:100%;padding: 0.375rem 0.75rem;"/>
                                    @csrf
                                </form>
                            </div>
                            <div class="col-md-4" style="">
                                <button class="btn btn-primary" onclick="
                                
                                event.preventDefault();
                                document.getElementById('AddCatForm').submit();
                                ">Add Category</button>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Tips in Category</th>
                                        <th colspan="2"><a id="cancelUpdate" href="{{ route('tip-categories.index') }}" class="btn btn-primary"style="display:none" >Cancel</a></td></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $cat)
                                    <tr>
                                        
                                        <td>
                                            <div id="category_name_{{$cat->id}}">{{ $cat->category_name}}</div>
                                            <div id="category_name_{{$cat->id}}_form_div" style="display:none;">
                                                <form id="EditCatForm_{{$cat->id}}" action="{{ route('tip-categories.update',$cat->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="cat_id" value="{{$cat->id}}">
                                                    <input style="width:100%;padding: 0.375rem 0.75rem;" type="text" id="cat_name" name="category_name" value="{{$cat->category_name}}">
                                                    @method('PUT')
                                                </form>
                                            </div>
                                            
                                        </td>
                                        <td>{{$cat->tips->count()}}</td>
                                        <td >

                                            <a id="editTextId_{{$cat->id}}" href="#" onclick="
                                            event.preventDefault();
                                            document.getElementById('category_name_{{$cat->id}}_form_div').style.display='block';
                                            document.getElementById('cancelUpdate').style.display='block';
                                            document.getElementById('category_name_{{$cat->id}}_form_button').style.display='block';
                                            document.getElementById('category_name_{{$cat->id}}').style.display='none';
                                            document.getElementById('editTextId_{{$cat->id}}').style.display='none';
                                            ">
                                            Edit
                                            </a>
                                            <button id="category_name_{{$cat->id}}_form_button" class="btn btn-primary"style="display:none" onclick="
                                                event.preventDefault();
                                                document.getElementById('EditCatForm_{{$cat->id}}').submit();
                                            "> Update</button>

                                        </td>
                                        <td>
                                            <a href="{{ route('tip-categories.index') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('delete-form-{{$cat->id}}').submit();">Del</a>   
    
                                            <form id="delete-form-{{$cat->id}}" 
                                                    action="{{ route('tip-categories.destroy',$cat->id) }}" 
                                                    method="POST"
                                                    >
                                                
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            
                        </div>
                        
                    </div>

                   
               </div>
            </div>
    </div>
</div>
@endsection
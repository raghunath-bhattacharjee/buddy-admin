@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SUper User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    {{-- Add category --}}
                    <form action="{{ url('add_new_category')}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <label for="category">Create new category</label>
                                <input type="text" name="category" class="form-control">
                            </div>

                            <div class="col-6">
                                <label for="category">Attact to category</label>
                                <select name="category_link_id" class="form-control">
                                    <option value="-1">---</option>
                                    @foreach ($categoryAll as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px">
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

                    <hr>
                    <h3> Category List </h3>
                    <div class="row" style="margin-top:20px">
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    {{$category->category_name}}

                                    @if (count($category->child) > 0)
                                        <ul>
                                            @foreach ($category->child as $child)
                                                <li> {{$child->category_name}} </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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

@extends('layouts.app')
@section('content')
    <main class="container">
        <section>
            <form method="post" action="{{route('category.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="titlebar">
                    <h1>Edit Category</h1>
                    <button>Save</button>
                </div>
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{$error}} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{$category->name}}">
                    </div>
                <div>
                </div>
                </div>
                <div class="titlebar">
                    <h1></h1>
                    <input type="hidden" name="hidden_id" value="{{$category->id}}">
                    <button>Save</button>
                </div>
         </form>
        </section>
    </main>
@endsection

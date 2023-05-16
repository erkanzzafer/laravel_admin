@extends('layouts.app')
@section('content')
    <main class="container">
        <section>
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="titlebar">
                    <h1>Add Category</h1>
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


                    <hr>
                    <label>Category</label>
                    <input type="text" class="input" name="name" >


                </div>
                </div>

         </form>
        </section>
    </main>

@endsection

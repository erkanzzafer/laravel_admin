@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Category</h1>
           <a href="{{route('category.create')}}"> <button>Add Category</button></a>
        </div>
         @if($message=Session::get('success'))
          <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: '{{$message}}'
              })

         </script>
         @endif

        <div class="table">
            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">All</p>
                        </li>
                    </ul>
                </div>
            </div>
        <form action="{{route('category.index')}}" method="GET" accept-charset="UTF-8" role="search">
            <div class="table-search">
                <div>
                    <button class="search-select">
                       Search Category
                    </button>
                    <span class="search-select-arrow">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" placeholder="Search category..." name="search" value="{{ request('search') }}">
                </div>
            </div>
        </form>
            <div class="table-product-head">

                <p>Name</p>

                <p>Actions</p>
            </div>
            <div class="table-product-body" >
                @if (count($categories)>0)
                    @foreach ($categories as $category)

                    <p> {{$category->name}}</p>


                    <div style="display: flex">
                        <a href="{{route('category.edit',$category->id)}}">
                        <button class="btn btn-success" style="padding-top: 4px;paddin-bottom:4px">
                            <i class="fas fa-pencil-alt" ></i>
                        </button>
                        </a>
                        <form action="{{route('category.destroy',$category->id)}}" method="POST">
                          @method('delete')
                          @csrf
                             <button class="btn btn-danger" onclick="deleteConfirm(event)">
                              <i class="far fa-trash-alt"></i>
                            </button>
                        </form>


                    </div>

                    @endforeach
                @else
                    <p>Kategori Bulunamadı
                    </p>
                @endif


            </div>
            <div class="table-paginate">
            {{$categories->links('layouts.pagination')}}

            </div>
        </div>
    </section>
</main>
<script>
window.deleteConfirm=function(e){
    e.preventDefault();
    var form=e.target.form;
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            })



}

</script>
@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sarlavha</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrab/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="d-flex justify-content-center">
<div class="card w-50 mt-5 border-0 shadow-lg p-3 phone" style="min-height: 500px;">
    <h1 class="text-center mb-3">
        <a href="{{route('main')}}" class="text-decoration-none">TODOS</a>
    </h1>
    <form action="{{!isset($todo) ? route('store') : route('update' , $todo['id'])}}" method="post">
        @csrf
        <div class="row">
            <div class="col-10">
                @if(isset($todo) !== false)
                    <input value="{{$todo['content']}}" type="text" placeholder="Add your task.." name="task" class="form-control">
                @else
                <input type="text" placeholder="Add your task.." name="task" class="form-control">
                @endif
            </div>
            <div class="col-1 d-flex">
                <button class="btn btn-primary ms-auto" type="submit">
                    {{!isset($todo) ? 'Add' : 'Update'}}
                </button>
            </div>
        </div>
    </form>
    @foreach($todos as $todo)
        <div class="row mt-3 fs-4 p-2 border rounded">
            <div class="col-9">
                @if($todo['is_checked'])
                <del>{{$todo->content}}</del>
                @else
                {{$todo->content}}
                @endif
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col">
                        <a href="{{route('check' , $todo['id'])}}">
                            <i class="fa-solid fa-check {{($todo['is_checked']) ? 'text-danger' : 'text-success'}}"></i>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{route('edit' , $todo['id'])}}">
                            <i class="fa-solid fa-pen-to-square text-dark"></i>
                        </a>
                    </div>
                    <div class="col">
                        <form action="{{route('delete' , $todo['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-white" type="submit">
                                <i class="fa-solid fs-4 fa-trash text-danger"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>

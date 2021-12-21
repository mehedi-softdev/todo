<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ "Todo" }}</title>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    
    <style>
        #todo_list_area {
            visibility: hidden;
        }
        .list {
            max-height: 400px;
            overflow-y: auto;
            overflow-x: hidden;

        }
        .list ul li:hover {
            background: rgb(230, 240, 243);
            cursor: default;
        }
        .my-list-item span:nth-child(1) {
            max-width: 400px;
            overflow: hidden;
        }
        .link {
            cursor: pointer;
        }
    </style>
</head> 
<body class="container">
    <div class="row">
        <div class="col text-center bg-secondary text-white">
            <h1>Todo Application</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xs-12 col-lg-6">
            <form id="todo_form" action="#">
                @csrf
                <div class="mb-3 w-100 d-flex flex-column">
                    <label for="id_todo_item" class="form-label">Enter your todo work</label>
                    <input type="text" name="todo_item" class="form-label p-1 text-muted" id="id_todo_item" placeholder="ex. reading books">
                  </div>
                  <div class="mb-3">
                      <input type="submit" value="Add To List" class="btn btn-success">
                  </div>
            </form>
        </div>
        <div class="col-xs-12 col-lg-6" id="todo_list_area">
            <div class="row bg-info p-1">
                <h4 class="">Your List : </h4>
            </div>
            <div class="row bg-light p-1 list">
                <ul class="list-group" id="todo_list">
                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center"> 
                    <span >
                        First demo item 
                    </span>
                        <span>
                            <a href="#" class="link-primary m-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="link-danger m-1">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </li> --}}
                    
                  </ul>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset("js/jquery.js") }}"></script>
<script src="{{ asset("js/fontawesome.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}" crossorigin="anonymous"></script>
<script src="{{ asset("js/todoapp.js") }}"></script>
</html>
@extends('index')
@section('content')

    <div class="row title">
        <a href="/" class="btn btn-success">Home</a>
        <h3>Sorting page</h3>
    </div>
    <hr>
    <div class="row filters">
        <div class="col-4">
            <div class="col-10 sort_column">
                <span>Сортировать по дате:</span>
                <div class="sort" data-test="date_up">Возрастание</div>
                <div class="sort" data-test="date_down">Убывание</div>
                <hr>
            </div>
            <div class="col-10 sort_column">
                <span>Сортировать по Имени:</span>
                <div class="sort" data-test="name_up">А-Я</div>
                <div class="sort" data-test="name_down">Я-А</div>
                <hr>
            </div>
            <div class="col-10 sort_column">
                <span>Сортировать по Зарплате:</span>
                <div class="sort" data-test="salary_up">Возрастание</div>
                <div class="sort" data-test="salary_down">Убывание</div>
                <hr>
            </div>
            <div class="col-10 sort_column">
                <span>Сортировать по должности:</span>
                <div class="sort" data-test="position_up">А-Я</div>
                <div class="sort" data-test="position_down">Я-А</div>
                <hr>
            </div>

            <hr>

            <div class=" col-10 search-block">
                <h2>форма поиска</h2>
                <div class="row">
                    <div class="col-xs-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Искать">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-8">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Date</th>
                    <th>Salary</th>
                </tr>
                </thead>
                {{$sort->links()}}
                <tbody id="load">
                @foreach($sort as $sortable)
                    <tr>
                        <td>{{$sortable->name}}</td>
                        <td>{{$sortable->position}}</td>
                        <td>{{$sortable->employment_date}}</td>
                        <td>{{$sortable->salary}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$sort->links()}}
        </div>
    </div>

@stop


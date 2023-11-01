<div>
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
            
                <div class="alert alert-success">{{session('message')}}</div>
            
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                    </h3>
                    <div class="card-body"></div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">EDIT</a>
                                        <a href="" class="btn btn-danger"style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;"><b>DELETE</b></a>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$categories ->links()}}
            </div>
        </div>
    </div>
</div>

@extends('admin.admin_master')
@section('admin')

<div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">
                                                Standard Modal
                            </button>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">All Blog Category</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Category Name</th>
                                                <th>Category Slug</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($blog as $key=> $item)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $item->category_name }}</td>
                                                        <td>{{ $item->category_slug }}</td>
                                                        
                                                        <td>
                                                            <a href="{{route('edit.review',$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                                                            <a href="{{route('delete.review',$item->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
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




<!-- Default Modal -->

<div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="standard-modalLabel">Blog Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

            <form action="{{route('store.blog.category')}}" method="post">
                @csrf
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Blog Category</label>
                            <input type="text" name="category_name" id="input1" class="form-control">
                        </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
</div>

@endsection
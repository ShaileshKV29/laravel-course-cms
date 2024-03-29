@extends('layouts.app');

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td class="text-right">
                            <a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-info btn-small">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" onclick="handledelete({{ $category->id }})">
                                Delete
                            </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           
            
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteCategoryForm">
                     @method('DELETE')
                     @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-bold">
                                By clicking on "Delete" this category will be deleted from database.
                            </p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div> 
                </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('delscripts')
    <script>
        function handledelete(id){
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
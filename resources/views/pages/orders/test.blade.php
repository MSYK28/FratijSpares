@extends('layouts.app', [
'class' => '',
'elementActive' => 'orders'
])

@section('content')

<div class="content">
    <form action="" method="post">
        @csrf
        
        <table class="table table-bordered" id="table">
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    <input type="text" value="" name="inputs[0]['name']" placeholder="Enter your name" class="form-control">
                </td>
                <td>
                    <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </td>
            </tr>
        </table>

        <button type="submit" class="btn btn-primary col-md-2">Save</button>
    </form>
</div>

@endsection

@section('script')
<script>
    
    var i = 0;
    $('#add').click(function() {
        ++i;
        $('#table').append(
            `<tr>
                <td>
                    <input type="text" name="inputs[`+i+`][name]" placeholder="Enter Name" class="form-control" />
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                </td>
            </tr>`
        );
    });

    $(document).on('click', '.remove-table-row', function(){
        $(this).closest(`tr`).remove();
    });

</script>

@endsection

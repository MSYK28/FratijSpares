<div class="row">
    <div class="col-md-10">
        <div class="card ">
            <form action="{{ url('/orders') }}" method="POST">
                @csrf
                <div class="card-header ">
                    <div class="buttons float-right">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                    <h5 class="card-title">Orders</h5>
                    <p class="card-category">Customer Order</p>
                    @include('pages.alert')
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="inputs[0][product_id]">
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" required value="" name="inputs[0][quantity]"
                                            class="form-control quantity">
                                    </td>
                                    <td>
                                        <input type="number" required value="" name="inputs[0][price]"
                                            class="form-control price">
                                    </td>
                                    <td>
                                        <input type="number" required value="" name="inputs[0][discount]"
                                            class="form-control discount">
                                    </td>
                                    <td>
                                        <input type="number" required value="" name="inputs[0][total_amount]"
                                            class="form-control total_amount">
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success"><i
                                                class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">Total</h5>
                <p class="card-category">Sum total</p>
                <hr>
            </div>
            <div class="card-body ">
                <h3 class="total">0.00</h3>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="card">
        <div class="card-header">Name</div>
        <div class="card-body">Ksh. 9000</div>
    </div>
</div>
<div class="col-sm-6">
    <div class="card">
        <div class="card-header">
            <div class="buttons">
                <button class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></button>
                <p class="card-description">0</p>
                <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">Ksh. 9000</div>
    </div>
</div>


<script>
    var i = 0;
    $('#add').click(function () {
        ++i;
        $('#table').append(
            `<tr>
                <td>
                    <select class="form-control product_id" name="inputs[` + i + `][product_id]">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" required name="inputs[` + i + `][quantity]" class="form-control quantity" />
                </td>
                <td>
                    <input type="number" required name="inputs[` + i + `][price]" class="form-control price" />
                </td>
                <td>
                    <input type="number" required name="inputs[` + i + `][discount]" class="form-control dicsount" />
                </td>
                <td>
                    <input type="number" required name="inputs[` + i + `][total_amount]" class="form-control total_amount" />
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-table-row"><i class="fa fa-times"></i></button>
                </td>
            </tr>`
        );
    });

    $(document).on('click', '.remove-table-row', function () {
        $(this).closest(`tr`).remove();
    });

</script>
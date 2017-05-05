{!!  Form::open([
                'method'=>'get'
        ]) !!}
<div class="col-md-12">
    <table class="table table-striped" id="filter_table">
        <thead>
            <tr>
                <th class="col-md-3">Field</th>
                <th class="col-md-3">Operator</th>
                <th class="col-md-4">Value</th>
                <th class="col-md-2 text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @forelse($filtered as $filter)
                <tr data-filter-id="{{$i}}">
                    <td class="col-md-3">
                        {!! Form::select('filter['.$i.'][field]', $filter_fields , $filter['field'] , ['class' => 'form-control',"id"=>"filter_field_".$i]) !!}
                    </td>
                    <td class="col-md-3">
                        {!! Form::select('filter['.$i.'][condition]', $filter_condition , $filter['condition'], ['class' => 'form-control',"id"=>"filter_condition_".$i]) !!}
                    </td>
                    <td class="col-md-4">
                        <input name='filter[{{$i}}][value]' class="form-control" id="filter_value_{{$i}}" value="{{$filter['value']}}" placeholder="Value" type="text">
                    </td>
                    <td class="col-md-2 text-center">
                        <a href="javascript:void(0);" onclick="filterable_filter.removeFilterRow(this);"><i class="fa fa-trash text-black"></i></a>
                    </td>
                </tr>
                <?php $i = $i + 1;?>
            @empty
                <tr data-filter-id="1">
                    <td class="col-md-3">
                        {!! Form::select('filter[1][field]', $filter_fields , null , ['class' => 'form-control',"id"=>"filter_field_1"]) !!}
                    </td>
                    <td class="col-md-3">
                        {!! Form::select('filter[1][condition]', $filter_condition , null , ['class' => 'form-control',"id"=>"filter_condition_1"]) !!}
                    </td>
                    <td class="col-md-4">
                        <input name="filter[1][value]" class="form-control" id="filter_value_1" placeholder="Value" type="text">
                    </td>
                    <td class="col-md-2 text-center">
                        <a href="javascript:void(0);" onclick="filterable_filter.removeFilterRow(this);"><i class="fa fa-trash text-black"></i></a>
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
    <p>
        <a href="javascript:void(0);" onclick="filterable_filter.addFilterRow(this);">Add another filter</a>
    </p>

    <p>
        <button class="btn btn-default btn-sm" type="submit">Apply</button>
        <a class="btn btn-link btn-sm" data-toggle="collapse" data-target="#filter-panel">Cancel</a>
    </p>
</div>
{!! Form::close()!!}
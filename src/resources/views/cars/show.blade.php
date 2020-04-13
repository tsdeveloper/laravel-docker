@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($car->name) ? $car->name : 'Car' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('cars.car.destroy', $car->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cars.car.index') }}" class="btn btn-primary" title="Show All Car">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('cars.car.create') }}" class="btn btn-success" title="Create New Car">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('cars.car.edit', $car->id ) }}" class="btn btn-primary" title="Edit Car">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Car" onclick="return confirm(&quot;Click Ok to delete Car.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $car->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $car->description }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($car->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection
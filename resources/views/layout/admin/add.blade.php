@include('layout.layouts.default')

   {!! Form::open(['url'=>'/admin/create','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Tên sản phẩm', ['type'=>'text',]) !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'.....','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
        <div class="d-block">
        {!! Form::label('price', 'price', ['class' =>'form-control']) !!}
         {!! Form::number('price', null, []) !!}
        </div>
        <div class="d-block">
            {!! Form::label('image', 'image', []) !!}
            {!! Form::file('image', ['id' => 'image','class' => 'form-control']) !!}
        </div>
        <div class="d-block">
            {!! Form::label('amount', 'amount', []) !!}
        {!! Form::number('amount', null, ['class'=>'form-control']) !!}
        </div>
        <div class="">
            {!! Form::label('slug', 'slug', []) !!}
            {!! Form::text('slug',null, ['class' => 'form-control','id'=> 'convert_slug']) !!}
        </div>
    </div>
    <div class="d-block">
        {!! Form::submit('add product', ['class' => 'btn-success']) !!}
    </div>

    {!! Form::close() !!}
    
 
       
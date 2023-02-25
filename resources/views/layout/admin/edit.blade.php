@include('layout.layouts.default')
<div class="admin-edit-form ">
        <div class="edit-form container">
            <div class="edit row">
                <div class="col-lg-12 edit-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="/admin/edit"><button class="btn btn-success">Back To Menu</button></a>

                        </div>
                     <div class="col-lg-6 form-content">
                       
                        {!! Form::open(['url'=>'/admin/edit','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Tên sản phẩm', ['type'=>'text',]) !!}
                            {!! Form::text('name', $data->name, ['class'=>'form-control','placeholder'=>'.....','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                            <div class="d-block">
                            {!! Form::label('price', 'price', []) !!}
                             {!! Form::number('price', $data->price, []) !!}
                            </div>
                            
                            <div class="d-block">
                                {!! Form::label('amount', 'amount', []) !!}
                            {!! Form::number('amount', $data->amount, ['class'=>'form-control']) !!}
                            </div>
                            <div class="">
                                {!! Form::label('slug', 'slug', []) !!}
                                {!! Form::text('slug',null, ['class' => 'form-control','id'=> 'convert_slug']) !!}
                            </div>
                            
                       {!! Form::hidden('id', $data->id, []) !!}
                        </div>
                        <div class="d-block">
                            {!! Form::submit('add product', ['class' => 'btn-success']) !!}
                        </div>
                    
                        {!! Form::close() !!}
                        

                     </div>
                     <div class="col-lg-3"></div>
                    </div>


                </div>

            </div>


        </div>
    </div>

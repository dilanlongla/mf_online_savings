<!-- Log Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('log_name', 'Log Name:') !!}
    {!! Form::text('log_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_type', 'Subject Type:') !!}
    {!! Form::text('subject_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Subject Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    {!! Form::number('subject_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Causer Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('causer_type', 'Causer Type:') !!}
    {!! Form::text('causer_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Causer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('causer_id', 'Causer Id:') !!}
    {!! Form::number('causer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Properties Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('properties', 'Properties:') !!}
    {!! Form::textarea('properties', null, ['class' => 'form-control']) !!}
</div>
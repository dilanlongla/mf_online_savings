<!-- Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref', 'Ref:') !!}
    {!! Form::text('ref', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Is In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_in', 'Is In:') !!}
    {!! Form::text('is_in', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fee', 'Fee:') !!}
    {!! Form::number('fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Collector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('collector_id', 'Collector Id:') !!}
    {!! Form::number('collector_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_id', 'Account Id:') !!}
    {!! Form::number('account_id', null, ['class' => 'form-control']) !!}
</div>
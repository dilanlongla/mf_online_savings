<!-- Log Name Field -->
<div class="col-sm-12">
    {!! Form::label('log_name', 'Log Name:') !!}
    <p>{{ $activityLog->log_name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $activityLog->description }}</p>
</div>

<!-- Subject Type Field -->
<div class="col-sm-12">
    {!! Form::label('subject_type', 'Subject Type:') !!}
    <p>{{ $activityLog->subject_type }}</p>
</div>

<!-- Subject Id Field -->
<div class="col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{{ $activityLog->subject_id }}</p>
</div>

<!-- Causer Type Field -->
<div class="col-sm-12">
    {!! Form::label('causer_type', 'Causer Type:') !!}
    <p>{{ $activityLog->causer_type }}</p>
</div>

<!-- Causer Id Field -->
<div class="col-sm-12">
    {!! Form::label('causer_id', 'Causer Id:') !!}
    <p>{{ $activityLog->causer_id }}</p>
</div>

<!-- Properties Field -->
<div class="col-sm-12">
    {!! Form::label('properties', 'Properties:') !!}
    <p>{{ $activityLog->properties }}</p>
</div>


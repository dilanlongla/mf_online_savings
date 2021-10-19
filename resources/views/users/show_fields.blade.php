<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $users->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $users->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $users->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $users->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $users->remember_token }}</p>
</div>

<!-- First Name Field -->
<div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $users->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="col-sm-12">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $users->last_name }}</p>
</div>

<!-- Matricule Field -->
<div class="col-sm-12">
    {!! Form::label('matricule', 'Matricule:') !!}
    <p>{{ $users->matricule }}</p>
</div>

<!-- Nic Field -->
<div class="col-sm-12">
    {!! Form::label('nic', 'Nic:') !!}
    <p>{{ $users->nic }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $users->address }}</p>
</div>

<!-- Tel Field -->
<div class="col-sm-12">
    {!! Form::label('tel', 'Tel:') !!}
    <p>{{ $users->tel }}</p>
</div>

<!-- Occupation Field -->
<div class="col-sm-12">
    {!! Form::label('occupation', 'Occupation:') !!}
    <p>{{ $users->occupation }}</p>
</div>
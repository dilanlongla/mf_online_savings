<!-- Ref Field -->
<div class="col-sm-12">
    {!! Form::label('ref', 'Ref:') !!}
    <p>{{ $transaction->ref }}</p>
</div>

<!-- Is In Field -->
<div class="col-sm-12">
    {!! Form::label('is_in', 'Is In:') !!}
    <p>{{ $transaction->is_in }}</p>
</div>

<!-- Fee Field -->
<div class="col-sm-12">
    {!! Form::label('fee', 'Fee:') !!}
    <p>{{ $transaction->fee }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $transaction->amount }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $transaction->status }}</p>
</div>

<!-- Collector Id Field -->
<div class="col-sm-12">
    {!! Form::label('collector_id', 'Collector Id:') !!}
    <p>{{ $transaction->collector_id }}</p>
</div>

<!-- Account Id Field -->
<div class="col-sm-12">
    {!! Form::label('account_id', 'Account Id:') !!}
    <p>{{ $transaction->account_id }}</p>
</div>


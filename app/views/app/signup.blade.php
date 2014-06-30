@extends('layouts.application')
@section('content')
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
@include('layouts.notification')

    {{ Form::open(array('route' => 'app.signup', 'method' => 'post')) }}
      <fieldset>
        <legend>Sign up</legend>
        <div class="control-group">
          <?php echo Form::label('name', 'Name', array('class' => 'control-label')); ?>
          <div class="controls">
            <?php echo Form::text('name'); ?>
          </div>
        </div>

        <div class="control-group">
          <?php echo Form::label('email', 'email', array('class' => 'control-label')); ?>
          <div class="controls">
			  <?php echo Form::text('email'); ?>
          </div>
        </div>

        <div class="control-group">
          <?php echo Form::label('password', 'password', array('class' => 'control-label')); ?>
         <div class="controls">
            <?php echo Form::password('password'); ?>
          </div>
        </div>
        <div class="control-group">
          <?php echo Form::label('password_confirmation', 'password confirmation', array('class' => 'control-label')); ?>
          <div class="controls">
            <?php echo Form::password('password_confirmation'); ?>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
             {{ Form::submit("Sign in", array('class'=>"btn btn-primary")) }}
          </div>
        </div>
      </fieldset>
    {{ Form::close() }}
    </div>
  </div>
</div>
@stop
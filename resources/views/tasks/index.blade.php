@extends('layouts.layout')

@section ('content') 
<div class="col-sm-8 blog-main">

    <ul>
        @foreach ($tasks as $task)
        <li>

           <a href="/tasks/{{ $task->id }}">

              {{ $task->body }}

          </a>

      </li>  

      @endforeach
  </ul>   

</div><!-- /.blog-main -->

@endsection
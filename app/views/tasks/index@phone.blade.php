@extends('layouts.application')

@section('content')
<div data-role="page" id="todo_nav" data-theme="d">
  @include('tasks._header', ['state' => 'todo'])

  <div data-role="content">
    <ul data-role="listview" id="todo_h" data-inset="true" class="sortable">
      <span id="todo_h_label" class="cancel"><div class="task-label">High</div></span>
      @foreach ($tasks['todo_high_tasks'] as $t)
        @include('tasks._task', ['task' => $t])
      @endforeach
    </ul>
    <ul data-role="listview" id="todo_m" data-inset="true" class="sortable">
      <span id="todo_m_label" class="cancel"><div class="task-label">Middle</div></span>
      @foreach ($tasks['todo_mid_tasks'] as $t)
        @include('tasks._task', ['task' => $t])
      @endforeach
    </ul>
    <ul data-role="listview" id="todo_l" data-inset="true" class="sortable">
      <span id="todo_l_label" class="cancel"><div class="task-label">Low</div></span>
      @foreach ($tasks['todo_low_tasks'] as $t)
        @include('tasks._task', ['task' => $t])
      @endforeach
    </ul>
  </div>

  @include('tasks._footer', ['state' => 'todo'])
</div>

<div data-role="page" id="doing_nav" data-theme="d">
  @include('tasks._header', ['state' => 'doing'])

  <div data-role="content">
    <ul data-role="listview" id="doing" data-inset="true">
      <span id="doing_label" class="cancel"><div class="task-label">Doing</div></span>
      @foreach ($tasks['doing_tasks'] as $t)
        @include('tasks._task', ['task' => $t])
      @endforeach
    </ul>
    <ul data-role="listview" id="waiting" data-inset="true">
      <span id="waiting_label" class="cancel"><div class="task-label">Waiting</div></span>
      @foreach ($tasks['waiting_tasks'] as $t)
        @include('tasks._task', ['task' => $t])
      @endforeach
    </ul>
  </div>

  @include('tasks._footer', ['state' => 'doing'])
</div>

<div data-role="page" id="done_nav" data-theme="a">
  @include('tasks._header', ['state' => 'done'])

  <div data-role="content">
    <ul data-role="listview" id="done" data-inset="true">
      <span id="done_label" class="cancel"><div class="task-label">Done</div></span>
      @foreach ($tasks['done_tasks'] as $t)
        @include('tasks._task', ['task' => $t])
      @endforeach
    </ul>
  </div>

  @include('tasks._footer', ['state' => 'done'])
</div>

<div data-role="page" id="setting" data-theme="c" class="swipe-back">
  <div data-role="header"><h1>タスクの編集</h1></div>
  <div data-role="content">
    <form id="edit_form" method="post" style="display:inline">
      <textarea id="edit_message" maxlength="200"/></textarea>
      <div data-role="controlgroup" data-type="horizontal" data-mini="true">
        <a id="update_btn" data-role="button" data-inline="true" data-rel="back">Update</a>
        <a id="cancel_edit_btn" data-role="button" data-inline="true" data-rel="back">Cancel</a>
        <a id="delete_btn" data-role="button" data-inline="true" data-rel="back">Delete</a>
      <span class="task-chars-left"></span>
      </div>
    </form>
  </div>

  <div data-role="content">
    <div class="ui-grid-b">
      <div class="ui-block-a">
        <button id="todo_h_btn" class="status-btn" data-corners="false" data-rel="back">High</button>
      </div>
      <div class="ui-block-b">
        <button id="doing_btn" class="status-btn" data-corners="false" data-rel="back">Doing</button>
      </div>
      <div class="ui-block-c">
        <button id="done_btn" class="status-btn" data-corners="false" data-rel="back">Done</button>
      </div>
      <div class="ui-block-a">
        <button id="todo_m_btn" class="status-btn" data-corners="false" data-rel="back">Middle</button>
      </div>
      <div class="ui-block-b">
        <button id="waiting_btn" class="status-btn" data-corners="false" data-rel="back">Wait</button>
      </div>
      <div class="ui-block-a">
        <button id="todo_l_btn" class="status-btn" data-corners="false" data-rel="back">Low</button>
      </div>
    </div>
    <a id="cancel_move_btn" data-role="button" data-rel="back">Cancel</a>
  </div>
</div>

<div data-role="page" id="add_todo_page" data-theme="d">
  @include('tasks._header', ['state' => 'add'])

  <div data-role="content">
    <form method="post" class="add_todo_form form-inline">
      <input type="text" class="prefix" data-mini="true" width="8" value="" placeholder="Book Name"/>
      <textarea class="add_todo_form_message" data-mini="true" maxlength="200" placeholder="Task Name"></textarea>
    </form>

    <div class="ui-grid-a">
      <div class="ui-block-a"><a class="add_todo_button" href="#todo_nav" data-theme="b" data-role="button">Add</a></div>
      <div class="ui-block-b"><a class="add_todo_button" data-theme="b" data-role="button">Add more</a></div>
    </div>
    <a href="#" data-rel="back" data-role="button">Cancel</a>
  </div>
</div>

<div data-role="page" id="book_list_page" data-theme="d">
  @include('tasks._header', ['state' => 'book'])
  <div data-role="content">
    <div class="ui-grid-b">
      <?php $block_name = ["a","b","c"] ?>
      @foreach ($books as $i => $b)
{{--
        <div class="ui-block-{{ $block_name[$i % count($block_name)] }}"><div data-id="{{ $b["id"] }}" class="book-selector ui-bar ui-bar-d" style="height:50px">{{ $b["name"] }}</div></div>
--}}
      @endforeach
    </div>
  </div>
</div>


<script>
(function(){
  var taskAction = KanbanList.taskAction;
  taskAction.initial_setting();

  var current_book = {
    id : {{ $current_book_id }},
    name : '{{ $current_book_id != 0 ? $book_name : "" }}'
  }
  var addForm = KanbanList.addForm;
  addForm.initial(current_book);

  $('.book-selector').click(function(){
    location.href="tasks?book_id=" + $(this).attr("data-id");
  });
}());
</script>
@stop

@extends('layouts.main')
@section('title')<?php echo $user->username;?>个人空间 - 岭南六少- 分享程序员的那些事儿@stop
@section('description')<?php echo $user->username;?>个人空间 -  - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords')<?php echo $user->username;?>个人空间 - - 岭南六少- 分享程序员的那些事儿@stop

@section('content')
 <div class="row">
    <div class="span9">
    <h3>{{ $user->username }}</h3>
    <div class="row">
       <div class="span3">Level 2</div>
       <div class="span6">Level 2</div>
   </div>
    </div>
</div>
@stop
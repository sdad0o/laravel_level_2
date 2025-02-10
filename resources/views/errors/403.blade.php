@extends('errors::minimal')

@section('title', 'Forbidden custom')
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden custom'))

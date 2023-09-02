@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', 'Go Back Boo Shit')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

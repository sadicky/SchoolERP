<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}" />
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/fullcalendar.min.css')}}">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/datepicker.min.css')}}">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
</head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <meta charset="UTF-8">

    <meta name="viewport" width=device-width, initial-scale=1.0>
    <title>@yield('title')</title>
    <!-- CSS Bootstrap (ou autre framework CSS) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/image1/logo_url-removebg-preview.png">
    <link rel="stylesheet" href="/css/page_offre.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="../css/navbar.css">
    <meta name="description" content="stage, alternance, recherche, CESI, ingénieur">
    <meta name="keywords" content="stage, alternance, recherche, informatique">
    <link rel="stylesheet" href="@yield('css')">
    <link rel="stylesheet" href="/css/form2.css">

    <link rel="stylesheet" href=@yield('css')>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

</head>

@include('layouts.navbar')

@yield('content')
@extends('layouts.footer')
<script src="../../js/navbar.js"></script>

</html>

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/docs', static fn(): View => view('docs'));

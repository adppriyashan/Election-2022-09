<?php

use App\Http\Controllers\API\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/vote/submit/{userId}/{nominatorId}', [APIController::class, 'submitVote']);
Route::get('/elections/results', [APIController::class, 'getResults']);
Route::get('/elections/nominators/{userId}', [APIController::class, 'getElectionVoters']);

<?php

function successMessage($actionType)
{
    return redirect()->back()->with(['success' => $actionType.'successfully']);
}

function errorMessage()
{
    return redirect()->back()->with(['error' => 'Something went wrong']);
}

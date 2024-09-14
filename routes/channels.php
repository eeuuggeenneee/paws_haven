<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('newpost_received', function () {
    return true;
});

Broadcast::channel('new_comment', function () {
    return true;
});

Broadcast::channel('reply_channel', function () {
    return true;
});

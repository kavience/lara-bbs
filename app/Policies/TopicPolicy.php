<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    public function deleted(Topic $topic)
    {
        DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}

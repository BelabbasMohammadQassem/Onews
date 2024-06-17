<?php

namespace App\Helper;

use App\Entity\Comment;
use Symfony\Component\Validator\Constraints\Collection;

class CommentHelper
{
    public function calculateRating($commentList)
    {
        // s'il n'y a pas de commentaires on décide de renvoyer 0;
        if (count($commentList)== 0) return 0;

        $totalRating = 0;
        /** @var Comment $currentComment */
        foreach ($commentList as $currentComment )
        {
            $totalRating += $currentComment->getRating();
        }


        $finalRating = $totalRating / $commentList->count();
        return round($finalRating, 1);
    }
}
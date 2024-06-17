<?php

namespace App\Utils;


use Doctrine\Common\Collections\Collection;


class ReviewHelper
{

    /**
     * Undocumented function
     *
     * @param Collection $comment
     * @return float
     */
    public function calculateRating(Collection $comment):float
    {
        // gérer les cas particulier dès le début pour simplifier le code
        // on renvoit la note par défaut
        if ($comment->count() === 0) return 2.5;


        $totalRating = 0;
        /** @var Comment $currentComment */
        foreach ($comment as $currentComment )
        {
            $totalRating += $currentComment->getRating();
        }


        $finalRating = $totalRating / $comment->count();
        return round($finalRating, 1);
    }
}
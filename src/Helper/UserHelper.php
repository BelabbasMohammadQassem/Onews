<?php

namespace App\Helper;

use App\Entity\Comment;
use App\Entity\Trip;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class UserHelper
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function canAddComment(UserInterface $user)
    {
        // on veut utiliser le composant de sécurité
        if ($this->security->isGranted('ROLE_USER', $user))
        {
            return true;
        }
        return false;
    }

    public function canUpdateComment(UserInterface $user, Comment $comment)
    {
        if ($this->security->isGranted('ROLE_ADMIN')) 
        {
            return true;
        }

        if ($user === $comment->getuser())
        {
            return true;
        }

        return false;
    }
}
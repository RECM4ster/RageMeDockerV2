<?php
@include ('../login/getEmailFromCookie.php');
class reaction
{
    private $post_id;
    private $us_email;
    public function __construct($post_id)
    {
        $this->post_id = $post_id;
    }

    public function getReactionNumber()
    {
        $querry = 'select count(*) from reaction where re_active = 1 and re_post_id = "' . $this->post_id . '"';
        $make = new querry($querry);
        $reactionNumber = $make->executeQuerry();
        $reactionNumber = mysqli_fetch_row($reactionNumber);
        return $reactionNumber[0];
    }

    private function getUserId()
    {
        $userEmail = new getEmailFromCookie();
        $this->us_email = $userEmail->getEmailFromCookie();
        $querry = 'select us_id from users where us_email = "'.$this->us_email.'";';
        $make = new querry($querry);
        $user_id = $make->executeQuerry();
        $usId =  mysqli_fetch_row($user_id);
        return $usId[0];

    }

    public function checkIsUserReacted()
    {
        $querry = 'select count(*) from reaction where    re_post_id = "' . $this->post_id . '" and re_us_id = '.$this->getUserId();
        $make = new querry($querry);
        $isReact = $make->executeQuerry();
        $react =  mysqli_fetch_row($isReact);
        return $react[0];

    }

    public function checkIsUserReactedIsActive()
    {
        $querry = 'select count(*) from reaction where re_active = 1 and  re_post_id = "' . $this->post_id . '" and re_us_id = '.$this->getUserId();
        $make = new querry($querry);
        $isReact = $make->executeQuerry();
        $react =  mysqli_fetch_row($isReact);
        return $react[0];

    }


    public function buttonAction()
    {
        $bool = $this->checkIsUserReactedIsActive();

        if ($bool == 0)
        {
            $this->changeReaction(0);
        }
        else
        {
            $this->changeReaction(1);
        }


    }

    private function changeReaction($active)
    {
        $querry = 'select re_id from reaction where re_post_id = "' . $this->post_id . '" and re_us_id = '.$this->getUserId();
        $make = new querry($querry);
        $reId = mysqli_fetch_row($make->executeQuerry());

        if($reId[0] == NULL)
            $this->addNewReaction();
        else
        {
            $this->updateExistReaction($reId[0], $active);
        }

    }

    private function addNewReaction()
    {
        $querry = 'insert into reaction (re_post_id, re_us_id, re_active) values ('.$this->post_id.','.$this->getUserId().',1)';
        $make = new querry($querry);
        $make->executeQuerry();
    }

    private function updateExistReaction($reId, $active)
    {
        if($active == 1)
        {$active = 0;}
        else
        {$active = 1;}
        $querry = 'update reaction set re_active = '.$active.' where re_id = '.$reId;
        $make = new querry($querry);
        $make->executeQuerry();

    }
}
<?php
//SLUGGABLE WORDS
// get cart
if (!function_exists('getCart')) {

    function getCart()
    {

        if(session()->get('guestId'))
        {
            return \Cart::session(session()->get('guestId'));
        }else{
            return \Cart::session(session()->getId());
        }

    }
}

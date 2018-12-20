<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
----------------------------------------------------------------------------
    Check if browser support cookie and they are enabled.
    Count current cookies, if non found, set & retry.
    For preventing redirect loop, pass $_GET parameter.
    
    @return (bool) result.
----------------------------------------------------------------------------
*/
if ( ! function_exists('is_cookie_enabled'))
{
    function is_cookie_enabled ()
    {
        if (count($_COOKIE)) {
            return true;
        }
        
        $get_name   = $cookie_name  = __FUNCTION__;
        $get_value  = $cookie_value = 1;
        
        $CI =& get_instance();
        
        if (!$CI->input->get($get_name))
        {
            $CI->input->set_cookie(array(
                'name'   => $cookie_name,
                'value'  => $cookie_value,
                'expire' => -1,
                'secure' => is_https() ? true : false,
            ));

            $get_array = $CI->input->get(null, true);
            $get_array += array($get_name => $get_value);
            
            $CI->load->helper('url');
            $redirect_to = current_url() . '?' . http_build_query($get_array);
            return redirect($redirect_to);
        }
        
        return false;
    }
}
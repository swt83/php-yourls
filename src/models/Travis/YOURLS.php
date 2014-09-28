<?php

namespace Travis;

class YOURLS
{
    /**
     * List of required fields.
     *
     * @var     array
     */
    protected static $required = array('endpoint', 'username', 'password');

    /**
     * Magic method to handle API calls.
     *
     * @param   string  $method
     * @param   array   $args
     * @return  array
     */
    public static function __callStatic($method, $args)
    {
        // amend payload
        $args = isset($args[0]) ? $args[0] : array();
        $args['action'] = $method;
        $args['format'] = 'json';

        // flight check...
        foreach (static::$required as $field)
        {
            if (!isset($args[$field])) trigger_error('Field "'.$field.'" is required.');
        }

        // build endpoint
        $endpoint = $args['endpoint'].'/yourls-api.php';

        // build post data
        $fields = http_build_query($args);

        // curl request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $response = curl_exec($ch);

        // if errors...
        if (curl_errno($ch))
        {
            // capture
            #$errors = curl_error($ch);

            // close
            curl_close($ch);

            // return
            return false;
        }

        // if NO errors...
        else
        {
            // close
            curl_close($ch);

            // decode
            return json_decode($response);
        }
    }
}
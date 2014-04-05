<?php

class Hash {

    /**
     * 
     * @param String $algo The algorithm to be used (md5, sha, whirlpool etc.)
     * @param String $data The data to be encoded
     * @return String The salted data
     */
    public static function create($algo, $data) {
        $context = hash_init($algo, HASH_HMAC, SALT_KEY);
        hash_update($context, $data);
        
        return hash_final($context);
    }
    
}


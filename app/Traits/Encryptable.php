<?php


namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait Encryptable
{

        public function toArray()
        {
            $array = parent::toArray();

            foreach ($array as $key => $attribute) {
                if (in_array($key,$this->encryptable) && $attribute) {
                    $array[$key] =Crypt::decrypt($attribute);
                }
            }
            return $array;
        }


        public function getAttribute($key)
        {
            $value = parent::getAttribute($key);

            if (in_array($key, $this->encryptable) && parent::getAttribute($key)) {

                    $value = Crypt::decrypt(parent::getAttribute($key));

            }


            return $value;
        }



    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}
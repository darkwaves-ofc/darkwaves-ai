<?php

namespace App\Services;

use App\Models\CustomTemplate;
use App\Models\Template;

class HelperService 
{
    public static function getTotalWords()
    {   
        $value = number_format(auth()->user()->available_words + auth()->user()->available_words_prepaid);
        return $value;
    }

    public static function getTotalImages()
    {   
        $value = number_format(auth()->user()->available_images + auth()->user()->available_images_prepaid);
        return $value;
    }

    public static function listTemplates()
    {   
        $all_templates = Template::orderBy('group', 'asc')->where('status', true)->get();
        return $all_templates;
    }

    public static function listCustomTemplates()
    {   
        $custom_templates = CustomTemplate::orderBy('group', 'asc')->where('status', true)->get();
        return $custom_templates;
    }
}
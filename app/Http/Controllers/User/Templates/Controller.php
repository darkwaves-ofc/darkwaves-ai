<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class VideoDescriptionsController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPrompt($title, $keywords, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                    $prompt = "Write a large and meaningful paragraph on this topic:\n\n" . $title . "\n\nUse following keywords in the paragraph:\n" . $keywords . "\n\nTone of voice of the paragraph must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = ;
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = ;
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = ;
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = ;
                return $prompt;
                break;
            case 'da-DK':
                $prompt = ;
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = ;
                return $prompt;
                break;
            case 'et-EE':
                $prompt = ;
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = ;
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = ;
                return $prompt;
                break;
            case 'de-DE':
                $prompt = ;
                return $prompt;
                break;
            case 'el-GR':
                $prompt = ;
                return $prompt;
                break;
            case 'he-IL':
                $prompt = ;
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = ;
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = ;
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = ;
                return $prompt;
                break;
            case 'id-ID':
                $prompt = ;
                return $prompt;
                break;
            case 'it-IT':
                $prompt = ;
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = ;
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = ;
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = ;
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = ;
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  ;
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = ;
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = ;
                return $prompt;
                break;
            case 'es-ES':
                $prompt = ;
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = ;
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = ;
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = ;
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = ;
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = ;
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = ;
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = ;
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

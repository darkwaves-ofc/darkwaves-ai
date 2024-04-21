<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class VideoScriptsController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVideoScriptsPrompt($description, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                    $prompt = "Write an interesting video script about:\n\n" . $description  . "\n\nTone of voice of the video script must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب نص فيديو مثيرًا للاهتمام حول:\n\n". $description. "\ n \ n يجب أن تكون نغمة الصوت في نص الفيديو:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一个有趣的视频脚本：\n\n". $description. "\n\n视频脚本的语调必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite zanimljiv video scenarij o:\n\n" . $description. "\n\nTon glasa video skripte mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište zajímavý video skript o:\n\n" . $description . "\n\nTón hlasu skriptu videa musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv et interessant videoscript om:\n\n" . $description. "\n\nTone i videoscriptet skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een interessant videoscript over:\n\n" . $description . "\n\nDe toon van het videoscript moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage huvitav videostsenaarium teemal:\n\n" . $description . "\n\nVideo skripti hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita mielenkiintoinen videokäsikirjoitus aiheesta:\n\n" . $description . "\n\nVideokäsikirjoituksen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez un script vidéo intéressant sur :\n\n" . $description . "\n\nLe ton de la voix du script vidéo doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie ein interessantes Videoskript über:\n\n" . $description . "\n\nTonlage des Videoskripts muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα ενδιαφέρον σενάριο βίντεο για:\n\n" . $description . "\n\nΟ τόνος της φωνής του σεναρίου βίντεο πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב תסריט וידאו מעניין על:\n\n" . $description . "\n\nטון הדיבור של סקריפט הסרטון חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस बारे में एक दिलचस्प वीडियो स्क्रिप्ट लिखें:\n\n" .$description."\n\nवीडियो स्क्रिप्ट की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írj egy érdekes videó forgatókönyvet erről:\n\n" . $description . "\n\nA videó forgatókönyvének hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu áhugavert myndbandshandrit um:\n\n" . $description. "\n\nRaddónn myndbandshandritsins verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis skrip video yang menarik tentang:\n\n" . $description . "\n\nNada suara skrip video harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un copione video interessante su:\n\n" . $description . "\n\nIl tono di voce del copione video deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "興味深いビデオ スクリプトを作成してください:\n\n" . $description. "\n\nビデオ スクリプトの声の調子:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 흥미로운 비디오 스크립트 작성:\n\n" . $description . "\n\n비디오 스크립트의 음성 톤은 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis skrip video yang menarik tentang:\n\n" . $description . "\n\nNada suara skrip video mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv et interessant videoskript om:\n\n" . $description . "\n\nStemmetonen til videoskriptet må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz ciekawy scenariusz wideo na temat:\n\n" . $description. "\n\nTon głosu skryptu wideo musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um script de vídeo interessante sobre:\n\n" . $description. "\n\nTom de voz do roteiro do vídeo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите интересный сценарий видео о:\n\n" . $description . "\n\nТон голоса видеосценария должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un guión de video interesante sobre:\n\n" . $description . "\n\nEl tono de voz del guión del video debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett intressant videomanus om:\n\n" . $description . "\n\nRösten i videoskriptet måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şununla ilgili ilginç bir video komut dosyası yazın:\n\n" . $description. "\n\nVideo komut dosyasının ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um script de vídeo interessante sobre:\n\n" . $description. "\n\nTom de voz do roteiro do vídeo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un script video interesant despre:\n\n" . $description . "\n\nTonul vocii al scriptului video trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết kịch bản video thú vị về:\n\n" . $description . "\n\nGiọng nói của kịch bản video phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika hati ya video ya kuvutia kuhusu:\n\n" . $description. "\n\nToni ya sauti ya hati ya video lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite zanimiv video scenarij o:\n\n" . $description. "\n\nTon glasu video scenarija mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

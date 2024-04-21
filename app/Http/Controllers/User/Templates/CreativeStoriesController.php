<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class CreativeStoriesController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCreativeStoriesPrompt($description, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                    $prompt = "Write a creative story about:\n\n" . $description . "\n\nTone of voice of the story must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب قصة إبداعية عن:\n\n". $description. "\n\nيجب أن تكون نغمة الصوت في القصة: \ n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一个有创意的故事：\n\n". $description. "\n\n故事的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite kreativnu priču o:\n\n" . $description. "\n\nTon glasa priče mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište kreativní příběh o:\n\n" . $description . "\n\nTón hlasu příběhu musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en kreativ historie om:\n\n" . $description. "\n\nTone i historien skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een creatief verhaal over:\n\n" . $description . "\n\nDe toon van het verhaal moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage loov lugu teemal:\n\n" . $description . "\n\nLoo hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita luova tarina aiheesta:\n\n" . $description . "\n\nTarinan äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Ecrire une histoire créative sur :\n\n" . $description . "\n\nLe ton de la voix de l'histoire doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreibe eine kreative Geschichte über:\n\n" . $description . "\n\nTonfall der Geschichte muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια δημιουργική ιστορία για:\n\n" . $description. "\n\nΟ τόνος της φωνής της ιστορίας πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב סיפור יצירתי על:\n\n" . $description. "\n\nטון הדיבור של הסיפור חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "के बारे में एक रचनात्मक कहानी लिखें:\n\n" . $description. "\n\nकहानी का स्वर ऐसा होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon kreatív történetet erről:\n\n" . $description . "\n\nA történet hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu skapandi sögu um:\n\n" . $description. "\n\nTónn í sögunni verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis cerita kreatif tentang:\n\n" . $description . "\n\nNada suara cerita harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una storia creativa su:\n\n" . $description . "\n\nIl tono di voce della storia deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次のようなクリエイティブなストーリーを書きましょう:\n\n" . $description. "\n\nストーリーの声のトーンは次のとおりでなければなりません:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 창의적인 이야기 쓰기:\n\n" . $description . "\n\n이야기의 목소리 톤은 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis cerita kreatif tentang:\n\n" . $description . "\n\nNada suara cerita mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en kreativ historie om:\n\n" . $description . "\n\nTone i historien må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz kreatywną historię na temat:\n\n" . $description . "\n\nTon opowieści musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma história criativa sobre:\n\n" . $description. "\n\nTom de voz da história deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите творческую историю о:\n\n" . $description . "\n\nТон голоса истории должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe una historia creativa sobre:\n\n" . $description . "\n\nEl tono de voz de la historia debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en kreativ berättelse om:\n\n" . $description . "\n\nTonfallet i berättelsen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun hakkında yaratıcı bir hikaye yaz:\n\n" . $description. "\n\nHikayenin ses tonu şöyle olmalı:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva uma história criativa sobre:\n\n" . $description. "\n\nTom de voz da história deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o poveste creativă despre:\n\n". $description . "\n\nTonul vocii al poveștii trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một câu chuyện sáng tạo về:\n\n" . $description . "\n\nGiọng điệu của câu chuyện phải:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika hadithi ya ubunifu kuhusu:\n\n" . $description. "\n\nToni ya sauti ya hadithi lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite ustvarjalno zgodbo o:\n\n" . $description. "\n\nTon glasu zgodbe mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class SummarizeTextController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSummarizeTextPrompt($text, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Summarize this text in a short concise way:\n\n" . $text . "\n\nTone of summary must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "لخص هذا النص بإيجاز قصير:\n\n". $text. "\n\nيجب أن تكون نغمة التلخيص:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "用简短的方式总结这段文字：\n\n" . $text . "\n\n摘要语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Ukratko sažeti ovaj tekst:\n\n" . $text. "\n\nTon sažetka mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Shrňte tento text krátkým výstižným způsobem:\n\n" . $text . "\n\nTón shrnutí musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Opsummer denne tekst på en kort og præcis måde:\n\n" . $text. "\n\nTone i resumé skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Vat deze tekst kort en bondig samen:\n\n" . $text . "\n\nDe toon van de samenvatting moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Tehke see tekst lühidalt kokkuvõtlikult:\n\n" . $text . "\n\nKokkuvõtte toon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Tee tämä teksti lyhyesti ytimekkäästi:\n\n" . $text . "\n\nYhteenvedon äänen tulee olla:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Résumez ce texte de manière courte et concise :\n\n" . $text . "\n\nLe ton du résumé doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Fass diesen Text kurz und prägnant zusammen:\n\n" . $text . "\n\nTon der Zusammenfassung muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Συνοψήστε αυτό το κείμενο με σύντομο και συνοπτικό τρόπο:\n\n" . $text . "\n\nΟ τόνος της σύνοψης πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "סכם את הטקסט הזה בצורה קצרה תמציתית:\n\n" . $text . "\n\nטון הסיכום חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस पाठ को संक्षेप में संक्षेप में प्रस्तुत करें:\n\n" . $text . "\n\nसारांश का लहजा होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Összefoglalja ezt a szöveget röviden, tömören:\n\n" . $text . "\n\nAz összefoglaló hangjának a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Dregðu saman þennan texta á stuttan hnitmiðaðan hátt:\n\n" . $text. "\n\nTónn yfirlits verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Rangkum teks ini dengan cara yang singkat dan padat:\n\n" . $text . "\n\nNada ringkasan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Riassumi questo testo in modo breve e conciso:\n\n" . $text. "\n\nIl tono del riassunto deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "このテキストを短く簡潔に要約してください:\n\n" . $text . "\n\n要約のトーンは:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 텍스트를 짧고 간결하게 요약:\n\n" . $text . "\n\n요약 톤은 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Ringkaskan teks ini dengan cara ringkas yang ringkas:\n\n" . $text . "\n\nNada ringkasan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Opsummer denne teksten på en kortfattet måte:\n\n" . $text . "\n\nTone i sammendraget må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Podsumuj ten tekst w zwięzły sposób:\n\n" . $text . "\n\nTon podsumowania musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Resuma este texto de forma curta e concisa:\n\n" . $text . "\n\nO tom do resumo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Кратко изложите этот текст:\n\n" . $text . "\n\nТон резюме должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Resume este texto de forma breve y concisa:\n\n" . $text. "\n\nEl tono del resumen debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Sammanfatta den här texten på ett kortfattat sätt:\n\n" . $text . "\n\nTonen i sammanfattningen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu metni kısa ve öz bir şekilde özetleyin:\n\n" . $text. "\n\nÖzetin tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Resuma este texto de forma curta e concisa:\n\n" . $text . "\n\nO tom do resumo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Rezumați acest text într-un mod scurt și concis:\n\n" . $text  . "\n\nTonul rezumatului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tóm tắt văn bản này một cách ngắn gọn súc tích:\n\n" . $text  . "\n\nGiọng tóm tắt phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Fanya muhtasari wa maandishi haya kwa njia fupi fupi:\n\n" . $text . "\n\nToni ya muhtasari lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Povzemite to besedilo na kratek jedrnat način:\n\n" . $text . "\n\nTon povzetka mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }


}

<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class AcademicEssayController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAcademicEssayPrompt($title, $keywords, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                    $prompt = "Write an academic essay about:\n\n" . $title . "\n\nUse following keywords in the essay:\n" . $keywords . "\n\nTone of voice of the essay must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب مقالًا أكاديميًا حول:\n\n". $title . "\n\nاستخدم الكلمات الأساسية التالية في المقال:\n". $keywords. "\n\nيجب أن تكون نغمة صوت المقال:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一篇关于：\n\n”的学术论文". $title . "\n\n在文章中使用以下关键词：\n" . $keywords. "\n\n文章的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite akademski esej o:\n\n" . $title . "\n\nKoristite sljedeće ključne riječi u eseju:\n" . $keywords. "\n\nTon glasa eseja mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište akademickou esej o:\n\n" . $title . "\n\nV eseji použijte následující klíčová slova:\n" . $keywords . "\n\nTón hlasu eseje musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv et akademisk essay om:\n\n" . $title . "\n\nBrug følgende nøgleord i essayet:\n" . $keywords . "\n\nStemmetonen i essayet skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een academisch essay over:\n\n" . $title  . "\n\nGebruik de volgende trefwoorden in het essay:\n" . $keywords . "\n\nDe toon van het essay moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage akadeemiline essee teemal:\n\n" . $title  . "\n\nKasutage essees järgmisi märksõnu:\n" . $keywords. "\n\nEssee hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita akateeminen essee aiheesta:\n\n" . $title . "\n\nKäytä esseessä seuraavia avainsanoja:\n" . $keywords . "\n\nEsseen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une dissertation académique sur :\n\n" . $title . "\n\nUtilisez les mots clés suivants dans lessai :\n" . $keywords . "\n\nLe ton de la dissertation doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen akademischen Aufsatz über:\n\n" . $title  . "\n\nVerwenden Sie folgende Schlüsselwörter im Aufsatz:\n" . $keywords . "\n\nTonlage des Aufsatzes muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα ακαδημαϊκό δοκίμιο για:\n\n" . $title . "\n\nΧρησιμοποιήστε τις ακόλουθες λέξεις-κλειδιά στο δοκίμιο:\n" . $keywords. "\n\nΟ τόνος της φωνής του δοκιμίου πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב חיבור אקדמי על:\n\n" . $title . "\n\nהשתמש במילות המפתח הבאות במאמר:\n" . $keywords. "\n\nטון הדיבור של החיבור חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "के बारे में एक अकादमिक निबंध लिखें:\n\n" . $title . "\n\nनिबंध में निम्नलिखित कीवर्ड का प्रयोग करें:\n".$keywords."\n\nनिबंध का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon tudományos esszét erről:\n\n" . $title . "\n\nHasználja a következő kulcsszavakat az esszében:\n" . $keywords . "\n\nAz esszé hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu fræðilega ritgerð um:\n\n" . $title . "\n\nNotaðu eftirfarandi lykilorð í ritgerðinni:\n" . $keywords . "\n\nTónn í ritgerðinni verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis esai akademik tentang:\n\n" . $title  . "\n\nGunakan kata kunci berikut dalam esai:\n" . $keywords. "\n\nNada suara esai harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un saggio accademico su:\n\n" . $title  . "\n\nUsa le seguenti parole chiave nel saggio:\n" . $keywords. "\n\nIl tono di voce del saggio deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "以下について学術論文を書きます:\n\n" . $title . "\n\nエッセイでは次のキーワードを使用してください:\n" . $keywords . "\n\nエッセイの口調は:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 학술 에세이 쓰기:\n\n" . $title . "\n\n에세이에서 다음 키워드를 사용하십시오:\n" . $keywords . "\n\n에세이의 목소리 톤은 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis esei akademik tentang:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam esei:\n" . $keywords . "\n\nNada suara esei mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv et akademisk essay om:\n\n" . $title  . "\n\nBruk følgende nøkkelord i essayet:\n" . $keywords. "\n\nTone i essayet må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz esej akademicki na temat:\n\n". $title  . "\n\nUżyj w eseju następujących słów kluczowych:\n" . $keywords . "\n\nTon wypowiedzi w eseju musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um ensaio acadêmico sobre:\n\n" . $title  . "\n\nUse as seguintes palavras-chave no ensaio:\n" . $keywords. "\n\nTom de voz da redação deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите академическое эссе о:\n\n" . $title  . "\n\nИспользуйте следующие ключевые слова в эссе:\n" . $keywords . "\n\nТон голоса эссе должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un ensayo académico sobre:\n\n" . $title  . "\n\nUtilice las siguientes palabras clave en el ensayo:\n" . $keywords. "\n\nEl tono de voz del ensayo debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en akademisk uppsats om:\n\n" . $title  . "\n\nAnvänd följande nyckelord i uppsatsen:\n" . $keywords. "\n\nRösten i uppsatsen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun hakkında akademik bir makale yazın:\n\n" . $title . "\n\nMakalede şu anahtar kelimeleri kullanın:\n" . $keywords. "\n\nYazının ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um ensaio acadêmico sobre:\n\n" . $title  . "\n\nUse as seguintes palavras-chave no ensaio:\n" . $keywords . "\n\nTom de voz da redação deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un eseu academic despre:\n\n" . $title  . "\n\nFolosiți următoarele cuvinte cheie în eseu:\n" . $keywords . "\n\nTonul vocii al eseului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một bài luận học thuật về:\n\n" . $title . "\n\nSử dụng các từ khóa sau trong bài luận:\n" . $keywords . "\n\nGiọng điệu của bài luận phải:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika insha ya kitaaluma kuhusu:\n\n" . $title . "\n\nTumia manenomsingi yafuatayo katika insha:\n" . $keywords . "\n\nToni ya sauti ya insha lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite akademski esej o:\n\n" . $title . "\n\nV eseju uporabite naslednje ključne besede:\n" . $keywords. "\n\nTon glasu eseja mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

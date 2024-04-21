<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class ParagraphGeneratorController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createParagraphGeneratorPrompt($title, $keywords, $language, $tone) {
        
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
                    $prompt = "Write a large and meaningful paragraph on this topic:\n\n" . $title . "\n\nUse following keywords in the paragraph:\n" . $keywords . "\n\nTone of voice of the paragraph must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب فقرة كبيرة وذات مغزى حول هذا الموضوع:\n\n". $title. "\n\nاستخدم الكلمات الأساسية التالية في الفقرة:\n". $keywords. "\n\nيجب أن تكون نغمة الصوت في الفقرة:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "就此主题写一段有意义的长篇大论：\n\n" . $title. "\n\n在段落中使用以下关键字：\n" . $keywords. "\n\n段落的语气必须是：\n" . $tone_language . "\n\n----\n写的段落：\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite veliki i smisleni odlomak o ovoj temi:\n\n" . $title. "\n\nKoristite sljedeće ključne riječi u odlomku:\n" . $keywords. "\n\nTon glasa odlomka mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište velký a smysluplný odstavec na toto téma:\n\n" . $title . "\n\nV odstavci použijte následující klíčová slova:\n" . $keywords . "\n\nTón hlasu odstavce musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv et stort og meningsfuldt afsnit om dette emne:\n\n" . $title. "\n\nBrug følgende nøgleord i afsnittet:\n" . $keywords . "\n\nTone i afsnittet skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een grote en zinvolle paragraaf over dit onderwerp:\n\n" . $title . "\n\nGebruik de volgende trefwoorden in de alinea:\n" . $keywords . "\n\nDe toon van de alinea moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage sellel teemal suur ja sisukas lõik:\n\n" . $title . "\n\nKasutage lõigus järgmisi märksõnu:\n" . $keywords . "\n\nLõigu hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita tästä aiheesta suuri ja merkityksellinen kappale:\n\n" . $title . "\n\nKäytä kappaleessa seuraavia avainsanoja:\n" . $keywords . "\n\nKappaleen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez un paragraphe long et significatif sur ce sujet :\n\n" . $title . "\n\nUtilisez les mots clés suivants dans le paragraphe :\n" . $keywords . "\n\nLe ton de la voix du paragraphe doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen großen und aussagekräftigen Absatz zu diesem Thema:\n\n" . $title . "\n\nVerwenden Sie folgende Schlüsselwörter im Absatz:\n" . $keywords . "\n\nTonlage des Absatzes muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια μεγάλη και ουσιαστική παράγραφο για αυτό το θέμα:\n\n" . $title . "\n\nΧρησιμοποιήστε τις ακόλουθες λέξεις-κλειδιά στην παράγραφο:\n" . $keywords . "\n\nΟ τόνος της φωνής της παραγράφου πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב פסקה גדולה ומשמעותית בנושא זה:\n\n" . $title . "\n\nהשתמש במילות המפתח הבאות בפסקה:\n" . $keywords. "\n\nטון הדיבור של הפסקה חייב להיות:\n" . $tone_languag . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस विषय पर एक बड़ा और सार्थक पैराग्राफ लिखें:\n\n" . $title. "\n\nपैराग्राफ में निम्नलिखित कीवर्ड का प्रयोग करें:\n" .$keywords. "\n\nपैराग्राफ की आवाज़ का स्वर होना चाहिए:\n" .$tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írj egy nagy és értelmes bekezdést erről a témáról:\n\n" . $title . "\n\nHasználja a következő kulcsszavakat a bekezdésben:\n" . $keywords . "\n\nA bekezdés hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu stóra og þýðingarmikla málsgrein um þetta efni:\n\n" . $title. "\n\nNotaðu eftirfarandi leitarorð í málsgreininni:\n" . $keywords. "\n\nTónn málsgreinarinnar verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis paragraf yang besar dan bermakna tentang topik ini:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam paragraf:\n" . $keywords . "\n\nNada suara paragraf harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un paragrafo ampio e significativo su questo argomento:\n\n" . $title . "\n\nUsare le seguenti parole chiave nel paragrafo:\n" . $keywords. "\n\nIl tono di voce del paragrafo deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "このトピックについて大きくて意味のある段落を書いてください:\n\n" . $title. "\n\n段落内で次のキーワードを使用してください:\n" . $keywords . "\n\n段落の口調は次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 주제에 대해 크고 의미 있는 단락 작성:\n\n" . $title . "\n\n단락에서 다음 키워드를 사용하십시오:\n" . $keywords . "\n\n문단의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis perenggan yang besar dan bermakna tentang topik ini:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam perenggan:\n" . $keywords . "\n\nNada suara perenggan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv et stort og meningsfullt avsnitt om dette emnet:\n\n" . $title . "\n\nBruk følgende nøkkelord i avsnittet:\n" . $keywords . "\n\nTone i avsnittet må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt = "Napisz duży i znaczący akapit na ten temat:\n\n" . $title . "\n\nUżyj następujących słów kluczowych w akapicie:\n" . $keywords . "\n\nTon głosu akapitu musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um parágrafo grande e significativo sobre este tópico:\n\n" . $title . "\n\nUse as seguintes palavras-chave no parágrafo:\n" . $keywords . "\n\nTom de voz do parágrafo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите большой и осмысленный абзац на эту тему:\n\n" . $title . "\n\nИспользуйте следующие ключевые слова в абзаце:\n" . $keywords . "\n\nТон абзаца должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un párrafo extenso y significativo sobre este tema:\n\n" . $title. "\n\nUtilice las siguientes palabras clave en el párrafo:\n" . $keywords. "\n\nEl tono de voz del párrafo debe ser:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett stort och meningsfullt stycke om detta ämne:\n\n" . $title . "\n\nAnvänd följande nyckelord i stycket:\n" . $keywords . "\n\nTonfallet i stycket måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu konu hakkında geniş ve anlamlı bir paragraf yaz:\n\n" . $title . "\n\nParagrafta şu anahtar sözcükleri kullanın:\n" . $keywords . "\n\nParagrafın ses tonu şöyle olmalıdır:\n" . $tone_language ."\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva um parágrafo grande e significativo sobre este tópico:\n\n" . $title . "\n\nUse as seguintes palavras-chave no parágrafo:\n" . $keywords . "\n\nTom de voz do parágrafo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un paragraf mare și semnificativ pe acest subiect:\n\n" . $title . "\n\nFolosiți următoarele cuvinte cheie în paragraf:\n" . $keywords. "\n\nTonul vocii al paragrafului trebuie să fie:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một đoạn văn lớn và có ý nghĩa về chủ đề này:\n\n" . $title . "\n\nSử dụng các từ khóa sau trong đoạn văn:\n" . $keywords. "\n\nGiọng điệu của đoạn phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika aya kubwa na yenye maana juu ya mada hii:\n\n" . $title. "\n\nTumia manenomsingi yafuatayo katika aya:\n" . $keywords . "\n\nToni ya sauti ya aya lazima iwe:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite velik in smiseln odstavek o tej temi:\n\n" . $title. "\n\nV odstavku uporabite naslednje ključne besede:\n" . $keywords. "\n\nTon glasu odstavka mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

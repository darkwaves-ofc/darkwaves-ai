<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class ArticleGeneratorController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createArticleGeneratorPrompt($title, $keywords, $language, $tone) {
        
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
                    $prompt = "Write a complete article on this topic:\n\n" . $title . "\n\nUse following keywords in the article:\n" . $keywords . "\n\nTone of voice of the article must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب مقالة حول هذا الموضوع:\n\n". $title. "\n\nاستخدم الكلمات الأساسية التالية في المقالة:\n". $keywords. "\n\nيجب أن تكون نغمة صوت المقالة:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一篇关于这个主题的文章：\n\n" . $title. "\n\n在文章中使用以下关键字：\n" . $keywords . "\n\n文章的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite članak na ovu temu:\n\n" . $title . "\n\nKoristite sljedeće ključne riječi u članku:\n" . $keywords . "\n\nTon glasa u članku mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište článek na toto téma:\n\n" . $title . "\n\nV článku použijte následující klíčová slova:\n" . $keywords . "\n\nTón hlasu článku musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en artikel om dette emne:\n\n" . $title. "\n\nBrug følgende søgeord i artiklen:\n" . $keywords. "\n\nTone i artiklen skal være:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een artikel over dit onderwerp:\n\n" . $title. "\n\nGebruik de volgende trefwoorden in het artikel:\n" . $keywords. "\n\nDe toon van het artikel moet zijn:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage sellel teemal artikkel:\n\n" . $title. "\n\nKasutage artiklis järgmisi märksõnu:\n" . $keywords. "\n\nArtikli hääletoon peab olema:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita artikkeli tästä aiheesta:\n\n" . $title. "\n\nKäytä artikkelissa seuraavia avainsanoja:\n" . $keywords. "\n\nArtikkelin äänensävyn on oltava:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Ecrire un article sur ce sujet :\n\n" . $title . "\n\nUtilisez les mots clés suivants dans l'article :\n" . $keywords . "\n\nLe ton de la voix de l'article doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen Artikel zu diesem Thema:\n\n" . $title . "\n\nVerwenden Sie folgende Schlüsselwörter im Artikel:\n" . $keywords . "\n\nTonfall des Artikels muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα άρθρο για αυτό το θέμα:\n\n" . $title. "\n\nΧρησιμοποιήστε τις ακόλουθες λέξεις-κλειδιά στο άρθρο:\n" . $keywords. "\n\nΟ τόνος της φωνής του άρθρου πρέπει να είναι:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב מאמר בנושא זה:\n\n" . $title . "\n\nהשתמש במילות המפתח הבאות במאמר:\n" . $keywords . "\n\nטון הדיבור של המאמר חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस विषय पर एक लेख लिखें:\n\n" .$title. "\n\nलेख में निम्नलिखित कीवर्ड का प्रयोग करें:\n" . $keywords . "\n\nलेख का स्वर इस प्रकार होना चाहिए:\n" . $tone_language ."\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon cikket erről a témáról:\n\n" . $title. "\n\nHasználja a következő kulcsszavakat a cikkben:\n" . $keywords. "\n\nA cikk hangnemének a következőnek kell lennie:\n" . $tone_language. "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu grein um þetta efni:\n\n" . $title. "\n\nNotaðu eftirfarandi leitarorð í greininni:\n" . $keywords. "\n\nTónn í greininni verður að vera:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis artikel tentang topik ini:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam artikel:\n" . $keywords . "\n\nNada suara artikel harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un articolo su questo argomento:\n\n" . $title . "\n\nUsa le seguenti parole chiave nell'articolo:\n" . $keywords . "\n\nIl tono di voce dell'articolo deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "このトピックに関する記事を書いてください:\n\n" . $title . "\n\n記事では次のキーワードを使用してください:\n" . $keywords . "\n\n記事の口調は次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 주제에 대한 기사 쓰기:\n\n" . $title . "\n\n문서에서 다음 키워드를 사용하십시오:\n" . $keywords . "\n\n기사의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis artikel tentang topik ini:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam artikel:\n" . $keywords . "\n\nNada suara artikel mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en artikkel om dette emnet:\n\n" . $title . "\n\nBruk følgende nøkkelord i artikkelen:\n" . $keywords . "\n\nTone i artikkelen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt = "Napisz artykuł na ten temat:\n\n" . $title . "\n\nUżyj w artykule następujących słów kluczowych:\n" . $keywords . "\n\nTon wypowiedzi artykułu musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um artigo sobre este tópico:\n\n" . $title . "\n\nUse as seguintes palavras-chave no artigo:\n" . $keywords . "\n\nTom de voz do artigo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите статью на эту тему:\n\n" . $title . "\n\nИспользуйте в статье следующие ключевые слова:\n" . $keywords . "\n\nТон озвучивания статьи должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un artículo sobre este tema:\n\n" . $title. "\n\nUtilice las siguientes palabras clave en el artículo:\n" . $keywords. "\n\nEl tono de voz del artículo debe ser:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en artikel om detta ämne:\n\n" . $title . "\n\nAnvänd följande nyckelord i artikeln:\n" . $keywords . "\n\nTonfallet för artikeln måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu konuda bir makale yaz:\n\n" . $title . "\n\nMakalede şu anahtar kelimeleri kullanın:\n" . $keywords . "\n\nYazının ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva um artigo sobre este tópico:\n\n" . $title . "\n\nUse as seguintes palavras-chave no artigo:\n" . $keywords . "\n\nTom de voz do artigo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un articol complet pe acest subiect:\n\n" . $title . "\n\nFolosiți următoarele cuvinte cheie în articol:\n" . $keywords . "\n\nTonul vocii al articolului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một bài hoàn chỉnh về chủ đề này:\n\n" . $title . "\n\nSử dụng các từ khóa sau trong bài viết:\n" . $keywords . "\n\nGiọng điệu của bài viết phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika makala kamili kuhusu mada hii:\n\n" . $title. "\n\nTumia manenomsingi yafuatayo katika makala:\n" . $keywords. "\n\nToni ya sauti ya makala lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite celoten članek o tej temi:\n\n" . $title. "\n\n članku uporabite naslednje ključne besede:\n" . $keywords. "\n\nTon glasu članka mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

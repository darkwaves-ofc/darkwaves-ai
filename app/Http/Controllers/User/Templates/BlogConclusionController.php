<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class BlogConclusionController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBlogConclusionPrompt($title, $description, $language, $tone) {
        
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
                    $prompt = "Write a blog article conclusion for:\n\n" . $description . "\n\n Blog article title:\n" . $title . "\n\nTone of voice of the conclusion must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب مقالاً ختامياً لـ:\n\n". $description. "\n\nعنوان مقالة المدونة:\n". $title. "\n\n يجب أن تكون نغمة صوت الاستنتاج:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下内容写一篇博客文章结论：\n\n" . $description. "\n\n 博客文章标题：\n" . $title . "\n\n结论的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite zaključak članka na blogu za:\n\n" . $description. "\n\n Naslov članka na blogu:\n" . $title. "\n\nTon glasa zaključka mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište závěr článku blogu pro:\n\n" . $description . "\n\n Název článku blogu:\n" . $title . "\n\nTón hlasu závěru musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en blogartikel konklusion for:\n\n" . $description. "\n\n Blogartikeltitel:\n" . $title. "\n\nTone i konklusionen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een conclusie van een blogartikel voor:\n\n" . $description . "\n\n Titel blogartikel:\n" . $title . "\n\nDe toon van de conclusie moet zijn:\n" . $tone_language  . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage blogiartikli järeldus:\n\n" . $description . "\n\n Blogi artikli pealkiri:\n" . $title . "\n\nJärelduse hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita blogiartikkelin päätelmä:\n\n" . $description . "\n\n Blogiartikkelin otsikko:\n" . $title . "\n\nJohtopäätöksen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une conclusion d'article de blog pour :\n\n" . $description . "\n\n Titre de l'article du blog :\n" . $title . "\n\nLe ton de la voix de la conclusion doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen Blogartikel-Abschluss für:\n\n" . $description . "\n\n Titel des Blog-Artikels:\n" . $title . "\n\nTonfall der Schlussfolgerung muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα συμπέρασμα άρθρου ιστολογίου για:\n\n" . $description . "\n\n Τίτλος άρθρου ιστολογίου:\n" . $title . "\n\nΟ τόνος της φωνής του συμπεράσματος πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב מסקנת מאמר בבלוג עבור:\n\n" . $description . "\n\n כותרת מאמר הבלוג:\n" . $title . "\n\nטון הדיבור של המסקנה חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इसके लिए एक ब्लॉग लेख निष्कर्ष लिखें:\n\n" .$description. "\n\n ब्लॉग लेख का शीर्षक:\n" . $title. "\n\nनिष्कर्ष की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon blogcikk következtetést:\n\n" . $description . "\n\n Blog cikk címe:\n" . $title . "\n\nA következtetés hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu niðurstöðu blogggreinar fyrir:\n\n" . $description. "\n\n Titill blogggreinar:\n" . $title. "\n\nTónn í niðurstöðunni verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis kesimpulan artikel blog untuk:\n\n" . $description . "\n\n Judul artikel blog:\n" . $title . "\n\nNada suara kesimpulan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi la conclusione di un articolo di blog per:\n\n" . $description . "\n\n Titolo articolo blog:\n" . $title . "\n\nIl tono di voce della conclusione deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次のブログ記事の結論を書きます:\n\n" . $description. "\n\n ブログ記事のタイトル:\n" . $title. "\n\n結論の口調は:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 블로그 기사 결론 쓰기:\n\n" . $description . "\n\n 블로그 기사 제목:\n" . $title . "\n\n결론의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "다음에 대한 블로그 기사 결론 쓰기:\n\n" . $description . "\n\n 블로그 기사 제목:\n" . $title. "\n\n결론의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en bloggartikkelkonklusjon for:\n\n" . $description . "\n\n Bloggartikkeltittel:\n" . $title . "\n\nTone i konklusjonen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz zakończenie artykułu na blogu dla:\n\n" . $description. "\n\n Tytuł artykułu na blogu:\n" . $title . "\n\nTon wniosku musi być następujący:\n" . $tone_language  . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma conclusão de artigo de blog para:\n\n" . $description. "\n\n Título do artigo do blog:\n" . $title . "\n\nTom de voz da conclusão deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите вывод статьи в блоге для:\n\n" . $description . "\n\n Название статьи в блоге:\n" . $title . "\n\nТон голоса заключения должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe la conclusión de un artículo de blog para:\n\n" . $description . "\n\n Título del artículo del blog:\n" . $title . "\n\nEl tono de voz de la conclusión debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en bloggartikelavslutning för:\n\n" . $description . "\n\n Bloggartikeltitel:\n" . $title . "\n\nTonfallet för slutsatsen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bir blog makalesi sonucu yaz:\n\n" . $description. "\n\n Blog makalesi başlığı:\n" . $title. "\n\nSonuçtaki ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva uma conclusão de artigo de blog para:\n\n" . $description. "\n\n Título do artigo do blog:\n" . $title . "\n\nTom de voz da conclusão deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o concluzie a unui articol de blog pentru:\n\n" . $description . "\n\n Titlul articolului de blog:\n" . $title . "\n\nTonul de voce al concluziei trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết kết luận bài viết trên blog cho:\n\n" . $description . "\n\n Tiêu đề bài viết trên blog:\n" . $title . "\n\nGiọng kết luận phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika hitimisho la makala ya blogu ya:\n\n" . $description. "\n\n Jina la makala ya blogu:\n" . $title. "\n\nToni ya sauti ya hitimisho lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite zaključek članka v blogu za:\n\n" . $description. "\n\n Naslov članka v blogu:\n" . $title. "\n\nTon sklepa mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

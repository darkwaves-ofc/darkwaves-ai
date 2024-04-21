<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class BlogIntrosController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBlogIntrosPrompt($title, $description, $language, $tone) {
        
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
                    $prompt = "Write an interesting blog post intro about:\n\n" . $description . "\n\n Blog post title:\n" . $title . "\n\nTone of voice of the blog intro must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب مقدمة مدونة شيقة عن:\n\n". $description. "\n\nعنوان منشور المدونة:\n". $title. "\n\nيجب أن تكون نغمة الصوت في مقدمة المدونة:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一篇有趣的博客文章介绍：\n\n". $description. "\n\n 博文标题：\n" . $title. "\n\n博客介绍的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite uvod u zanimljiv blog post o:\n\n" . $description. "\n\n Naslov posta na blogu:\n" . $title. "\n\nTon glasa uvoda u blog mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište zajímavý úvod do blogového příspěvku o:\n\n" . $description . "\n\n Název příspěvku na blogu:\n" . $title . "\n\nTón hlasu úvodu blogu musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv et interessant blogindlæg om:\n\n" . $description. "\n\n Blogindlægs titel:\n" . $title. "\n\nTone i blogintroen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een interessante blogpost-intro over:\n\n" . $description . "\n\n Titel blogpost:\n" . $title . "\n\nDe toon van de blogintro moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage huvitav blogipostituse tutvustus teemal:\n\n" . $description . "\n\n Blogipostituse pealkiri:\n" . $title . "\n\nBlogi sissejuhatuse hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita mielenkiintoinen blogikirjoituksen esittely aiheesta:\n\n" . $description . "\n\n Blogiviestin otsikko:\n" . $title . "\n\nBlogin johdannon äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une introduction intéressante sur :\n\n" . $description . "\n\n Titre de l'article de blog :\n" . $title . "\n\nLe ton de la voix de l'intro du blog doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine interessante Einführung in einen Blog-Beitrag über:\n\n" . $description . "\n\n Titel des Blogposts:\n" . $title . "\n\nTonlage des Blog-Intros muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια ενδιαφέρουσα εισαγωγή δημοσίευσης ιστολογίου σχετικά με:\n\n" . $description . "\n\n Τίτλος ανάρτησης ιστολογίου:\n" . $title . "\n\nΟ τόνος της φωνής της εισαγωγής του ιστολογίου πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב מבוא פוסט מעניין בבלוג על:\n\n" . $description . "\n\n כותרת פוסט הבלוג:\n" . $title . "\n\nטון הדיבור של ההקדמה לבלוג חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस बारे में एक रोचक ब्लॉग पोस्ट परिचय लिखें:\n\n" .$description. "\n\n ब्लॉग पोस्ट शीर्षक:\n" . $title. "\n\nब्लॉग के परिचय का स्वर होना चाहिए:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon érdekes blogbejegyzést erről:\n\n" . $description . "\n\n Blogbejegyzés címe:\n" . $title . "\n\nA blogbevezető hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu áhugaverða bloggfærslu um:\n\n" . $description. "\n\n Titill bloggfærslu:\n" . $title. "\n\nTónn í blogginngangi verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis pengantar postingan blog yang menarik tentang:\n\n" . $description . "\n\n Judul entri blog:\n" . $title . "\n\nNada suara intro blog harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un'interessante introduzione al post del blog su:\n\n" . $description . "\n\n Titolo del post del blog:\n" . $title . "\n\nIl tono di voce dell'introduzione del blog deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "興味深いブログ投稿の紹介を書いてください:\n\n" . $description. "\n\n ブログ記事のタイトル:\n" . $title. "\n\nブログのイントロのトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 흥미로운 블로그 게시물 소개 작성:\n\n" . $description . "\n\n 블로그 게시물 제목:\n" . $title . "\n\n블로그 소개의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis intro catatan blog yang menarik tentang:\n\n" . $description . "\n\n Tajuk catatan blog:\n" . $title . "\n\nNada suara intro blog mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en interessant introduksjon til blogginnlegg om:\n\n" . $description . "\n\n Tittel på blogginnlegg:\n" . $title . "\n\nTone i bloggintroen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz interesujące wprowadzenie do wpisu na blogu na temat:\n\n" . $description . "\n\n Tytuł wpisu na blogu:\n" . $title . "\n\nTon głosu we wstępie do bloga musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma introdução de postagem de blog interessante sobre:\n\n" . $description. "\n\n Título da postagem do blog:\n" . $title . "\n\nTom de voz da introdução do blog deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите интересное введение в блог о:\n\n" . $description . "\n\n Заголовок сообщения в блоге:\n" . $title . "\n\nТон озвучивания вступления блога должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe una introducción de blog interesante sobre:\n\n" . $description . "\n\n Título de la publicación del blog:\n" . $title . "\n\nEl tono de voz de la intro del blog debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett intressant blogginlägg om:\n\n" . $description . "\n\n Blogginläggets titel:\n" . $title . "\n\nRöst i bloggintrot måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şununla ilgili ilginç bir blog yazısı yaz:\n\n" . $description. "\n\n Blog gönderisi başlığı:\n" . $title. "\n\nBlog girişinin ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva uma introdução de postagem de blog interessante sobre:\n\n" . $description. "\n\n Título da postagem do blog:\n" . $title . "\n\nTom de voz da introdução do blog deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o prezentare interesantă pe blog despre:\n\n" . $description . "\n\n Titlul postării de blog:\n" . $title . "\n\nTonul de voce al introducerii pe blog trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một bài đăng blog thú vị giới thiệu về:\n\n" . $description . "\n\n Tiêu đề bài đăng trên blog:\n" . $title . "\n\nGiọng nói của phần giới thiệu blog phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika utangulizi wa chapisho la kuvutia la blogu kuhusu:\n\n" . $description. "\n\n Jina la chapisho la blogu:\n" . $title. "\n\nToni ya sauti ya utangulizi wa blogu lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite zanimivo uvodno objavo v spletnem dnevniku o:\n\n" . $description. "\n\n Naslov objave v spletnem dnevniku:\n" . $title. "\n\nTon glasu uvoda v spletni dnevnik mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }


}

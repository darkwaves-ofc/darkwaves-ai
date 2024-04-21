<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class BlogIdeasController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBlogIdeasPrompt($title, $language, $tone) {
        
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
                    $prompt = "Write interesting blog ideas and outline about:\n\n" . $title . "\n\n Tone of voice of the ideas must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب أفكار مدونة ممتعة وحدد مخططًا تفصيليًا حول:\n\n".$title. "\n\nيجب أن تكون نبرة صوت الأفكار:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写下有趣的博客想法和大纲：\n\n" . $title. "\n\n 想法的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite zanimljive ideje za blog i skicirajte o:\n\n" . $title. "\n\n Ton glasa ideja mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Pište zajímavé nápady na blog a přehled o:\n\n" . $title . "\n\n Tón hlasu nápadů musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv interessante blogideer og skitser om:\n\n" . $title. "\n\n Tonen i ideerne skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf interessante blogideeën en schets over:\n\n" . $title . "\n\n De toon van de ideeën moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage huvitavaid ajaveebi ideid ja kirjeldage:\n\n" . $title . "\n\n Ideede hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita mielenkiintoisia blogiideoita ja hahmotelkaa aiheesta:\n\n" . $title . "\n\n Ideoiden äänensävyn tulee olla:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez des idées de blog intéressantes et décrivez :\n\n" . $title . "\n\n Le ton de la voix des idées doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie interessante Blog-Ideen und skizzieren Sie über:\n\n" . $title . "\n\n Tonfall der Ideen muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ενδιαφέρουσες ιδέες ιστολογίου και περιγράψτε τα σχετικά:\n\n" . $title . "\n\n Ο τόνος της φωνής των ιδεών πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב רעיונות מעניינים לבלוג ותאר את:\n\n" . $title . "\n\n טון הדיבור של הרעיונות חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "दिलचस्प ब्लॉग विचार लिखें और इसके बारे में रूपरेखा लिखें:\n\n" . $title. "\n\n विचारों का स्वर होना चाहिए:\n" .$tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon érdekes blogötleteket és vázlatot erről:\n\n" . $title . "\n\n Az ötletek hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu áhugaverðar blogghugmyndir og gerðu grein fyrir:\n\n" . $title. "\n\n Rödd hugmyndanna verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis ide blog yang menarik dan uraikan tentang:\n\n" . $title . "\n\n Nada suara ide harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi interessanti idee per il blog e delinea su:\n\n" . $title . "\n\n Il tono di voce delle idee deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "興味深いブログのアイデアと概要を書きます:\n\n" . $title. "\n\n アイデアの口調は次のとおりでなければなりません:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "흥미로운 블로그 아이디어를 작성하고 다음에 대한 개요를 작성하세요.\n\n" . $title . "\n\n 아이디어의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis idea blog yang menarik dan gariskan tentang:\n\n" . $title . "\n\n Nada suara idea mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv interessante bloggideer og skisser om:\n\n" . $title . "\n\n Tonen til ideene må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz ciekawe pomysły na bloga i zarys tematu:\n\n" . $title . "\n\n Ton głosu pomysłów musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva ideias de blog interessantes e descreva sobre:\n\n" . $title . "\n\n Tom de voz das ideias deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите интересные идеи для блога и расскажите о:\n\n" . $title . "\n\n Тон голоса идей должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba ideas de blog interesantes y esboce sobre:\n\n" . $title . "\n\n El tono de voz de las ideas debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv intressanta bloggidéer och beskriv:\n\n" . $title . "\n\n Tonen i idéerna måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "İlginç blog fikirleri yazın ve hakkında ana hatları çizin:\n\n" . $title. "\n\n Fikirlerin ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva ideias de blog interessantes e descreva sobre:\n\n" . $title . "\n\n Tom de voz das ideias deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrie idei interesante de blog și schiță despre:\n\n" . $title . "\n\n Tonul vocii ideilor trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết ý tưởng blog thú vị và phác thảo về:\n\n" . $title . "\n\n Giọng điệu của các ý tưởng phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika mawazo ya kuvutia ya blogu na muhtasari kuhusu:\n\n" . $title. "\n\n Toni ya sauti ya mawazo lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite zanimive ideje za blog in orišite o:\n\n" . $title. "\n\n Ton glasu idej mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

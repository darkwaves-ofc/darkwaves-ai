<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class VideoDescriptionsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVideoDescriptionsPrompt($description, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return false;

        switch ($language) {
            case 'en-US':
                    $prompt = "Write compelling YouTube description to get people interested in watching.\n\nVideo description:\n" . $description . "\n\nTone of voice of the video description must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب وصفًا مقنعًا على YouTube لجذب اهتمام الأشخاص بالمشاهدة.\n\n وصف الفيديو:\n". $description. "\n\nيجب أن تكون نغمة الصوت في وصف الفيديو:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "撰写引人注目的 YouTube 说明，让人们有兴趣观看。\n\n视频说明：\n" . $description. "\n\n视频描述的语气必须是：\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite uvjerljiv YouTube opis kako biste zainteresirali ljude za gledanje.\n\nOpis videozapisa:\n" . $description. "\n\nTon glasa opisa videa mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište působivý popis na YouTube, aby se lidé zajímali o sledování.\n\nPopis videa:\n" . $description . "\n\nTón hlasu popisu videa musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en overbevisende YouTube-beskrivelse for at få folk interesseret i at se.\n\nVideobeskrivelse:\n" . $description. "\n\nTone i videobeskrivelsen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een overtuigende YouTube-beschrijving om mensen te interesseren om te kijken.\n\nVideobeschrijving:\n" . $description . "\n\nDe toon van de videobeschrijving moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage ahvatlev YouTube'i kirjeldus, et tekitada inimestes vaatamisest huvi.\n\nVideo kirjeldus:\n" . $description . "\n\nVideo kirjelduse hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita houkutteleva YouTube-kuvaus saadaksesi ihmiset kiinnostumaan katselusta.\n\nVideon kuvaus:\n" . $description . "\n\nVideon kuvauksen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une description YouTube convaincante pour intéresser les internautes.\n\nDescription de la vidéo :\n" . $description . "\n\nLe ton de la description de la vidéo doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine überzeugende YouTube-Beschreibung, um das Interesse der Zuschauer zu wecken.\n\nVideobeschreibung:\n" . $description . "\n\nTonfall der Videobeschreibung muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια συναρπαστική περιγραφή στο YouTube για να κάνετε τους ανθρώπους να ενδιαφέρονται να παρακολουθήσουν.\n\nΠεριγραφή βίντεο:\n" . $description . "\n\nΟ τόνος της φωνής της περιγραφής του βίντεο πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב תיאור משכנע של YouTube כדי לגרום לאנשים להתעניין בצפייה.\n\nתיאור הסרטון:\n" . $description . "\n\nטון הדיבור של תיאור הסרטון חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "लोगों को देखने में रुचि लेने के लिए आकर्षक YouTube विवरण लिखें।\n\nवीडियो विवरण:\n" .$description."\n\nवीडियो विवरण का स्वर इस प्रकार होना चाहिए:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon lenyűgöző YouTube-leírást, hogy felkeltse az emberek érdeklődését a megtekintés iránt.\n\nVideó leírása:\n" . $description . "\n\nA videó leírásának hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu sannfærandi YouTube lýsingu til að vekja áhuga fólks á að horfa.\n\nLýsing myndskeiðs:\n" . $description. "\n\nTónn í lýsingu myndbandsins verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis deskripsi YouTube yang menarik agar orang tertarik menonton.\n\nDeskripsi video:\n" . $description . "\n\nNada suara deskripsi video harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una descrizione accattivante per YouTube per attirare l'interesse delle persone a guardarlo.\n\nDescrizione del video:\n" . $description . "\n\nIl tono di voce della descrizione del video deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "魅力的な YouTube の説明を書いて、視聴者に興味を持ってもらいましょう。\n\n動画の説明:\n" . $description. "\n\nビデオの説明のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "사람들이 시청에 관심을 갖도록 설득력 있는 YouTube 설명을 작성하세요.\n\n동영상 설명:\n" . $description. "\n\n동영상 설명의 음성 톤은 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis perihalan YouTube yang menarik untuk menarik minat orang untuk menonton.\n\nPerihalan video:\n" . $description . "\n\nNada suara penerangan video mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv overbevisende YouTube-beskrivelse for å få folk interessert i å se.\n\nVideobeskrivelse:\n" . $description . "\n\nTone i videobeskrivelsen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz przekonujący opis w YouTube, aby zainteresować ludzi oglądaniem.\n\nOpis filmu:\n" . $description. "\n\nTon głosu w opisie filmu musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma descrição atraente do YouTube para atrair o interesse das pessoas em assistir.\n\nDescrição do vídeo:\n" . $description. "\n\nTom de voz da descrição do vídeo deve ser:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите привлекательное описание для YouTube, чтобы заинтересовать людей.\n\nОписание видео:\n" . $description. "\n\nТон описания видео должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe una descripción convincente de YouTube para que las personas se interesen en verlo.\n\nDescripción del video:\n" . $description . "\n\nEl tono de voz de la descripción del video debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv övertygande YouTube-beskrivning för att få folk intresserade av att titta.\n\nVideobeskrivning:\n" . $description . "\n\nRösttonen i videobeskrivningen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "İnsanların izlemekle ilgilenmesini sağlamak için etkileyici bir YouTube açıklaması yazın.\n\nVideo açıklaması:\n" . $description. "\n\nVideo açıklamasının ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva uma descrição atraente do YouTube para atrair o interesse das pessoas em assistir.\n\nDescrição do vídeo:\n" . $description. "\n\nTom de voz da descrição do vídeo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o descriere YouTube convingătoare pentru a-i determina pe oameni să fie interesați de vizionare.\n\nDescrierea videoclipului:\n" . $description . "\n\nTonul de voce al descrierii videoclipului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết mô tả YouTube hấp dẫn để thu hút mọi người thích xem.\n\nMô tả video:\n" . $description . "\n\nGiọng điệu của mô tả video phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika maelezo ya YouTube ya kuvutia ili kuwavutia watu kutazama.\n\nMaelezo ya video:\n" . $description. "\n\nToni ya sauti ya maelezo ya video lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite privlačen opis YouTube, da boste ljudi zanimali za ogled.\n\nOpis videa:\n" . $description. "\n\nTon glasu opisa videa mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

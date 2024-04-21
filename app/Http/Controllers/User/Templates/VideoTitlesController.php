<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class VideoTitlesController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVideoTitlesPrompt($description, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return false;

        switch ($language) {
            case 'en-US':
                    $prompt = "Write compelling YouTube video title for the provided video description to get people interested in watching:\n\nVideo description:\n" . $description . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب عنوان فيديو YouTube مقنعًا لوصف الفيديو المقدم لجذب اهتمام الأشخاص بالمشاهدة:\n\nوصف الفيديو:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为提供的视频描述写引人注目的 YouTube 视频标题，以引起人们对观看的兴趣：\n\n视频描述：\n"  . $description . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite uvjerljiv naslov YouTube videozapisa za navedeni opis videozapisa kako biste zainteresirali ljude za gledanje:\n\nOpis videozapisa:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "K poskytnutému popisu videa napište působivý název videa na YouTube, aby lidi zaujalo sledování:\n\nPopis videa:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en overbevisende YouTube-videotitel til den medfølgende videobeskrivelse for at få folk interesseret i at se:\n\nVideobeskrivelse:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een pakkende YouTube-videotitel voor de verstrekte videobeschrijving om mensen te interesseren om te kijken:\n\nVideobeschrijving:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage esitatud video kirjeldusele köitev YouTube'i video pealkiri, et tekitada inimestes huvi vaatamise vastu:\n\nVideo kirjeldus:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita houkutteleva YouTube-videon nimi annetulle videon kuvaukselle saadaksesi ihmiset kiinnostumaan:\n\nVideon kuvaus:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez un titre de vidéo YouTube convaincant pour la description de la vidéo fournie afin d'intéresser les gens à regarder :\n\nDescription de la vidéo :\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen überzeugenden YouTube-Videotitel für die bereitgestellte Videobeschreibung, um das Interesse der Zuschauer zu wecken:\n\nVideobeschreibung:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε τον συναρπαστικό τίτλο του βίντεο YouTube για την παρεχόμενη περιγραφή του βίντεο για να ενθαρρύνετε τους χρήστες να το παρακολουθήσουν:\n\nΠεριγραφή βίντεο:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב כותרת סרטון YouTube משכנעת עבור תיאור הסרטון שסופק כדי לגרום לאנשים להתעניין בצפייה:\n\nתיאור הסרטון:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "लोगों को देखने में रुचि लेने के लिए प्रदान किए गए वीडियो विवरण के लिए आकर्षक YouTube वीडियो शीर्षक लिखें:\n\nवीडियो विवरण:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon lenyűgöző YouTube-videócímet a mellékelt videó leírásához, hogy felkeltse az emberek érdeklődését a megtekintés iránt:\n\nVideó leírása:\n" . $description . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu sannfærandi titil á YouTube vídeói fyrir vídeólýsinguna sem fylgir til að vekja áhuga fólks á að horfa á:\n\nLýsing myndskeiðs:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis judul video YouTube yang menarik untuk deskripsi video yang diberikan agar orang-orang tertarik untuk menonton:\n\nDeskripsi video:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un titolo del video di YouTube convincente per la descrizione del video fornita per attirare l'interesse delle persone a guardarlo:\n\nDescrizione del video:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "視聴者に興味を持ってもらうために、提供された動画の説明に説得力のある YouTube 動画のタイトルを書いてください:\n\n動画の説明:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "사람들이 시청에 관심을 갖도록 제공된 동영상 설명에 대한 매력적인 YouTube 동영상 제목을 작성하세요.\n\n동영상 설명:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis tajuk video YouTube yang menarik untuk penerangan video yang disediakan untuk menarik minat orang untuk menonton:\n\nPerihalan video:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en overbevisende YouTube-videotittel for den oppgitte videobeskrivelsen for å få folk interessert i å se:\n\nVideobeskrivelse:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz przekonujący tytuł filmu YouTube dla podanego opisu filmu, aby zainteresować ludzi oglądaniem:\n\nOpis filmu:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um título de vídeo do YouTube atraente para a descrição do vídeo fornecida para atrair o interesse das pessoas em assistir:\n\nDescrição do vídeo:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите привлекательное название видео YouTube для предоставленного описания видео, чтобы заинтересовать людей в просмотре:\n\nОписание видео:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un título de video de YouTube atractivo para la descripción del video proporcionada para que las personas se interesen en verlo:\n\nDescripción del video:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv övertygande YouTube-videotitel för den medföljande videobeskrivningen för att få folk intresserade av att titta på:\n\nVideobeskrivning:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Kullanıcıların izlemekle ilgilenmesini sağlamak için sağlanan video açıklamasına çekici bir YouTube video başlığı yazın:\n\nVideo açıklaması:\n" . $description . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um título de vídeo do YouTube atraente para a descrição do vídeo fornecida para atrair o interesse das pessoas em assistir:\n\nDescrição do vídeo:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un titlu convingător al videoclipului YouTube pentru descrierea videoclipului furnizată pentru a-i determina pe oameni să fie interesați să vizioneze:\n\nDescrierea videoclipului:\n"  . $description . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết tiêu đề video hấp dẫn trên YouTube cho phần mô tả video được cung cấp để thu hút mọi người quan tâm đến việc xem:\n\nMô tả video:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika mada ya video ya YouTube yenye kuvutia kwa maelezo ya video yaliyotolewa ili kuwavutia watu kutazama:\n\nMaelezo ya video:\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite privlačen naslov videoposnetka YouTube za predloženi opis videoposnetka, da boste ljudi zanimali za ogled:\n\nOpis videoposnetka:\n" . $description . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

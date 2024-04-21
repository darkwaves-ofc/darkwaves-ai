<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class SocialMediaPostBusinessController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSocialPostBusinessPrompt($description, $title, $post, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Create a large professional social media post for my company. Post description:\n\n" . $post . "\n\nCompany description:\n" . $description . "\n\nCompany name:\n" . $title . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "أنشئ منشورًا احترافيًا كبيرًا على الوسائط الاجتماعية لشركتي. وصف المشاركة:\n\n". $post. "\n\nوصف الشركة:\n". $description. "\n\nاسم الشركة:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为我的公司创建大型专业社交媒体帖子。帖子描述：\n\n". $post. "\n\n公司描述：\n" . $description. "\n\n公司名称：\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Stvorite veliku profesionalnu objavu na društvenim mrežama za moju tvrtku. Opis objave:\n\n" . $post . "\n\nOpis tvrtke:\n" . $description. "\n\nNaziv tvrtke:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vytvořte pro mou společnost velký profesionální příspěvek na sociálních sítích. Popis příspěvku:\n\n" . $post . "\n\nPopis společnosti:\n" . $description . "\n\nNázev společnosti:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Opret et stort professionelt opslag på sociale medier til min virksomhed. Indlægsbeskrivelse:\n\n" . $post . "\n\nVirksomhedsbeskrivelse:\n" . $description. "\n\nVirksomhedsnavn:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Maak een groot professioneel bericht op sociale media voor mijn bedrijf. Berichtbeschrijving:\n\n" . $post. "\n\nBedrijfsomschrijving:\n" . $description . "\n\nBedrijfsnaam:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Loo minu ettevõtte jaoks suur professionaalne sotsiaalmeediapostitus. Postituse kirjeldus:\n\n" . $post . "\n\nEttevõtte kirjeldus:\n" . $description . "\n\nEttevõtte nimi:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo suuri ammattimainen sosiaalisen median viesti yritykselleni. Viestin kuvaus:\n\n" . $post . "\n\nYrityksen kuvaus:\n" . $description . "\n\nYrityksen nimi:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Créer une grande publication professionnelle sur les réseaux sociaux pour mon entreprise. Description de la publication :\n\n" . $post . "\n\nDescription de l'entreprise :\n" . $description . "\n\nNom de l'entreprise :\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Erstelle einen großen professionellen Social-Media-Beitrag für mein Unternehmen. Beitragsbeschreibung:\n\n" . $post . "\n\nUnternehmensbeschreibung:\n" . $description. "\n\nFirmenname:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργήστε μια μεγάλη επαγγελματική ανάρτηση στα μέσα κοινωνικής δικτύωσης για την εταιρεία μου. Περιγραφή ανάρτησης:\n\n" . $post . "\n\nΠεριγραφή εταιρείας:\n" . $description . "\n\nΌνομα εταιρείας:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור פוסט מקצועי גדול במדיה החברתית עבור החברה שלי. תיאור הפוסט:\n\n" . $post . "\n\nתיאור החברה:\n" . $description . "\n\nשם החברה:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "मेरी कंपनी के लिए एक बड़ी पेशेवर सोशल मीडिया पोस्ट बनाएं। पोस्ट विवरण:\n\n".$post. "\n\nकंपनी विवरण:\n" . $description."\n\nकंपनी का नाम:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Hozzon létre egy nagy, professzionális közösségi média bejegyzést a cégem számára. Bejegyzés leírása:\n\n" . $post . "\n\nCég leírása:\n" . $description . "\n\nCég neve:\n" . $title . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búa til stóra faglega samfélagsmiðlafærslu fyrir fyrirtækið mitt. Lýsing færslu:\n\n" . $post. "\n\nFyrirtækislýsing:\n" . $description. "\n\nNafn fyrirtækis:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Buat postingan media sosial profesional yang besar untuk perusahaan saya. Deskripsi postingan:\n\n" . $post . "\n\nDeskripsi perusahaan:\n" . $description . "\n\nNama perusahaan:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Crea un grande post professionale sui social media per la mia azienda. Descrizione del post:\n\n" . $post. "\n\nDescrizione azienda:\n" . $description . "\n\nNome azienda:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "私の会社のために大規模なプロフェッショナル ソーシャル メディア投稿を作成します。投稿の説明:\n\n" . $post . "\n\n会社説明:\n" . $description. "\n\n会社名:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "우리 회사를 위한 대규모 전문 소셜 미디어 게시물을 작성합니다. 게시물 설명:\n\n" . $post . "\n\n회사 설명:\n" . $description . "\n\n회사 이름:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Buat siaran media sosial profesional yang besar untuk syarikat saya. Perihalan siaran:\n\n" . $post . "\n\nPerihalan syarikat:\n" . $description . "\n\nNama syarikat:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Opprett et stort profesjonelt innlegg på sosiale medier for firmaet mitt. Innleggsbeskrivelse:\n\n" . $post . "\n\nBedriftsbeskrivelse:\n" . $description . "\n\nBedriftsnavn:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Utwórz obszerny, profesjonalny post mojej firmy w mediach społecznościowych. Opis wpisu:\n\n" . $post . "\n\nOpis firmy:\n" . $description . "\n\nNazwa firmy:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Criar uma grande postagem de mídia social profissional para minha empresa. Descrição da postagem:\n\n" . $post. "\n\nDescrição da empresa:\n" . $description. "\n\nNome da empresa:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создайте большую профессиональную публикацию в социальных сетях для моей компании. Описание публикации:\n\n" . $post . "\n\nОписание компании:\n" . $description . "\n\nНазвание компании:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Crear una gran publicación profesional en las redes sociales para mi empresa. Descripción de la publicación:\n\n" . $post . "\n\nDescripción de la empresa:\n" . $description . "\n\nNombre de la empresa:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skapa ett stort professionellt inlägg på sociala medier för mitt företag. Inläggsbeskrivning:\n\n" . $post . "\n\nFöretagsbeskrivning:\n" . $description . "\n\nFöretagsnamn:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şirketim için büyük bir profesyonel sosyal medya gönderisi oluştur. Gönderi açıklaması:\n\n" . $post . "\n\nŞirket açıklaması:\n" . $description. "\n\nŞirket adı:\n" . $title . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Criar uma grande postagem de mídia social profissional para minha empresa. Descrição da postagem:\n\n" . $post. "\n\nDescrição da empresa:\n" . $description. "\n\nNome da empresa:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Creează o postare mare profesională pe rețelele sociale pentru compania mea. Descrierea postării:\n\n" . $post . "\n\nDescrierea companiei:\n" . $description . "\n\nNumele companiei:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo một bài đăng lớn chuyên nghiệp trên mạng xã hội cho công ty của tôi. Mô tả bài đăng:\n\n" . $post . "\n\nMô tả công ty:\n" . $description . "\n\nTên công ty:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Unda chapisho kubwa la kitaalamu la mitandao ya kijamii kwa ajili ya kampuni yangu. Chapisha maelezo:\n\n" . $post. "\n\nMaelezo ya kampuni:\n" . $description. "\n\nJina la kampuni:\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvari veliko profesionalno objavo v družbenih medijih za moje podjetje. Opis objave:\n\n" . $post. "\n\nOpis podjetja:\n" . $description. "\n\nIme podjetja:\n" . $title . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class GoogleAdsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGoogleAdsPrompt($title, $audience, $description, $language, $tone) {
        
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
                    $prompt = "Write a Google Ads description that makes your ad stand out and generates leads. Target audience:\n\n" . $audience . "\n\n Product name:\n" . $title . "\n\n Product description:\n" . $description . "\n\n Tone of voice of the ad must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب وصفًا لبرنامج إعلانات Google يجعل إعلانك متميزًا ويكتسب عملاء محتملين. الجمهور المستهدف:\n\n". $audience. "\n\nاسم المنتج:\n". $title. "\n\nوصف المنتج:\n". $description. "\n\nيجب أن تكون نغمة صوت الإعلان:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "撰写 Google Ads 说明，使您的广告脱颖而出并带来潜在客户。目标受众：\n\n" . $audience. "\n\n 产品名称：\n" . $title. "\n\n 产品描述：\n" . $description. "\n\n 广告语调必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite Google Ads opis koji ističe vaš oglas i generira potencijalne kupce. Ciljana publika:\n\n" . $audience. "\n\n Naziv proizvoda:\n" . $title. "\n\n Opis proizvoda:\n" . $description. "\n\n Ton glasa oglasa mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište popis Google Ads, díky kterému vaše reklama vynikne a generuje potenciální zákazníky. Cílové publikum:\n\n" . $audience . "\n\n Název produktu:\n" . $title . "\n\n Popis produktu:\n" . $description . "\n\n Tón hlasu reklamy musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en Google Ads-beskrivelse, der får din annonce til at skille sig ud og genererer kundeemner. Målgruppe:\n\n" . $audience. "\n\n Produktnavn:\n" . $title. "\n\n Produktbeskrivelse:\n" . $description. "\n\n Tonen i annoncen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een Google Ads-beschrijving waardoor uw advertentie opvalt en leads genereert. Doelgroep:\n\n" . $audience. "\n\n Productnaam:\n" . $title . "\n\n Productbeschrijving:\n" . $description . "\n\n Tone of voice van de advertentie moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage Google Adsi kirjeldus, mis muudab teie reklaami silmapaistvaks ja loob müügivihjeid. Sihtpublik:\n\n" . $audience . "\n\n Toote nimi:\n" . $title . "\n\n Toote kirjeldus:\n" . $description . "\n\n Reklaami hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita Google Ads -kuvaus, joka tekee mainoksestasi erottuvan ja luo liidejä. Kohdeyleisö:\n\n" . $audience. "\n\n Tuotteen nimi:\n" . $title . "\n\n Tuotteen kuvaus:\n" . $description . "\n\n Mainoksen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une description Google Ads qui permet à votre annonce de se démarquer et de générer des prospects. Public cible :\n\n" . $audience . "\n\n Nom du produit :\n" . $title . "\n\n Description du produit :\n" . $description . "\n\n Le ton de la voix de l'annonce doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine Google Ads-Beschreibung, die Ihre Anzeige hervorhebt und Leads generiert. Zielgruppe:\n\n" . $audience . "\n\n Produktname:\n" . $title . "\n\n Produktbeschreibung:\n" . $description . "\n\n Tonfall der Anzeige muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια περιγραφή του Google Ads που κάνει τη διαφήμισή σας να ξεχωρίζει και να δημιουργεί δυνητικούς πελάτες. Στοχευόμενο κοινό:\n\n" . $audience . "\n\n Όνομα προϊόντος:\n" . $title . "\n\n Περιγραφή προϊόντος:\n" . $description. "\n\n Ο τόνος της διαφήμισης πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב תיאור של Google Ads שיבלוט את המודעה שלך ויוצר לידים. קהל יעד:\n\n" . $audience . "\n\n שם המוצר:\n" . $title . "\n\n תיאור המוצר:\n" . $description . "\n\n טון הדיבור של המודעה חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "एक Google Ads विवरण लिखें जो आपके विज्ञापन को सबसे अलग बनाता है और लीड उत्पन्न करता है। लक्षित ऑडियंस:\n\n" .$audience. "\n\n उत्पाद का नाम:\n".$title."\n\n उत्पाद विवरण:\n" . $description. "\n\n विज्ञापन का स्वर ऐसा होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon olyan Google Ads-leírást, amely kiemeli hirdetését, és potenciális ügyfeleket generál. Célközönség:\n\n" . $audience . "\n\n Terméknév:\n" . $title . "\n\n Termékleírás:\n" . $description . "\n\n A hirdetés hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu Google Ads lýsingu sem gerir auglýsinguna þína áberandi og gefur af sér leiðir. Markhópur:\n\n" . $audience. "\n\n Vöruheiti:\n" . $title. "\n\n Vörulýsing:\n" . $description. "\n\n Röddtónn auglýsingarinnar verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis deskripsi Google Ads yang menonjolkan iklan Anda dan menghasilkan prospek. Audiens target:\n\n" . $audience . "\n\n Nama produk:\n" . $title . "\n\n Deskripsi produk:\n" . $description . "\n\n Nada suara iklan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una descrizione di Google Ads che faccia risaltare il tuo annuncio e generi lead. Pubblico di destinazione:\n\n" . $audience. "\n\n Nome prodotto:\n" . $title . "\n\n Descrizione del prodotto:\n" . $description . "\n\n Il tono di voce dell'annuncio deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "広告を目立たせ、リードを生み出す Google 広告の説明を書いてください。対象ユーザー:\n\n" . $audience. "\n\n 製品名:\n" . $title. "\n\n 製品説明:\n" . $description. "\n\n 広告のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "광고를 돋보이게 하고 리드를 생성하는 Google Ads 설명을 작성하세요. 타겟층:\n\n" . $audience. "\n\n 제품 이름:\n" . $title . "\n\n 제품 설명:\n" . $description . "\n\n 광고의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis perihalan Google Ads yang menjadikan iklan anda menonjol dan menjana petunjuk. Khalayak sasaran:\n\n" . $audience . "\n\n Nama produk:\n" . $title . "\n\n Penerangan produk:\n" . $description . "\n\n Nada suara iklan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en Google Ads-beskrivelse som gjør at annonsen din skiller seg ut og genererer potensielle kunder. Målgruppe:\n\n" . $audience . "\n\n Produktnavn:\n" . $title . "\n\n Produktbeskrivelse:\n" . $description . "\n\n Tonen i annonsen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz opis Google Ads, który wyróżni Twoją reklamę i przyciągnie potencjalnych klientów. Grupa docelowa:\n\n" . $audience. "\n\n Nazwa produktu:\n" . $title . "\n\n Opis produktu:\n" . $description. "\n\n Ton reklamy musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma descrição do Google Ads que destaque seu anúncio e gere leads. Público-alvo:\n\n" . $audience . "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz do anúncio deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите описание Google Реклама, которое выделит вашу рекламу и привлечет потенциальных клиентов. Целевая аудитория:\n\n" . $audience . "\n\n Название продукта:\n" . $title . "\n\n Описание товара:\n" . $description . "\n\n Тон объявления должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba una descripción de Google Ads que haga que su anuncio se destaque y genere clientes potenciales. Público objetivo:\n\n" . $audience . "\n\n Nombre del producto:\n" . $title. "\n\n Descripción del producto:\n" . $description . "\n\n El tono de voz del anuncio debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en Google Ads-beskrivning som får din annons att sticka ut och genererar potentiella kunder. Målgrupp:\n\n" . $audience . "\n\n Produktnamn:\n" . $title . "\n\n Produktbeskrivning:\n" . $description . "\n\n Tonen i annonsen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Reklamınızı öne çıkaran ve olası satışlar sağlayan bir Google Ads açıklaması yazın. Hedef kitle:\n\n" . $audience. "\n\n Ürün adı:\n" . $title. "\n\n Ürün açıklaması:\n" . $description. "\n\n Reklamın ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva uma descrição do Google Ads que destaque seu anúncio e gere leads. Público-alvo:\n\n" . $audience . "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz do anúncio deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o descriere Google Ads care să vă facă anunțul în evidență și să genereze clienți potențiali. Publicul țintă:\n\n" . $audience . "\n\n Nume produs:\n" . $title . "\n\n Descrierea produsului:\n" . $description . "\n\n Tonul vocii al anunțului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết mô tả Google Ads giúp quảng cáo của bạn nổi bật và tạo khách hàng tiềm năng. Đối tượng mục tiêu:\n\n" . $audience . "\n\n Tên sản phẩm:\n" . $title . "\n\n Mô tả sản phẩm:\n" . $description . "\n\n Giọng điệu của quảng cáo phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika maelezo ya Google Ads ambayo yanafanya tangazo lako liwe bora zaidi na kuzalisha watu wanaoongoza. Hadhira inayolengwa:\n\n" . $audience. "\n\n Jina la bidhaa:\n" . $title. "\n\n Maelezo ya bidhaa:\n" . $description. "\n\n Toni ya sauti ya tangazo lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite opis Google Ads, s katerim bo vaš oglas izstopal in pritegnil potencialne stranke. Ciljna publika:\n\n" . $audience. "\n\n Ime izdelka:\n" . $title. "\n\n Opis izdelka:\n" . $description. "\n\n Ton glasu oglasa mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

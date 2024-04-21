<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class GoogleHeadlinesController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGoogleHeadlinesPrompt($title, $audience, $description, $language, $tone) {
        
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
                    $prompt = "Write catchy 30-character headlines to promote your product with Google Ads. Product name:\n\n" . $title . "\n\nProduct description:\n" . $description . "\n\nTarget audience for ad:\n" . $audience ."\n\nTone of voice of the headline must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب عناوين جذابة مكونة من 30 حرفًا للترويج لمنتجك باستخدام إعلانات Google. اسم المنتج:\n\n". $title. "\n\nوصف المنتج:\n". $description. "\n\nالجمهور المستهدف للإعلان:\n". $audience. "\n\nيجب أن تكون نغمة الصوت في العنوان:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "撰写醒目的 30 个字符的标题，以使用 Google Ads 宣传您的产品。产品名称：\n\n" . $title. "\n\n产品描述：\n" . $description. "\n\n广告的目标受众：\n" . $audience ."\n\n标题的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite upečatljive naslove od 30 znakova kako biste promovirali svoj proizvod uz Google Ads. Naziv proizvoda:\n\n" . $title. "\n\nOpis proizvoda:\n" . $description. "\n\nCiljana publika za oglas:\n" . $audience ."\n\nTon glasa naslova mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište chytlavé nadpisy o délce 30 znaků a propagujte svůj produkt pomocí Google Ads. Název produktu:\n\n". $title . "\n\nPopis produktu:\n" . $description . "\n\nCílové publikum pro reklamu:\n" . $audience ."\n\nTón hlasu titulku musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv fængende overskrifter på 30 tegn for at promovere dit produkt med Google Ads. Produktnavn:\n\n" . $title. "\n\nProduktbeskrivelse:\n" . $description. "\n\nMålgruppe for annonce:\n" . $audience ."\n\nTone i overskriften skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf pakkende koppen van 30 tekens om uw product te promoten met Google Ads. Productnaam:\n\n" . $title . "\n\nProductbeschrijving:\n" . $description . "\n\nDoelgroep voor advertentie:\n" . $audience ."\n\nDe toon van de kop moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage meeldejäävaid 30-märgilisi pealkirju, et reklaamida oma toodet Google Adsiga. Toote nimi:\n\n" . $title . "\n\nTootekirjeldus:\n" . $description . "\n\nReklaami sihtrühm:\n" . $audience ."\n\nPealkirja hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita tarttuvia 30 merkin pituisia otsikoita mainostaaksesi tuotettasi Google Adsin avulla. Tuotteen nimi:\n\n" . $title . "\n\nTuotteen kuvaus:\n" . $description . "\n\nMainoksen kohdeyleisö:\n" . $audience ."\n\nOtsikon äänensävyn tulee olla:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez des titres accrocheurs de 30 caractères pour promouvoir votre produit avec Google Ads. Nom du produit :\n\n" . $title . "\n\nDescription du produit :\n" . $description . "\n\nAudience cible pour l'annonce :\n" . $audience ."\n\nLe ton de la voix du titre doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie ansprechende Überschriften mit 30 Zeichen, um Ihr Produkt mit Google Ads zu bewerben. Produktname:\n\n" . $title . "\n\nProduktbeschreibung:\n" . $description . "\n\nZielpublikum für Anzeige:\n" . $audience ."\n\nTonlage der Überschrift muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε εντυπωσιακούς τίτλους 30 χαρακτήρων για να προωθήσετε το προϊόν σας με το Google Ads. Όνομα προϊόντος:\n\n" . $title . "\n\nΠεριγραφή προϊόντος:\n" . $description . "\n\nΣτόχευση κοινού για διαφήμιση:\n" . $audience ."\n\nΟ τόνος της φωνής της επικεφαλίδας πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב כותרות קליטות של 30 תווים כדי לקדם את המוצר שלך עם Google Ads. שם המוצר:\n\n" . $title . "\n\nתיאור המוצר:\n" . $description . "\n\nקהל יעד למודעה:\n" . $audience ."\n\nטון הדיבור של הכותרת חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "Google Ads के साथ अपने उत्पाद का प्रचार करने के लिए आकर्षक 30-वर्ण वाली सुर्खियाँ लिखें। उत्पाद का नाम:\n\n" .$title."\n\nउत्पाद विवरण:\n" . $description. "\n\nविज्ञापन के लिए लक्षित दर्शक:\n" . $audience ."\n\nशीर्षक की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon fülbemászó, 30 karakterből álló címsorokat, hogy reklámozza termékét a Google Ads szolgáltatással. Termék neve:\n\n" . $title . "\n\nTermékleírás:\n" . $description . "\n\nHirdetés célközönsége:\n" . $audience ."\n\nA címsor hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu grípandi 30 stafa fyrirsagnir til að kynna vöruna þína með Google Ads. Vöruheiti:\n\n" . $title. "\n\nVörulýsing:\n" . $description. "\n\nMarkhópur auglýsingar:\n" . $audience ."\n\nTónn í fyrirsögninni verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis judul 30 karakter yang menarik untuk mempromosikan produk Anda dengan Google Ads. Nama produk:\n\n" . $title . "\n\nDeskripsi produk:\n" . $description . "\n\nTarget pemirsa untuk iklan:\n" . $audience ."\n\nNada suara judul harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi titoli accattivanti di 30 caratteri per promuovere il tuo prodotto con Google Ads. Nome del prodotto:\n\n" . $title. "\n\nDescrizione del prodotto:\n" . $description . "\n\nPubblico di destinazione dell'annuncio:\n" . $audience ."\n\nIl tono di voce del titolo deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "キャッチーな 30 文字の見出しを書いて、Google 広告で商品を宣伝しましょう。商品名:\n\n" . $title. "\n\n商品説明:\n" . $description. "\n\n広告のターゲット ユーザー:\n" . $audience ."\n\n見出しの声のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "Google Ads로 제품을 홍보하려면 눈길을 끄는 30자의 제목을 작성하세요. 제품 이름:\n\n" . $title. "\n\n제품 설명:\n" . $description . "\n\n광고 대상:\n" . $audience ."\n\n제목의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis tajuk 30 aksara yang menarik untuk mempromosikan produk anda dengan Google Ads. Nama produk:\n\n" . $title . "\n\nPerihalan produk:\n" . $description . "\n\nSasarkan khalayak untuk iklan:\n" . $audience ."\n\nNada suara tajuk mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv fengende overskrifter på 30 tegn for å markedsføre produktet ditt med Google Ads. Produktnavn:\n\n" . $title . "\n\nProduktbeskrivelse:\n" . $description . "\n\nMålgruppe for annonse:\n" . $audience ."\n\nTone i overskriften må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Pisz chwytliwe 30-znakowe nagłówki, aby promować swój produkt w Google Ads. Nazwa produktu:\n\n" . $title . "\n\nOpis produktu:\n" . $description . "\n\nDocelowi odbiorcy reklamy:\n" . $audience ."\n\nTon nagłówka musi być następujący:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva títulos atraentes de 30 caracteres para promover seu produto com o Google Ads. Nome do produto:\n\n" . $title. "\n\nDescrição do produto:\n" . $description. "\n\nPúblico-alvo do anúncio:\n" . $audience ."\n\nTom de voz do título deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите броские 30-символьные заголовки, чтобы продвигать свой продукт с помощью Google Реклама. Название продукта:\n\n" . $title . "\n\nОписание продукта:\n" . $description . "\n\nЦелевая аудитория для рекламы:\n" . $audience ."\n\nТон заголовка должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba títulos llamativos de 30 caracteres para promocionar su producto con Google Ads. Nombre del producto:\n\n" . $title. "\n\nDescripción del producto:\n" . $description . "\n\nAudiencia objetivo para el anuncio:\n" . $audience ."\n\nEl tono de voz del titular debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv medryckande rubriker med 30 tecken för att marknadsföra din produkt med Google Ads. Produktnamn:\n\n" . $title . "\n\nProduktbeskrivning:\n" . $description . "\n\nMålgrupp för annons:\n" . $audience ."\n\nTonfallet i rubriken måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Ürününüzü Google Ads ile tanıtmak için akılda kalıcı 30 karakterlik başlıklar yazın. Ürün adı:\n\n" . $title. "\n\nÜrün açıklaması:\n" . $description."\n\nReklamın hedef kitlesi:\n" . $audience ."\n\nBaşlığın ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva títulos atraentes de 30 caracteres para promover seu produto com o Google Ads. Nome do produto:\n\n" . $title . "\n\nDescrição do produto:\n" . $description. "\n\nPúblico-alvo do anúncio:\n" . $audience ."\n\nTom de voz do título deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți titluri atractive de 30 de caractere pentru a vă promova produsul cu Google Ads. Nume produs:\n\n" . $title . "\n\nDescrierea produsului:\n" . $description . "\n\nPublic țintă pentru anunț:\n" . $audience ."\n\nTonul vocii titlului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết dòng tiêu đề hấp dẫn gồm 30 ký tự để quảng cáo sản phẩm của bạn với Google Ads. Tên sản phẩm:\n\n" . $title. "\n\nMô tả sản phẩm:\n" . $description . "\n\nĐối tượng mục tiêu cho quảng cáo:\n" . $audience ."\n\nGiọng điệu của tiêu đề phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika vichwa vya habari vya kuvutia vya herufi 30 ili kutangaza bidhaa yako ukitumia Google Ads. Jina la bidhaa:\n\n" . $title. "\n\nMaelezo ya bidhaa:\n" . $description. "\n\nHadhira lengwa ya tangazo:\n" . $audience ."\n\nToni ya sauti ya kichwa lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite privlačne naslove s 30 znaki za promocijo svojega izdelka z Google Ads. Ime izdelka:\n\n" . $title. "\n\nOpis izdelka:\n" . $description. "\n\nCiljna publika za oglas:\n" . $audience ."\n\nTon glasu naslova mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

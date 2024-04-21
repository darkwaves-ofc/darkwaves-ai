<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class FacebookAdsController extends Controller
{
    use VoiceToneTrait;

     /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFacebookAdsPrompt($title, $audience, $description, $language, $tone) {
        
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
                    $prompt = "Write a creative ad for the following product to run on Facebook aimed at:\n\n" . $audience . "\n\n Product name:\n" . $title . "\n\n Product description:\n" . $description . "\n\n Tone of voice of the ad must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب إعلانًا إبداعيًا للمنتج التالي ليتم تشغيله على Facebook بهدف:\n\n". $audience. "\n\nاسم المنتج:\n". $title. "\n\nوصف المنتج:\n". $description. "\n\nيجب أن تكون نغمة صوت الإعلان:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下产品编写创意广告以在 Facebook 上投放，目标是：\n\n". $audience. "\n\n 产品名称：\n" . $title. "\n\n 产品描述：\n" . $description. "\n\n 广告语调必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite kreativni oglas za sljedeći proizvod za prikazivanje na Facebooku s ciljem:\n\n" . $audience. "\n\n Naziv proizvoda:\n" . $title. "\n\n Opis proizvoda:\n" . $description. "\n\n Ton glasa oglasa mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište kreativní reklamu pro následující produkt, který se bude zobrazovat na Facebooku a je zaměřen na:\n\n" . $audience. "\n\n Název produktu:\n" . $title . "\n\n Popis produktu:\n" . $description . "\n\n Tón hlasu reklamy musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en kreativ annonce for følgende produkt til at køre på Facebook rettet mod:\n\n" . $audience. "\n\n Produktnavn:\n" . $title. "\n\n Produktbeskrivelse:\n" . $description. "\n\n Tonen i annoncen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een creatieve advertentie voor het volgende product voor weergave op Facebook gericht op:\n\n" . $audience. "\n\n Productnaam:\n" . $title . "\n\n Productbeschrijving:\n" . $description. "\n\n Tone of voice van de advertentie moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage Facebookis esitamiseks järgmise toote loov reklaam, mille eesmärk on:\n\n" . $audience . "\n\n Toote nimi:\n" . $title . "\n\n Toote kirjeldus:\n" . $description . "\n\n Reklaami hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita luova mainos seuraavalle tuotteelle Facebookissa, jonka tarkoituksena on:\n\n" . $audience. "\n\n Tuotteen nimi:\n" . $title . "\n\n Tuotteen kuvaus:\n" . $description . "\n\n Mainoksen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une publicité créative pour le produit suivant à diffuser sur Facebook et destinée à :\n\n" . $audience . "\n\n Nom du produit :\n" . $title . "\n\n Description du produit :\n" . $description . "\n\n Le ton de la voix de l'annonce doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine kreative Anzeige für das folgende Produkt, das auf Facebook geschaltet werden soll:\n\n" . $audience . "\n\n Produktname:\n" . $title . "\n\n Produktbeschreibung:\n" . $description . "\n\n Tonfall der Anzeige muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια δημιουργική διαφήμιση για το ακόλουθο προϊόν για προβολή στο Facebook με στόχο:\n\n" . $audience . "\n\n Όνομα προϊόντος:\n" . $title . "\n\n Περιγραφή προϊόντος:\n" . $description . "\n\n Ο τόνος της διαφήμισης πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב מודעה יצירתית עבור המוצר הבא שיוצג בפייסבוק שמטרתה:\n\n" . $audience . "\n\n שם המוצר:\n" . $title . "\n\n תיאור המוצר:\n" . $description. "\n\n גוון הקול של המודעה חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "Facebook पर चलाने के लिए निम्नलिखित उत्पाद के लिए एक रचनात्मक विज्ञापन लिखें:\n\n" .$audience. "\n\n उत्पाद का नाम:\n".$title. "\n\n उत्पाद विवरण:\n" . $description. "\n\n विज्ञापन का स्वर इस प्रकार होना चाहिए:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon kreatív hirdetést a következő termékhez a Facebookon való futtatáshoz, amelynek célja:\n\n" . $audience. "\n\n Terméknév:\n" . $title . "\n\n Termékleírás:\n" . $description. "\n\n A hirdetés hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu skapandi auglýsingu fyrir eftirfarandi vöru til að birta á Facebook sem miðar að:\n\n" . $audience. "\n\n Vöruheiti:\n" . $title. "\n\n Vörulýsing:\n" . $description. "\n\n Röddtónn auglýsingarinnar verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis iklan kreatif untuk produk berikut agar berjalan di Facebook yang ditujukan untuk:\n\n" . $audience . "\n\n Nama produk:\n" . $title . "\n\n Deskripsi produk:\n" . $description . "\n\n Nada suara iklan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un annuncio creativo per il seguente prodotto da pubblicare su Facebook rivolto a:\n\n" . $audience. "\n\n Nome prodotto:\n" . $title . "\n\n Descrizione del prodotto:\n" . $description . "\n\n Il tono di voce dell'annuncio deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次の製品のクリエイティブ広告を作成して、Facebook で実行することを目的としています:\n\n" . $audience. "\n\n 製品名:\n" . $title. "\n\n 製品説明:\n" . $description. "\n\n 広告のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "Facebook에서 실행할 다음 제품에 대한 크리에이티브 광고 작성:\n\n" . $audience. "\n\n 제품 이름:\n" . $title . "\n\n 제품 설명:\n" . $description . "\n\n 광고 음성 톤은 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis iklan kreatif untuk produk berikut untuk disiarkan di Facebook bertujuan:\n\n" . $audience. "\n\n Nama produk:\n" . $title . "\n\n Penerangan produk:\n" . $description . "\n\n Nada suara iklan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en kreativ annonse for følgende produkt som skal kjøres på Facebook rettet mot:\n\n" . $audience . "\n\n Produktnavn:\n" . $title . "\n\n Produktbeskrivelse:\n" . $description . "\n\n Tonen i annonsen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz kreatywną reklamę następującego produktu do wyświetlania na Facebooku, skierowaną do:\n\n" . $audience . "\n\n Nazwa produktu:\n" . $title . "\n\n Opis produktu:\n" . $description. "\n\n Ton reklamy musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um anúncio criativo para o seguinte produto para exibição no Facebook destinado a:\n\n" . $audience . "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz do anúncio deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите креативную рекламу следующего продукта для показа на Facebook, нацеленную на:\n\n" . $audience. "\n\n Название продукта:\n" . $title. "\n\n Описание товара:\n" . $description . "\n\n Тон объявления должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba un anuncio creativo para que el siguiente producto se publique en Facebook dirigido a:\n\n" . $audience . "\n\n Nombre del producto:\n" . $title . "\n\n Descripción del producto:\n" . $description . "\n\n El tono de voz del anuncio debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en kreativ annons för följande produkt som ska visas på Facebook som syftar till:\n\n" . $audience . "\n\n Produktnamn:\n" . $title . "\n\n Produktbeskrivning:\n" . $description . "\n\n Tonen i annonsen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Aşağıdaki ürün için Facebook'ta yayınlanması hedeflenen yaratıcı bir reklam yazın:\n\n" . $audience. "\n\n Ürün adı:\n" . $title. "\n\n Ürün açıklaması:\n" . $description. "\n\n Reklamın ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva um anúncio criativo para o seguinte produto para exibição no Facebook destinado a:\n\n" . $audience . "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz do anúncio deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un anunț creativ pentru următorul produs, care să fie difuzat pe Facebook, care vizează:\n\n" . $audience . "\n\n Nume produs:\n" . $title . "\n\n Descrierea produsului:\n" . $description . "\n\n Tonul vocii al anunțului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết quảng cáo sáng tạo cho sản phẩm sau để chạy trên Facebook nhằm mục đích:\n\n" . $audience . "\n\n Tên sản phẩm:\n" . $title . "\n\n Mô tả sản phẩm:\n" . $description . "\n\n Giọng điệu của quảng cáo phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika tangazo la ubunifu ili bidhaa ifuatayo ionyeshwe kwenye Facebook inayolenga:\n\n" . $audience. "\n\n Jina la bidhaa:\n" . $title. "\n\n Maelezo ya bidhaa:\n" . $description. "\n\n Toni ya sauti ya tangazo lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite kreativni oglas za naslednji izdelek za prikazovanje na Facebooku, namenjen:\n\n" . $audience. "\n\n Ime izdelka:\n" . $title. "\n\n Opis izdelka:\n" . $description. "\n\n Ton glasu oglasa mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

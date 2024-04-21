<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class FacebookHeadlinesController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFacebookHeadlinesPrompt($title, $audience, $description, $language, $tone) {
        
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
                    $prompt = "Write a long creative headline for the following product to run on Facebook aimed at:\n\n" . $audience . "\n\n Product name:\n" . $title . "\n\n Product description:\n" . $description . "\n\n Tone of voice of the headline must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                    break;
            case 'ar-AE':
                $prompt = "اكتب عنوانًا إبداعيًا طويلاً للمنتج التالي ليتم تشغيله على Facebook بهدف:\n\n". $audience. "\n\nاسم المنتج:\n". $title. "\n\nوصف المنتج:\n". $description. "\n\nيجب أن تكون نبرة صوت العنوان:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下产品写一个长创意标题以在 Facebook 上运行，旨在：\n\n". $audience. "\n\n 产品名称：\n" . $title. "\n\n 产品描述：\n" . $description. "\n\n 标题的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite dugačak kreativni naslov za sljedeći proizvod koji će se prikazivati na Facebooku s ciljem:\n\n" . $audience. "\n\n Naziv proizvoda:\n" . $title. "\n\n Opis proizvoda:\n" . $description. "\n\n Ton glasa naslova mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište dlouhý kreativní nadpis pro následující produkt, který bude spuštěn na Facebooku:\n\n" . $audience. "\n\n Název produktu:\n" . $title . "\n\n Popis produktu:\n" . $description . "\n\n Tón hlasu titulku musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en lang kreativ overskrift til følgende produkt, der skal køre på Facebook, rettet mod:\n\n" . $audience. "\n\n Produktnavn:\n" . $title. "\n\n Produktbeskrivelse:\n" . $description. "\n\n Tonen i overskriften skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een lange creatieve kop voor het volgende product om op Facebook uit te voeren, gericht op:\n\n" . $audience. "\n\n Productnaam:\n" . $title. "\n\n Productbeschrijving:\n" . $description . "\n\n Tone of voice van de kop moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage Facebookis käivitamiseks järgmise toote jaoks pikk loominguline pealkiri, mille eesmärk on:\n\n" . $audience . "\n\n Toote nimi:\n" . $title . "\n\n Toote kirjeldus:\n" . $description . "\n\n Pealkirja hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita pitkä luova otsikko seuraavalle tuotteelle Facebookissa käytettäväksi:\n\n" . $audience. "\n\n Tuotteen nimi:\n" . $title . "\n\n Tuotteen kuvaus:\n" . $description . "\n\n Otsikon äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez un long titre créatif pour le produit suivant à diffuser sur Facebook destiné à :\n\n" . $audience . "\n\n Nom du produit :\n" . $title . "\n\n Description du produit :\n" . $description . "\n\n Le ton de la voix du titre doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine lange kreative Überschrift für das folgende Produkt, das auf Facebook laufen soll:\n\n" . $audience . "\n\n Produktname:\n" . $title . "\n\n Produktbeschreibung:\n" . $description . "\n\n Tonfall der Überschrift muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια μακρά δημιουργική επικεφαλίδα για το ακόλουθο προϊόν για προβολή στο Facebook με στόχο:\n\n" . $audience . "\n\n Όνομα προϊόντος:\n" . $title . "\n\n Περιγραφή προϊόντος:\n" . $description . "\n\n Ο τόνος της φωνής της επικεφαλίδας πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב כותרת יצירתית ארוכה למוצר הבא שיוצג בפייסבוק שמטרתה:\n\n" . $audience . "\n\n שם המוצר:\n" . $title . "\n\n תיאור המוצר:\n" . $description . "\n\n גוון הקול של הכותרת חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "Facebook पर चलने के लिए निम्न उत्पाद के लिए एक लंबी क्रिएटिव हेडलाइन लिखें:\n\n" .$audience."\n\n उत्पाद का नाम:\n".$title. "\n\n उत्पाद विवरण:\n" . $description. "\n\n शीर्षक का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon egy hosszú kreatív címsort a következő termékhez a Facebookon való futtatáshoz, amelynek célja:\n\n" . $audience. "\n\n Terméknév:\n" . $title . "\n\n Termékleírás:\n" . $description . "\n\n A címsor hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu langa skapandi fyrirsögn fyrir eftirfarandi vöru til að birtast á Facebook sem miðar að:\n\n" . $audience. "\n\n Vöruheiti:\n" . $title. "\n\n Vörulýsing:\n" . $description. "\n\n Rödd í fyrirsögninni verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis judul kreatif yang panjang untuk produk berikut agar berjalan di Facebook yang ditujukan untuk:\n\n" . $audience . "\n\n Nama produk:\n" . $title . "\n\n Deskripsi produk:\n" . $description . "\n\n Nada suara judul harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un lungo titolo creativo per il seguente prodotto da pubblicare su Facebook destinato a:\n\n" . $audience. "\n\n Nome prodotto:\n" . $title . "\n\n Descrizione del prodotto:\n" . $description . "\n\n Il tono di voce del titolo deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次の製品の長いクリエイティブな見出しを書いて、Facebook で実行することを目的としています:\n\n" . $audience. "\n\n 製品名:\n" . $title. "\n\n 製品説明:\n" . $description. "\n\n 見出しの口調は次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "Facebook에서 실행할 다음 제품에 대한 길고 창의적인 헤드라인을 작성하세요.\n\n" . $audience . "\n\n 제품 이름:\n" . $title . "\n\n 제품 설명:\n" . $description. "\n\n 헤드라인의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis tajuk kreatif yang panjang untuk produk berikut disiarkan di Facebook bertujuan:\n\n" . $audience . "\n\n Nama produk:\n" . $title . "\n\n Penerangan produk:\n" . $description . "\n\n Nada suara tajuk mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en lang kreativ overskrift for følgende produkt å kjøre på Facebook rettet mot:\n\n" . $audience . "\n\n Produktnavn:\n" . $title . "\n\n Produktbeskrivelse:\n" . $description . "\n\n Tonen i overskriften må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz długi kreatywny nagłówek dla następującego produktu do wyświetlania na Facebooku, którego celem jest:\n\n" . $audience . "\n\n Nazwa produktu:\n" . $title . "\n\n Opis produktu:\n" . $description . "\n\n Ton nagłówka musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um longo título criativo para o seguinte produto a ser executado no Facebook destinado a:\n\n" . $audience . "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz do título deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите длинный креативный заголовок для следующего продукта, который будет запущен на Facebook и нацелен на:\n\n" . $audience . "\n\n Название продукта:\n" . $title . "\n\n Описание товара:\n" . $description. "\n\n Тон голоса заголовка должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un título creativo largo para que el siguiente producto se ejecute en Facebook dirigido a:\n\n" . $audience. "\n\n Nombre del producto:\n" . $title . "\n\n Descripción del producto:\n" . $description . "\n\n El tono de voz del titular debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en lång kreativ rubrik för följande produkt att köra på Facebook som syftar till:\n\n" . $audience . "\n\n Produktnamn:\n" . $title . "\n\n Produktbeskrivning:\n" . $description . "\n\n Tonen i rubriken måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Aşağıdaki ürünün Facebook'ta yayınlanması için uzun bir yaratıcı başlık yazın:\n\n" . $audience. "\n\n Ürün adı:\n" . $title. "\n\n Ürün açıklaması:\n" . $description. "\n\n Başlığın ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um longo título criativo para o seguinte produto a ser executado no Facebook destinado a:\n\n" . $audience . "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz do título deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un titlu creativ lung pentru următorul produs care să fie difuzat pe Facebook, care vizează:\n\n" . $audience . "\n\n Nume produs:\n" . $title . "\n\n Descrierea produsului:\n" . $description . "\n\n Tonul vocii titlului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một dòng tiêu đề sáng tạo dài cho sản phẩm sau để chạy trên Facebook nhằm mục đích:\n\n" . $audience . "\n\n Tên sản phẩm:\n" . $title. "\n\n Mô tả sản phẩm:\n" . $description . "\n\n Giọng điệu của tiêu đề phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika kichwa kirefu cha ubunifu ili bidhaa ifuatayo iendeshwe kwenye Facebook inayolenga:\n\n" . $audience. "\n\n Jina la bidhaa:\n" . $title. "\n\n Maelezo ya bidhaa:\n" . $description. "\n\n Toni ya sauti ya kichwa lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite dolg kreativni naslov za naslednji izdelek, ki bo deloval na Facebooku in bo namenjen:\n\n" . $audience. "\n\n Ime izdelka:\n" . $title. "\n\n Opis izdelka:\n" . $description. "\n\n Ton glasu naslova mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

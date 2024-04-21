<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class TestimonialsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTestimonialsPrompt($title, $description, $language, $tone) {
        
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
                    $prompt = "Create 5 creative customer reviews for a product. Product name:\n\n" . $title . "\n\n Product description:\n" . $description . "\n\n Tone of voice of the customer review must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "أنشئ 5 مراجعات إبداعية للعملاء لمنتج ما. اسم المنتج:\n\n". $title. "\n\nوصف المنتج:\n". $description. "\n\nيجب أن تكون نبرة صوت مراجعة العميل:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为产品创建 5 个有创意的客户评论。产品名称：\n\n". $title. "\n\n 产品描述：\n" . $description. "\n\n 客户评论的语气必须是：\n" . $tone_language.  "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Stvorite 5 kreativnih korisničkih recenzija za proizvod. Naziv proizvoda:\n\n" . $title. "\n\n Opis proizvoda:\n" . $description. "\n\n Ton glasa klijentove recenzije mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vytvořte 5 kreativních zákaznických recenzí pro produkt. Název produktu:\n\n" . $title . "\n\n Popis produktu:\n" . $description . "\n\n Tón hlasu zákaznické recenze musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Opret 5 kreative kundeanmeldelser for et produkt. Produktnavn:\n\n" . $title. "\n\n Produktbeskrivelse:\n" . $description. "\n\n Tonen i kundeanmeldelsen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Maak 5 creatieve klantrecensies voor een product. Productnaam:\n\n" . $title. "\n\n Productbeschrijving:\n" . $description . "\n\n Tone of voice van de klantrecensie moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Looge toote kohta 5 loomingulist kliendiarvustust. Toote nimi:\n\n" . $title . "\n\n Toote kirjeldus:\n" . $description . "\n\n Kliendiarvustuse hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo 5 luovaa asiakasarvostelua tuotteelle. Tuotteen nimi:\n\n" . $title . "\n\n Tuotteen kuvaus:\n" . $description . "\n\n Asiakasarvion äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Créez 5 avis clients créatifs pour un produit. Nom du produit :\n\n" . $title. "\n\n Description du produit :\n" . $description . "\n\n Le ton de la voix de l'avis client doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Erstellen Sie 5 kreative Kundenrezensionen für ein Produkt. Produktname:\n\n" . $title . "\n\n Produktbeschreibung:\n" . $description . "\n\n Tonfall der Kundenrezension muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργήστε 5 δημιουργικές κριτικές πελατών για ένα προϊόν. Όνομα προϊόντος:\n\n" . $title . "\n\n Περιγραφή προϊόντος:\n" . $description . "\n\n Ο ήχος της κριτικής πελάτη πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור 5 ביקורות יצירתיות של לקוחות עבור מוצר. שם המוצר:\n\n" . $title . "\n\n תיאור המוצר:\n" . $description . "\n\n טון הדיבור של ביקורת הלקוח חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "एक उत्पाद के लिए 5 रचनात्मक ग्राहक समीक्षाएँ बनाएँ। उत्पाद का नाम:\n\n".$title."\n\n उत्पाद विवरण:\n" . $description. "\n\n ग्राहक समीक्षा का स्वर होना चाहिए:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Hozzon létre 5 kreatív vásárlói véleményt egy termékről. Termék neve:\n\n" . $title . "\n\n Termékleírás:\n" . $description . "\n\n A vásárlói vélemény hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búðu til 5 skapandi umsagnir viðskiptavina fyrir vöru. Vöruheiti:\n\n" . $title. "\n\n Vörulýsing:\n" . $description. "\n\n Rödd í umsögn viðskiptavina verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Buat 5 ulasan pelanggan yang kreatif untuk sebuah produk. Nama produk:\n\n" . $title . "\n\n Deskripsi produk:\n" . $description . "\n\n Nada suara ulasan pelanggan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Crea 5 recensioni cliente creative per un prodotto. Nome prodotto:\n\n" . $title . "\n\n Descrizione del prodotto:\n" . $description. "\n\n Il tono di voce della recensione del cliente deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "商品のクリエイティブなカスタマー レビューを 5 つ作成します。商品名:\n\n" . $title. "\n\n 製品説明:\n" . $description. "\n\n カスタマー レビューの声調は次のとおりでなければなりません:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "제품에 대해 5개의 창의적인 고객 리뷰를 작성하십시오. 제품 이름:\n\n" . $title. "\n\n 제품 설명:\n" . $description . "\n\n 고객 리뷰의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Buat 5 ulasan pelanggan kreatif untuk produk. Nama produk:\n\n" . $title . "\n\n Penerangan produk:\n" . $description . "\n\n Nada suara ulasan pelanggan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Lag 5 kreative kundeanmeldelser for et produkt. Produktnavn:\n\n" . $title . "\n\n Produktbeskrivelse:\n" . $description . "\n\n Tonen i kundeanmeldelsen må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Utwórz 5 kreatywnych recenzji klientów dla produktu. Nazwa produktu:\n\n" . $ttitle . "\n\n Opis produktu:\n" . $description. "\n\n Ton opinii klienta musi być następujący:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Crie 5 avaliações criativas de clientes para um produto. Nome do produto:\n\n" . $title. "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz da avaliação do cliente deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создайте 5 креативных отзывов клиентов о продукте. Название продукта:\n\n" . $title . "\n\n Описание товара:\n" . $description . "\n\n Тон голоса отзыва клиента должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Cree 5 reseñas creativas de clientes para un producto. Nombre del producto:\n\n" . $title . "\n\n Descripción del producto:\n" . $description . "\n\n El tono de voz de la reseña del cliente debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skapa 5 kreativa kundrecensioner för en produkt. Produktnamn:\n\n" . $title . "\n\n Produktbeskrivning:\n" . $description . "\n\n Tonen i kundrecensionen måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bir ürün için 5 yaratıcı müşteri yorumu oluşturun. Ürün adı:\n\n" . $title. "\n\n Ürün açıklaması:\n" . $description. "\n\n Müşteri incelemesinin ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Crie 5 avaliações criativas de clientes para um produto. Nome do produto:\n\n" . $title. "\n\n Descrição do produto:\n" . $description. "\n\n O tom de voz da avaliação do cliente deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Creați 5 recenzii creative ale clienților pentru un produs. Nume produs:\n\n" . $title . "\n\n Descrierea produsului:\n" . $description . "\n\n Tonul de voce al recenziei clientului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo 5 bài đánh giá sáng tạo của khách hàng cho một sản phẩm. Tên sản phẩm:\n\n" . $title . "\n\n Mô tả sản phẩm:\n" . $description. "\n\n Giọng điệu của bài đánh giá của khách hàng phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Unda maoni 5 bunifu ya wateja kwa bidhaa. Jina la bidhaa:\n\n" . $title. "\n\n Maelezo ya bidhaa:\n" . $description. "\n\n Toni ya sauti ya ukaguzi wa mteja lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvarite 5 kreativnih ocen strank za izdelek. Ime izdelka:\n\n" . $title. "\n\n Opis izdelka:\n" . $description. "\n\n Ton ocene stranke mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

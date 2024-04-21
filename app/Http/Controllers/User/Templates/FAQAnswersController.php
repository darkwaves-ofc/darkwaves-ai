<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class FAQAnswersController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFAQAnswersPrompt($title, $question, $description, $language, $tone) {
        
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
                    $prompt = "Generate creative 5 answers to question:\n\n" . $question . "\n\n Product name:\n" . $title . "\n\n Product description:\n" . $description . "\n\n Tone of voice of the answers must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "إنشاء 5 إجابات إبداعية على السؤال:\n\n". $question. "\n\nاسم المنتج:\n". $title. "\n\nوصف المنتج:\n". $description."\n\nيجب أن تكون نبرة صوت الإجابات:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为问题生成有创意的 5 个答案：\n\n". $question. "\n\n 产品名称：\n" . $title. "\n\n 产品描述：\n" . $description. "\n\n 回答的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Generiraj kreativnih 5 odgovora na pitanje:\n\n" . $question. "\n\n Naziv proizvoda:\n" . $title. "\n\n Opis proizvoda:\n" . $description. "\n\n Ton glasa odgovora mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vygenerujte kreativu 5 odpovědí na otázku:\n\n" . $question . "\n\n Název produktu:\n" . $title . "\n\n Popis produktu:\n" . $description . "\n\n Tón hlasu odpovědí musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Generer kreative 5 svar på spørgsmål:\n\n" . $question. "\n\n Produktnavn:\n" . $title. "\n\n Produktbeskrivelse:\n" . $description. "\n\n Tonen i svarene skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Genereer creatieve 5 antwoorden op vraag:\n\n" . $question . "\n\n Productnaam:\n" . $title . "\n\n Productbeschrijving:\n" . $description . "\n\n Tone of voice van de antwoorden moet zijn:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Loo 5 loomingulist vastust küsimusele:\n\n" . $question . "\n\n Toote nimi:\n" . $title . "\n\n Toote kirjeldus:\n" . $description . "\n\n Vastuste hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo luova 5 vastausta kysymykseen:\n\n" . $question. "\n\n Tuotteen nimi:\n" . $title . "\n\n Tuotteen kuvaus:\n" . $description . "\n\n Vastausten äänensävyn tulee olla:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Générer la création 5 réponses à la question :\n\n" . $question . "\n\n Nom du produit :\n" . $title . "\n\n Description du produit :\n" . $description . "\n\n Le ton de la voix des réponses doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Erzeuge kreative 5 Antworten auf Frage:\n\n" . $question . "\n\n Produktname:\n" . $title . "\n\n Produktbeschreibung:\n" . $description . "\n\n Tonfall der Antworten muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργία δημιουργικού 5 απαντήσεων στην ερώτηση:\n\n" . $question . "\n\n Όνομα προϊόντος:\n" . $title . "\n\n Περιγραφή προϊόντος:\n" . $description. "\n\n Ο τόνος της φωνής των απαντήσεων πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור קריאייטיב 5 תשובות לשאלה:\n\n" . $question. "\n\n שם המוצר:\n" . $title . "\n\n תיאור המוצר:\n" . $description. "\n\n טון הדיבור של התשובות חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "प्रश्न के रचनात्मक 5 उत्तर उत्पन्न करें:\n\n" .$question . "\n\n उत्पाद का नाम:\n" . $title .  "\n\n उत्पाद विवरण:\n" . $description."\n\n जवाबों के स्वर इस प्रकार होने चाहिए:\n" . $tone_language ."\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Kreatív 5 válasz létrehozása a következő kérdésre:\n\n" . $question . "\n\n Terméknév:\n" . $title . "\n\n Termékleírás:\n" . $description . "\n\n A válaszok hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búðu til skapandi 5 svör við spurningu:\n\n" . $question. "\n\n Vöruheiti:\n" . $title. "\n\n Vörulýsing:\n" . $description. "\n\n Röddtónn svara verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Hasilkan 5 jawaban kreatif untuk pertanyaan:\n\n" . $question. "\n\n Nama produk:\n" . $title. "\n\n Deskripsi produk:\n" . $description . "\n\n Nada suara jawaban harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Genera creatività 5 risposte alla domanda:\n\n" . $question. "\n\n Nome prodotto:\n" . $title . "\n\n Descrizione del prodotto:\n" . $description . "\n\n Il tono di voce delle risposte deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "質問に対する創造的な 5 つの回答を生成します:\n\n" . $question. "\n\n 製品名:\n" . $title. "\n\n 製品説明:\n" . $description. "\n\n 回答の声のトーンは次のとおりでなければなりません:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "질문에 대한 창의적인 5개 답변 생성:\n\n" . $question. "\n\n 제품 이름:\n" . $title . "\n\n 제품 설명:\n" . $description . "\n\n 답변의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Jana 5 jawapan kreatif untuk soalan:\n\n" . $question . "\n\n Nama produk:\n" . $title . "\n\n Penerangan produk:\n" . $description . "\n\n Nada suara jawapan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Generer kreative 5 svar på spørsmål:\n\n" . $question . "\n\n Produktnavn:\n" . $title . "\n\n Produktbeskrivelse:\n" . $description . "\n\n Tonen til svarene må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Wygeneruj kreację 5 odpowiedzi na pytanie:\n\n" . $question . "\n\n Nazwa produktu:\n" . $title . "\n\n Opis produktu:\n" . $description . "\n\n Ton odpowiedzi musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Gerar criativo 5 respostas para a pergunta:\n\n" . $question. "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n Tom de voz das respostas deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Сгенерировать креативные 5 ответов на вопрос:\n\n" . $question. "\n\n Название продукта:\n" . $title . "\n\n Описание товара:\n" . $description. "\n\n Тон голоса ответов должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Generar 5 respuestas creativas a la pregunta:\n\n" . $question. "\n\n Nombre del producto:\n" . $title . "\n\n Descripción del producto:\n" . $description. "\n\n El tono de voz de las respuestas debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Generera kreativa fem svar på frågan:\n\n" . $question . "\n\n Produktnamn:\n" . $title . "\n\n Produktbeskrivning:\n" . $description . "\n\n Tonen i svaren måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Soruya yaratıcı 5 yanıt oluşturun:\n\n" . $question. "\n\n Ürün adı:\n" . $title ."\n\n Ürün açıklaması:\n" . $description."\n\n Cevapların ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Gerar criativo 5 respostas para a pergunta:\n\n" . $question. "\n\n Nome do produto:\n" . $title . "\n\n Descrição do produto:\n" . $description. "\n\n Tom de voz das respostas deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Generează reclame 5 răspunsuri la întrebarea:\n\n" . $question . "\n\n Nume produs:\n" . $title . "\n\n Descrierea produsului:\n" . $description . "\n\n Tonul vocii răspunsurilor trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo 5 câu trả lời sáng tạo cho câu hỏi:\n\n" . $question . "\n\n Tên sản phẩm:\n" . $title . "\n\n Mô tả sản phẩm:\n" . $description . "\n\n Giọng điệu của câu trả lời phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Toa majibu 5 ya ubunifu kwa swali:\n\n" . $question. "\n\n Jina la bidhaa:\n" . $title. "\n\n Maelezo ya bidhaa:\n" . $description. "\n\n Toni ya sauti ya majibu lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvari kreativnih 5 odgovorov na vprašanje:\n\n" . $question. "\n\n Ime izdelka:\n" . $title. "\n\n Opis izdelka:\n" . $description. "\n\n Ton glasu odgovorov mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

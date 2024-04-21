<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class FAQsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFAQsPrompt($title, $description, $language, $tone) {
        
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
                    $prompt = "Generate list of 10 frequently asked questions based on description:\n\n" . $description . "\n\n Product name:\n" . $title . "\n\n Tone of voice of the questions must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "قم بإنشاء قائمة من 10 أسئلة متداولة بناءً على الوصف:\n\n". $description. "\n\nاسم المنتج:\n".$title . "\n\nيجب أن تكون نبرة صوت الأسئلة:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "根据描述生成 10 个常见问题列表：\n\n" . $description. "\n\n 产品名称：\n" . $title . "\n\n 提问的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Generiraj popis od 10 često postavljanih pitanja na temelju opisa:\n\n" . $description. "\n\n Naziv proizvoda:\n" . $title . "\n\n Ton glasa pitanja mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vygenerujte seznam 10 často kladených otázek na základě popisu:\n\n" . $description. "\n\n Název produktu:\n" . $title . "\n\n Tón hlasu otázek musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Generer en liste med 10 ofte stillede spørgsmål baseret på beskrivelse:\n\n" . $description. "\n\n Produktnavn:\n" . $title . "\n\n Tonen i spørgsmålene skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Genereer een lijst met 10 veelgestelde vragen op basis van beschrijving:\n\n" . $description . "\n\n Productnaam:\n" . $title  . "\n\n Tone of voice van de vragen moet zijn:\n" . $tone_language  . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Loo kirjelduse põhjal 10 korduma kippuva küsimuse loend:\n\n" . $description . "\n\n Toote nimi:\n" . $title  . "\n\n Küsimuste hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo luettelo 10 usein kysytystä kysymyksestä kuvauksen perusteella:\n\n" . $description . "\n\n Tuotteen nimi:\n" . $title . "\n\n Kysymysten äänensävyn tulee olla:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Générer une liste de 10 questions fréquemment posées en fonction de la description :\n\n" . $description . "\n\n Nom du produit :\n" . $title  . "\n\n Le ton de la voix des questions doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Erzeuge eine Liste mit 10 häufig gestellten Fragen basierend auf der Beschreibung:\n\n" . $description. "\n\n Produktname:\n" . $title  . "\n\n Tonfall der Fragen muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργία λίστας 10 συχνών ερωτήσεων με βάση την περιγραφή:\n\n" . $description. "\n\n Όνομα προϊόντος:\n" . $title . "\n\n Ο τόνος της φωνής των ερωτήσεων πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור רשימה של 10 שאלות נפוצות על סמך תיאור:\n\n" . $description . "\n\n שם המוצר:\n" . $title . "\n\n טון הדיבור של השאלות חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "विवरण के आधार पर अक्सर पूछे जाने वाले 10 प्रश्नों की सूची तैयार करें:\n\n".$description. "\n\n उत्पाद का नाम:\n" . $title ."\n\n प्रश्नों का स्वर इस प्रकार होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Létrehozzon 10 gyakran ismételt kérdést tartalmazó listát a leírás alapján:\n\n" . $description . "\n\n Terméknév:\n" . $title . "\n\n A kérdések hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búðu til lista yfir 10 algengar spurningar byggðar á lýsingu:\n\n" . $description. "\n\n Vöruheiti:\n" . $title . "\n\n Röddtónn spurninganna verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Buat daftar 10 pertanyaan umum berdasarkan deskripsi:\n\n" . $description . "\n\n Nama produk:\n" . $title  . "\n\n Nada suara pertanyaan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Genera elenco di 10 domande frequenti in base alla descrizione:\n\n" . $description . "\n\n Nome prodotto:\n" . $title  . "\n\n Il tono di voce delle domande deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "説明に基づいて 10 のよくある質問のリストを生成します:\n\n" . $description. "\n\n 製品名:\n" . $title . "\n\n 質問のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "설명에 따라 자주 묻는 질문 10개 목록 생성:\n\n" . $description. "\n\n 제품 이름:\n" . $title . "\n\n 질문의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Jana senarai 10 soalan lazim berdasarkan penerangan:\n\n" . $description . "\n\n Nama produk:\n" . $title  . "\n\n Nada suara soalan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Generer liste over 10 vanlige spørsmål basert på beskrivelse:\n\n" . $description . "\n\n Produktnavn:\n" . $title  . "\n\n Tonen i spørsmålene må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Wygeneruj listę 10 najczęściej zadawanych pytań na podstawie opisu:\n\n" . $description . "\n\n Nazwa produktu:\n" . $title  . "\n\n Ton pytań musi być następujący:\n" . $tone_language  . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Gerar lista de 10 perguntas frequentes com base na descrição:\n\n" . $description. "\n\n Nome do produto:\n" . $title  . "\n\n Tom de voz das perguntas deve ser:\n" . $tone_language  . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создать список из 10 часто задаваемых вопросов на основе описания:\n\n" . $description. "\n\n Название продукта:\n" . $title  . "\n\n Тон вопросов должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Generar una lista de 10 preguntas frecuentes según la descripción:\n\n" . $description . "\n\n Nombre del producto:\n" . $title  . "\n\n El tono de voz de las preguntas debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skapa en lista med 10 vanliga frågor baserat på beskrivning:\n\n" . $description . "\n\n Produktnamn:\n" . $title . "\n\n Tonen i frågorna måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Açıklamaya göre sık sorulan 10 sorudan oluşan bir liste oluşturun:\n\n" . $description ."\n\n Ürün adı:\n" . $title ."\n\n Soruların ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Gerar lista de 10 perguntas frequentes com base na descrição:\n\n" . $description. "\n\n Nome do produto:\n" . $title  . "\n\n Tom de voz das perguntas deve ser:\n" . $tone_language  . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Generează o listă cu 10 întrebări frecvente pe baza descrierii:\n\n" . $description . "\n\n Nume produs:\n" . $title . "\n\n Tonul de voce al întrebărilor trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo danh sách 10 câu hỏi thường gặp dựa trên mô tả:\n\n" . $description. "\n\n Tên sản phẩm:\n" . $title . "\n\n Giọng điệu của câu hỏi phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Tengeneza orodha ya maswali 10 yanayoulizwa mara kwa mara kulingana na maelezo:\n\n" . $description. "\n\n Jina la bidhaa:\n" . $title. "\n\n Toni ya sauti ya maswali lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvari seznam 10 pogosto zastavljenih vprašanj na podlagi opisa:\n\n" . $description. "\n\n Ime izdelka:\n" . $title. "\n\n Ton glasu vprašanj mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

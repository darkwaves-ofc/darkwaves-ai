<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class StartupNameGeneratorController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStartupNameGeneratorPrompt($keywords, $description, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return false;

        switch ($language) {
            case 'en-US':
                    $prompt = "Generate cool, creative, and catchy names for startup description: " . $description . "\n\nSeed words: " . $keywords . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "أنشئ أسماء رائعة ومبتكرة وجذابة لوصف بدء التشغيل: ". $description . "\n\nكلمات المصدر: ". $keywords. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为启动描述生成酷炫、有创意且朗朗上口的名称: " . $description . "\n\n种子词: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Generiraj cool, kreativna i privlačna imena za opis pokretanja: " . $description. "\n\nPočetne riječi: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vygenerujte skvělé, kreativní a chytlavé názvy pro popis spuštění: " . $description . "\n\nVýchozí slova: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Generer seje, kreative og fængende navne til opstartsbeskrivelse: " . $description. "\n\nSeed ord: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Genereer coole, creatieve en pakkende namen voor opstartbeschrijving: " . $description . "\n\nZaalwoorden: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Looge käivituskirjelduse jaoks lahedad, loomingulised ja meeldejäävad nimed: " . $description . "\n\nAlgussõnad: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo siistejä, luovia ja tarttuvia nimiä käynnistyksen kuvaukselle: " . $description . "\n\nSiemensanat: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Générez des noms sympas, créatifs et accrocheurs pour la description de démarrage : " . $description . "\n\nMots clés : " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Erzeuge coole, kreative und einprägsame Namen für die Startup-Beschreibung: " . $description . "\n\nStartwörter: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργήστε όμορφα, δημιουργικά και ελκυστικά ονόματα για περιγραφή εκκίνησης: " . $description . "\n\nΔείτε λέξεις: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור שמות מגניבים, יצירתיים וקליטים לתיאור ההפעלה: " . $description . "\n\nמילות הזרע: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "स्टार्टअप विवरण के लिए बढ़िया, रचनात्मक और आकर्षक नाम उत्पन्न करें: " . $description . "\n\nबीज शब्द: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Generál menő, kreatív és fülbemászó neveket az indítási leíráshoz: " . $description . "\n\nKezdőszavak: " . $keywords . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búðu til flott, skapandi og grípandi nöfn fyrir ræsingarlýsingu: " . $description. "\n\n Fræorð: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Hasilkan nama yang keren, kreatif, dan menarik untuk deskripsi startup: " . $description . "\n\nBenih kata: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Genera nomi interessanti, creativi e accattivanti per la descrizione dell'avvio: " . $description . "\n\nParole seme: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "スタートアップの説明にクールでクリエイティブでキャッチーな名前を付けてください: " . $description. "\n\nシード ワード: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "스타트업 설명을 위한 멋지고 창의적이며 기억하기 쉬운 이름 생성: " . $description . "\n\n시드 단어: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Jana nama yang keren, kreatif dan menarik untuk penerangan permulaan: " . $description . "\n\nPerkataan benih: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Generer kule, kreative og fengende navn for oppstartsbeskrivelse: " . $description . "\n\nFrøord: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Wygeneruj fajne, kreatywne i chwytliwe nazwy dla opisu startowego: " . $description . "\n\nSłowa źródłowe: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Gerar nomes legais, criativos e atraentes para a descrição da inicialização: " . $description. "\n\nPalavras iniciais: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создавайте крутые, креативные и запоминающиеся названия для описания стартапа: " . $description. "\n\nИсходные слова: " . $keywords . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Genera nombres geniales, creativos y pegadizos para la descripción de inicio: " . $description . "\n\nPalabras semilla: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skapa coola, kreativa och catchy namn för startbeskrivning: " . $description . "\n\nFröord: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Başlangıç açıklaması için havalı, yaratıcı ve akılda kalıcı adlar oluşturun: " . $description . "\n\nÖz sözcükler: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Gerar nomes legais, criativos e atraentes para a descrição da inicialização: " . $description. "\n\nPalavras iniciais: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Generează nume interesante, creative și atrăgătoare pentru descrierea startup-ului: " . $description . "\n\nCuvinte semințe: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo tên thú vị, sáng tạo và hấp dẫn cho phần mô tả công ty khởi nghiệp:" . $description . "\n\nTừ giống: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Tengeneza majina mazuri, ya ubunifu na ya kuvutia kwa maelezo ya kuanza: " . $description. "\n\nManeno ya mbegu: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvarite kul, kreativna in privlačna imena za opis zagona: ". $description. "\n\nSemenske besede: " . $keywords. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}

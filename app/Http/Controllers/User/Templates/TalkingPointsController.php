<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class TalkingPointsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTalkingPointsPrompt($title, $keywords, $language, $tone) {
        
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
                    $prompt = "Write short, simple and informative talking points for:\n\n" . $title . "\n\nAnd also similar talking points for subheadings:\n" . $keywords . "\n\nTone of voice of the paragraph must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب نقاط حديث قصيرة وبسيطة وغنية بالمعلومات من أجل:\n\n". $title. "\n\nونقاط الحديث المشابهة للعناوين الفرعية:\n". $keywords. "\n\nيجب أن تكون نغمة الصوت في الفقرة:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下内容编写简短、简单且信息丰富的谈话要点：\n\n" . $title . "\n\n以及副标题的类似谈话要点：\n" . $keywords . "\n\n段落的语气必须是 :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite kratke, jednostavne i informativne teme za:\n\n" . $title. "\n\nI također slične teme za podnaslove:\n" . $keywords. "\n\nTon glasa odlomka mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište krátké, jednoduché a informativní body pro:\n\n" . $title . "\n\nA také podobná témata pro podnadpisy:\n" . $keywords . "\n\nTón hlasu odstavce musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv korte, enkle og informative talepunkter til:\n\n" . $title. "\n\nOg også lignende talepunkter for underoverskrifter:\n" . $keywords . "\n\nTonefaldet i afsnittet skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf korte, eenvoudige en informatieve gespreksonderwerpen voor:\n\n" . $title . "\n\nEn ook gelijkaardige gespreksonderwerpen voor tussenkopjes:\n" . $keywords . "\n\nDe toon van de alinea moet zijn:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage lühikesed, lihtsad ja informatiivsed jutupunktid:\n\n" . $title . "\n\nJa ka sarnased jutupunktid alapealkirjade jaoks:\n" . $keywords . "\n\nLõigu hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita lyhyitä, yksinkertaisia ja informatiivisia puheenaiheita:\n\n" . $title . "\n\nJa myös samanlaisia puheenaiheita alaotsikoille:\n" . $keywords . "\n\nKappaleen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez des points de discussion courts, simples et informatifs pour :\n\n" . $title . "\n\nEt également des points de discussion similaires pour les sous-titres :\n" . $keywords . "\n\nLe ton de la voix du paragraphe doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie kurze, einfache und informative Gesprächsthemen für:\n\n" . $title . "\n\nUnd auch ähnliche Gesprächsthemen für Unterüberschriften:\n" . $keywords . "\n\nTonlage des Absatzes muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε σύντομα, απλά και κατατοπιστικά σημεία ομιλίας για:\n\n" . $title . "\n\nΚαι επίσης παρόμοια σημεία συζήτησης για υποτίτλους:\n" . $keywords . "\n\nΟ τόνος της φωνής της παραγράφου πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב נקודות דיבור קצרות, פשוטות ואינפורמטיביות עבור:\n\n" . $title . "\n\nוגם נקודות דיבור דומות עבור כותרות משנה:\n" . $keywords. "\n\nטון הדיבור של הפסקה חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "के लिए संक्षिप्त, सरल और जानकारीपूर्ण चर्चा बिंदु लिखें:\n\n" .$title. "\n\nऔर उपशीर्षक के लिए समान चर्चा बिंदु:\n" . $keywords. "\n\nपैराग्राफ की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon rövid, egyszerű és informatív beszédpontokat:\n\n" . $title . "\n\nÉs hasonló beszédpontok az alcímekhez:\n" . $keywords . "\n\nA bekezdés hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu stutta, einfalda og upplýsandi umræðupunkta fyrir:\n\n" . $title. "\n\nOg líka svipaðar umræður fyrir undirfyrirsagnir:\n" . $keywords . "\n\nTónn málsgreinarinnar verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis poin pembicaraan singkat, sederhana dan informatif untuk:\n\n" . $title . "\n\nDan juga poin pembicaraan serupa untuk subjudul:\n" . $keywords . "\n\nNada suara paragraf harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi punti di discussione brevi, semplici e informativi per:\n\n" . $title . "\n\nE anche punti di discussione simili per i sottotitoli:\n" . $keywords. "\n\nIl tono di voce del paragrafo deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "短く、シンプルで有益な論点を書いてください:\n\n" . $title. "\n\n小見出しにも同様の要点があります:\n" . $keywords . "\n\n段落の口調は次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 짧고 간단하며 유익한 요점을 작성하십시오:\n\n" . $title . "\n\n또한 부제목에 대한 유사한 논점:\n" . $keywords . "\n\n문단의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis perkara perbualan yang pendek, ringkas dan bermaklumat untuk:\n\n" . $title . "\n\nDan juga perkara yang serupa untuk tajuk kecil:\n" . $keywords . "\n\nNada suara perenggan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv korte, enkle og informative samtalepunkter for:\n\n" . $title . "\n\nOg også lignende samtalepunkter for underoverskrifter:\n" . $keywords . "\n\nTone i avsnittet må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz krótkie, proste i pouczające przemówienia dla:\n\n" . $title . "\n\nA także podobne uwagi do podtytułów:\n" . $keywords . "\n\nTon głosu akapitu musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva pontos de conversa curtos, simples e informativos para:\n\n" . $title . "\n\nE também pontos de discussão semelhantes para subtítulos:\n" . $keywords . "\n\nTom de voz do parágrafo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите короткие, простые и информативные тезисы для:\n\n" . $title . "\n\nА также аналогичные темы для подзаголовков:\n" . $keywords . "\n\nТон абзаца должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe puntos de conversación breves, sencillos e informativos para:\n\n" . $title . "\n\nY también puntos de conversación similares para los subtítulos:\n". $keywords. "\n\nEl tono de voz del párrafo debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv korta, enkla och informativa samtalspunkter för:\n\n" . $title . "\n\nOch även liknande diskussionspunkter för underrubriker:\n" . $keywords . "\n\nTonfallet i stycket måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Skriv korta, enkla och informativa samtalspunkter för:\n\n" . $title. "\n\nOch även liknande diskussionspunkter för underrubriker:\n" . $keywords . "\n\nTonfallet i stycket måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva pontos de conversa curtos, simples e informativos para:\n\n" . $title . "\n\nE também pontos de discussão semelhantes para subtítulos:\n" . $keywords . "\n\nTom de voz do parágrafo deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți puncte de discuție scurte, simple și informative pentru:\n\n" . $title . "\n\nȘi, de asemenea, puncte de discuție similare pentru subtitluri:\n" . $keywords . "\n\nTonul vocii al paragrafului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết luận điểm ngắn gọn, đơn giản và nhiều thông tin cho:\n\n" . $title . "\n\nVà cả những luận điểm tương tự cho các tiêu đề phụ:\n" . $keywords . "\n\nGiọng điệu của đoạn phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika vidokezo vifupi, rahisi na vya kuelimisha vya:\n\n" . $title. "\n\nNa pia hoja sawa za mazungumzo kwa vichwa vidogo:\n" . $keywords . "\n\nToni ya sauti ya aya lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite kratke, preproste in informativne teme za:\n\n" . $title. "\n\nIn tudi podobne teme za podnaslove:\n" . $keywords. "\n\nTon glasu odstavka mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
